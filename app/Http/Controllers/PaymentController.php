<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Payment;
use App\Order;
use App\Package;
use App\Client;

class PaymentController extends Controller
{
    public function index()
    {
    	$account = Payment::orderBy('id','desc')->paginate(100);
    	return view('accountant.home')->with('account' , $account);
    }

    public function GetTable()
    {	
    	$no = 1;
    	$list = Order::orderBy('id','desc')->paginate(10);
    	return view('accountant.table')->with('list',$list)->with('no',$no);
    }

    public function GetPayment()
    {
    	return view('accountant.invoice');
    }

    public function GetDetail($id)
    {
        $no = 1;
        $order = Order::where('id', $id)->first();
        $package = Package::find($order->package_id);
        $client = Client::find($order->company_id);
        return view('accountant.detail', ['no'=>$no , 'status'=>$order,'package'=>$package, 'client'=>$client]);
    }
}
