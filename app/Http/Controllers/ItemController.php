<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Email;
use App\Order;
use App\Item;
use App\Package;
use App\PackageItem;

use Auth;

class ItemController extends Controller
{
    public function index()
    {
    	$email = Email::orderBy('id','desc')->paginate(10);
        $input = Order::orderBy('created_at','desc')->paginate(10);
    	return view('warehouse.home')->with('email', $email)->with('input',$input);
    	
    }

    public function GetCreate()
    {
    	return view('warehouse.create');
    }

    public function PostCreate(Request $r)
    {   

            for ($i=1; $i <= $r->input('count_item') ; $i++) {
                $check = Item::where('name',$r->input('name-'.$i))->first();
                if (count($check)>0) {
                    return redirect('warehouse/create')->with('message','Name Has Been Added');           
                }
                else{
                    $items = new Item;
                    $items->name = $r->input('name-'.$i);
                    $items->stock = $r->input('stock-'.$i);
                    $items->save();
                    }
                }
                return redirect('warehouse/listi');

    }

    public function GetPackage()
    {   
        $item = Item::orderBy('id','desc')->paginate(100);
        return view('warehouse.package')->with('item', $item);
    }

    public function PostPackage(Request $pkg)
    {

        $package = new Package;
        $package->name = $pkg->name;
        $package->price = str_replace(['Rp','.'], ['',''], $pkg->price);
        $package->save();

        $pkg_id = \App\Package::orderBy('id','desc')->first();
        foreach ($pkg->input('package_create') as $key => $value) {
            if ($value) {
                $pkg_items = new PackageItem;
                $pkg_items->package_id = $pkg_id->id;
                $pkg_items->item_id = $value;
                $pkg_items->save();
            }
        }
            return redirect(url('warehouse/listp'));
    }

    public function GetListi()
    {
        $no=1;
        $list = Item::orderBy('id','desc')->paginate(100);
        return view('warehouse.listi')->with('listi', $list)->with('no',$no);

    }

    public function GetListp()
    {
        $no=1;
        $pkg = Package::OrderBy('id','desc')->paginate(10);
        return view('warehouse.listp')->with('no',$no)->with('listp',$pkg);
    }
        
}
