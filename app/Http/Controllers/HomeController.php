<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Package;
use App\Image;
use App\Client;
use App\PackageItem;
use App\Item;
use App\Book;
use Carbon;
use App\Payment;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $room = Order::orderBy('id','desc')->paginate(4);
        return view('home.home')->with('room',$room);
    }

    public function GetBook($id)
    {
        $detail = Order::where('id', $id)->first();        
        $package = Package::where('id',$detail->package_id)->first();
        $p_item = PackageItem::where('package_id', $package->id)->get();        
        $image = Image::where('room_id', $detail->id)->get();

        return view('home.book')->with('detail',$detail)->with('package',$package)->with('p_item',$p_item)->with('image', $image);
    }

    public function PostBook(Request $r)
    {        
        $book = new Book;
        $book->room_id = $r->room_id;
        $book->address = $r->address;
        $book->company_name = $r->company_name;
        $book->leader_name = $r->leader_name;
        $book->email = $r->email;
        $book->leader_email = $r->leader_email;
        $book->phone = $r->phone;        
        $book->date_order = $r->date_order;
        $book->date_expired = $r->date_expired;
        $book->save();

        return redirect('');
    }

    public function GetPay($id)
    {
        $client = Client::where('id',$id)->first();
        $pay = Payment::where('client_id', $id)->first();
        $order = Order::where('company_id',$client->id)->first();
        $package = Package::where('id',$order->package_id)->first();
        return view('home.payment')->with('client',$client)->with('pay',$pay)->with('order',$order)->with('package',$package);
    }

    public function PostPay(Request $data)
    {   
        $client = Client::orderBy('id','desc')->first();
        $payment = \App\Payment::find($client->id);
        $payment->payment_total = $data->input('total');        
        $photos = $data->file('photo');
        $name_p = strtoupper(str_slug(strtoupper($payment->pay_code)))."_".date("YmdHis").uniqid().'.'.$photos->getClientOriginalExtension();
            $photos->move(storage_path("transfer"),$name_p);
        $payment->img_transfer = $name_p;
        $payment->save();

        return redirect('/');
        
    }
}
