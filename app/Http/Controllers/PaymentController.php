<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Payment;
use App\Order;
use App\Package;
use App\Client;
use Mail;

class PaymentController extends Controller
{
    public function index()
    {
        $no = 1;
        $pay = Payment::orderBy('id','desc')->get();        
        return view('accountant.home', ['no'=>$no,'pay'=>$pay]);
    }

    public function GetTable()
    {	
    	$no = 1;
    	$list = Order::orderBy('id','desc')->paginate(10);
    	return view('accountant.table')->with('list',$list)->with('no',$no);
    }

    public function GetPayment()
    {
        $no = 1;
        $pay = Payment::orderBy('id','desc')->get();
    	return view('accountant.status')->with('no',$no)->with('pay',$pay);
    }

    public function GetDetail($id)
    {
        $no = 1;
        $order = Order::where('id', $id)->first();
        $package = Package::find($id);
        $client = Client::find($order->company_id);
        $pay = Payment::where('client_id',$client->id)->first();
        return view('accountant.detail', ['no'=>$no , 'status'=>$order,'package'=>$package, 'client'=>$client,'pay'=>$pay,'order'=>$order]);
    }

    public function GetDetails($id)
    {
        $no = 1;
        $order = Order::where('id', $id)->first();
        $package = Package::find($id);
        $client = Client::where('order_id',$order->id)->get();
        $pay = Payment::where('client_id',$client->id)->first();
        return view('accountant.details', ['no'=>$no , 'status'=>$order,'package'=>$package, 'client'=>$client,'pay'=>$pay,'order'=>$order]);
    }

    public function GetPrint($id)
    {
        $no = 1;
        $order = Order::where('id', $id)->first();
        $package = Package::find($order->package_id);
        $client = Client::find($order->company_id);
        $pay = Payment::where('client_id',$client->id)->get();
        return view('accountant.print', ['no'=>$no , 'status'=>$order,'package'=>$package, 'client'=>$client,'pay'=>$pay,'order'=>$order]);   
    }

    public function PostPay(Request $pay)
    {

        $pay = Payment::find($pay->input('id'));
        $pay->status = "Applied";
        $pay->save();

        $name = $pay->name;
        $date = $pay->date;
        $email = $pay->email;
        $detail = Client::where('id',$pay->client_id)->first();


        Mail::send('accountant.confirm',['receiver_name'=>$name, 'date'=>$date,'email'=>$email],function($m) use($detail){
            $m->from('akbar.sya19@gmail.com',"Admin TMS");
            $m->to($detail->email,$detail->name)->subject("Payment Confirmation");
        });
        return redirect('account/status');
    }


}
