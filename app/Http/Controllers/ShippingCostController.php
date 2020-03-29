<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Province;
use GuzzleHttp\Psr7\Request as GuzzleRequest;

class ShippingCostController extends Controller
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
        $Provinces = Province::all();
        return view('admin.shippingcost.index',  compact('Provinces'));
    }

    public function add()
    {
        // $client = new \GuzzleHttp\Client();
        
        // $res = $client->request('GET', 'https://parseapi.back4app.com/classes/Continentscountriescities_Country', 
        //     [
        //     'headers' => [
        //         'X-Parse-Application-Id' => 'jvSygSDGOgAkZ2Pf7gFfFzO9RhPAu3TMdT7atsc0',
        //         'X-Parse-REST-API-Key' => '6l6J2XbJ7PjsvGHDSSQZkHESBJnaeCQnCDDnW4Dc',
        //     ]
        // ]);

        // $responseJson = $res->getBody()->getContents();
        // $responseData = json_decode($responseJson, true);
        
        // $Countries = $responseData['results'];
                          
        // return view('admin.shippingcost.add', compact('Countries'));

        $Provinces = Province::all();

        return view('admin.shippingcost.add', compact('Provinces'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'Province'          => 'required',
            'Cost'              => 'required',
        ]);
        
        $Province = Province::find($request->input('Province'));
        $Province->shipping_cost = $request->input('Cost');
        
        $Province->save();
        $request->session()->flash('message', 'Successfully created Shipping Cost.');

        return redirect()->route('admin.shippingcost.index');
    }

    public function edit(Request $request)
    {
        $Province = Province::find($request->input('Province'));

        return view('admin.shippingcost.edit', [ 
            'Province'  => $Province,
            ]);
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'Province'          => 'required',
            'Cost'              => 'required',
        ]);
        
        $Province = Province::find($request->input('Province'));
        $Province->shipping_cost = $request->input('Cost');        
        $Province->save();

        
        $request->session()->flash('message', 'Successfully created Shipping Cost.');

        return redirect()->route('admin.shippingcost.index');
    }

    public function delete(Request $request)
    {
        $ShippingCost = ShippingCost::find($request->input("ShippingCost"));
        
        if($ShippingCost){
            $ShippingCost->delete();
        }
        
        return redirect()->route('admin.shippingcost.index');
    }
}