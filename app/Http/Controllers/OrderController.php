<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Cart;
use App\Models\OrderStatus;
use Config\Constants;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('administrator');
    }

    public function index()
    {
        $Orders = Order::all();

        foreach ($Orders as $key => $value) {

            $Carts = Cart::where('OrderId', $value->Id)->get();
            if(sizeof($Carts) == 0)
                $Orders->forget($key);
        }

        return view('admin.order.index',  compact('Orders'));
    }


    public function edit(Request $request)
    {
        $Order = Order::find($request->input('Order'));
        $OrderStatuses = OrderStatus::all();

        $Carts = Cart::where('OrderId', $request->input('Order'))->get();
        
        return view('admin.order.edit', compact('Order', 'OrderStatuses', 'Carts'));
    }

    public function update(Request $request)
    {
        $Order = Order::find($request->input('Order'));
        $Order->Status = $request->input('Status');
       
        $Order->save();
        $request->session()->flash('message', 'Successfully updated Order.');

        return redirect()->route('admin.order.index');
    }

    public function delete(Request $request)
    {
        $Order = Order::find($request->input("Order"));
        $Order->delete();

        
        // $ArtisanProducts = ArtisanProduct::where('ArtisanCategory', '=', $request->input('ArtisanCategory'));

        // foreach($ArtisanProducts as $product){

        //     $filepath = public_path($product->Preview);
        //     if(\File::exists($filepath)) \File::delete($filepath);

        //     $product->delete();
        // }

        // if($ArtisanCategory){
            
        //     $filepath = public_path($ArtisanCategory->Preview);
        //     if(\File::exists($filepath)) \File::delete($filepath);

        //     $ArtisanCategory->delete();
        // }
        
        return redirect()->route('admin.order.index');
    }
}