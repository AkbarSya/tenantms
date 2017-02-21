<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use PhpImap\Mailbox as ImapMailbox;
use PhpImap\IncomingMail;
use PhpImap\IncomingMailAttachment;
use App\Email;
use App\Order;
use App\Item;
use Mail;
use App\Client;
use Carbon\Carbon;
use App\Package;
use App\Image;
use App\Book;
use App\Ceo;
use App\Payment;


class AdminController extends Controller
{

	 public function __construct()
    {
        $this->middleware('auth');
    }  

    public function index()
    {
        $email = Email::orderBy('id','desc')->paginate(10);
        $input = Order::orderBy('created_at','desc')->paginate(10);
        $book = Book::orderBy('created_at','desc')->paginate(10);
    	return view('admin.home')->with('email', $email)->with('input',$input)->with('book',$book);
    }

    public function GetMail()
    {
    	$email = Email::orderBy('id','desc')->paginate(10);      
      	return view('admin.mail')->with('email', $email);
    }

    public function GetCompose()
    {
    	return view('admin.compose');		
    }

    public function PostCompose(Request $requestData)
    {
    	$email = new Email;
    	$email->id_operator = '0';
    	$email->sender = 	$requestData->sender;
    	$email->receiver = 	$requestData->receiver;
    	$email->receiver_name = $requestData->receiver_name;
    	$email->subject = $requestData->subject;
    	$email->fill = $requestData->fill;
    	$email->save();

    	Mail::send('admin.reply',['fill'=>$requestData->fill,'receiver_name'=>$requestData->receiver_name],function($m) use($requestData){
    		$m->from('akbar.syabani@gmail.com',$requestData->subject);
    		$m->to($requestData->receiver,$requestData->receiver_name)->subject($requestData->subject);
    	});

    	return redirect('admin/mail');

    }

    public function GetStatus()
    {   
        $no = 1;
        $status = Order::orderBy('id','desc')->paginate(10);        
    	return view('admin.status', ['no'=>$no,'status'=>$status]);
    }

    public function GetRoom()
    {
        $no = 1;
        $package = Package::orderBy('id','desc')->paginate(20);
        return view('admin.room',['no'=>$no],['package'=>$package]);
    }

    public function PostRoom(Request $requestData)
    {
        $check = Package::orderBy('id','desc')->first();
        if (count($check)==0) {
        return redirect('admin/room')->with('message','Package is Unavailable!, Please Contact Stock Operator!');     
        }
        else{
        $room = new \App\Order;
        $room->room = $requestData->room;
        $room->floor = $requestData->floor;
        $room->price = str_replace(['Rp','.'], ['',''], $requestData->price_r);
        $room->status = 'READY';
        $room->package_id = $requestData->package_id;
        $room->company_id = '0';
        $room->date_order = '<Empty>';
        $room->duration ='<Empty>';
        $room->expired_date = '<Empty>';        
        $room->save();

        $order = Order::orderBy('id','desc')->first();
        $photos = $requestData->file('photo');

        foreach ($photos as $value) {
            $name_p = strtoupper(str_slug(strtoupper($order->room)))."_".date("YmdHis").uniqid().'.'.$value->getClientOriginalExtension();
            $value->move(storage_path("photo"),$name_p);
            $photo = new \App\Image;
            $photo->room_id = $order->id;
            $photo->filename = $name_p;
            $photo->save();
        }
        }
        return redirect('admin/status');
              
    }

    public function GetDetail($id)
    {
        // $status = Order::orderBy('id','desc')->get();
        $no = 1;
        $status = Order::where('id', $id)->first();
        $client = Client::find($status->company_id);
        $package = Package::find($status->package_id);
        return view('admin.detail', ['no'=>$no , 'status'=>$status, 'client'=>$client, 'package'=>$package]);
    }

    public function GetInput($id)
    {   
        $room = Order::orderBy('id','desc')->paginate(10);        
        $book = Book::where('id',$id)->first();
    	return view('admin.input', ['room'=>$room],['book'=>$book]);
    }

    public function PostInput(Request $clients)
    {
        
        $client = new \App\Client;
        $client->name = $clients->name;
        $client->address = $clients->address;
        $client->email = $clients->email;
        $client->phone = $clients->phone;        
        $client->save();

        $book = Book::where('company_name', $clients->name)->first();
        $comp_id = Client::orderBy('id', 'desc')->first();
        $ceo = new \App\Ceo;
        $ceo->name = $book->leader_name;
        $ceo->email = $book->leader_email;
        $ceo->phone = $book->phone;
        $ceo->address = $book->address;
        $ceo->company_id = $comp_id->id; 
        $ceo->save();

        return redirect('admin/inputs');
    }

    public function GetInputs()
    {   
        $client = Client::orderBy('id', 'desc')->first();
        // $client = Client::where('id', $id)->first();
        // $roomId = $client->id;
        $item = Item::where('');
        $room = Order::orderBy('id','desc')->paginate(5);
        // $room = Order::where('id', $roomId)->first();
        return view('admin.inputs', ['client'=>$client , 'room'=>$room]);
    }

    public function PostInputs(Request $input)
    {
        $now = Carbon::now();
        $day = $now->day;
        $month = $now->month;
        $year = $now->year;
        $hour = $now->hour;
        $minute = $now->minute;
        $second = $now->second;

        $code = $day.$second.$minute.$hour;

        $s =  \App\Order::find($input->input('room'));
        $s->company_id = $input->input('company');    
        $s->status = "ON GOING";    
        $years = $input->duration;
        $interval = new \DateTime($now);
        $interval->add(new \DateInterval('P'.$years.'Y'));
        $jatoh_tempo = $interval->format('Y-m-d H:i:s');
        // dd($jatoh_tempo);
        $s->date_order = $now;
        $s->expired_date = $jatoh_tempo;
        $s->save();

        $client = Client::orderBy('id','desc')->first();
        $book = Book::where('company_name',$client->name);
      
        $pay = new \App\Payment;
        $pay->client_id = $client->id;
        $pay->pay_code = $code;
        $pay->order_id = $s->id;
        $pay->payment_total = 100000;
        $pay->img_transfer = "RRRRR";
        $pay->status = "Not Applied";
        $pay->save();
        $codep = Payment::where('client_id',$client->id)->first();
        $code = $codep->pay_code;

        Mail::send('admin.confirm',['receiver_name'=>$client->name, 'date'=>$client->created_at,'id'=>$client->id,'code'=>$code],function($m) use($client){
            $m->from('akbar.syabani@gmail.com',"Admin TMS");
            $m->to($client->email,$client->company_name)->subject("Booking Confirmation");
        });

        $book->delete();
        return redirect('admin\status');
    }

    public function PostDel($id)
    {
        $data = Book::find($id);

        Mail::send('admin.cancel',['receiver_name'=>$data->company_name,
            'date'=>$data->created_at],function($m) use($data){
            $m->from('akbar.sya19@gmail.com',"Admin TMS");
            $m->to($data->email,$data->company_name)->subject("Booking Cancellation");
        });

        $data->delete();
        return redirect('admin/home');
    }
} 