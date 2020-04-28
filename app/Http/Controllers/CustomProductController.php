<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomProduct;
use App\Models\PriceCategory;
use Config\Constants;
use GuzzleHttp\Psr7\Request as GuzzleRequest;


class CustomProductController extends Controller
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
        $customs = CustomProduct::with('user')->paginate( 10 );

        return view('admin.customproduct.index',  array(
            'customs'           => $customs,
        ));
    }

    public function add()
    {
        $CustomParts = explode(Config('Constants.custom.parts_seperator'), Config("Constants.custom.parts"));

        return view('admin.customproduct.add', array(
                'PriceCategories'   => PriceCategory::all(),
                'CustomParts'      => $CustomParts,
        ));
    }

    public function search(Request $request)
    {
        // Get Custom Product Quantity and Type from API

        $client = new \GuzzleHttp\Client();
        
        $res = $client->request('GET', Config('Constants.api.custom_products'), 
            [
            'headers'   => [ 'Authorization' => Config('Constants.api.custom_products_auth'),],
            'query'     => [ 'keyword' => $request->input('SKU')]
            ]
        );

        $responseJson = $res->getBody()->getContents();
        $responseData = json_decode($responseJson, true);
        
        $responseData = $responseData['data']['data'];
            
        return json_encode($responseData[0]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'SKU'               => 'required',
            'Name'              => 'required',
            'Description'       => 'required',
            'Preview'           => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'Model'             => 'required',
            'Sizes'             => 'required',
            'Price'             => 'required',
            'ColorPrice'        => 'required',
            'TextPrice'         => 'required',
        ]);

        $PartPrices = "";
        foreach($request->PartPrices as $item)
        {
            foreach($item as $grandItem)
                $PartPrices .= $grandItem . ":";
                
            $PartPrices = substr($PartPrices, 0, -1); 
            $PartPrices .= ' ';
        }


        $previewImage = time() . '_' . request()->Preview->getClientOriginalName();
        request()->Preview->move(public_path(Config('Constants.directory.custom_products')), $previewImage);

        $model = time() . '_' . request()->Model->getClientOriginalName();
        request()->Model->move(public_path(Config('Constants.directory.custom_products')), $model);

        $user = auth()->user();
        $CustomProduct = new CustomProduct();
        $CustomProduct->SKU             = $request->input('SKU');
        $CustomProduct->SellerId        = $request->input('SellerId');
        $CustomProduct->Name            = $request->input('Name');
        $CustomProduct->Description     = $request->input('Description');
        $CustomProduct->Price           = $request->input('Price');
        $CustomProduct->Sizes           = $request->input('Sizes');
        $CustomProduct->Preview         = Config('Constants.directory.custom_products') . '/' . $previewImage;
        $CustomProduct->Model           = Config('Constants.directory.custom_products') . '/' . $model;

        $CustomProduct->ColorPrice      = $request->input('ColorPrice');
        $CustomProduct->TextPrice       = $request->input('TextPrice');

        $CustomProduct->Status          = $request->input('Status') == 'on'? true : false;
        $CustomProduct->Submitter       = $user->id;
        $CustomProduct->PartPrices      = trim($PartPrices);
        

        $CustomProduct->save();
        $request->session()->flash('message', 'Successfully created custom product.');

        return redirect()->route('admin.customproduct.index');
    }

    public function edit(Request $request)
    {
        $CustomParts = explode(Config('Constants.custom.parts_seperator'), Config("Constants.custom.parts"));
        $PriceCategories = PriceCategory::all();

        $CustomProduct = CustomProduct::find($request->input('CustomProduct'));

        $CustomPrices = explode(' ', $CustomProduct->PartPrices);
        
        $PartPrices = array();
        foreach($CustomPrices as $CustomPrice)
        {
            array_push($PartPrices, explode(':', $CustomPrice));
        }

        return view('admin.customproduct.edit', compact('CustomProduct', 'CustomParts', 'PriceCategories', 'PartPrices'));
    }

    public function update(Request $request)
    {
        $CustomProduct = CustomProduct::find($request->input('CustomProduct'));
        
        
        $CustomProduct->SKU            = $request->input('SKU');
        $CustomProduct->Name           = $request->input('Name');
        $CustomProduct->Description    = $request->input('Description');


        $PartPrices = "";
        foreach($request->PartPrices as $item)
        {
            foreach($item as $grandItem)
                $PartPrices .= $grandItem . ":";

            $PartPrices = substr($PartPrices, 0, -1);
            $PartPrices .= ' ';
        }
        

        if(!is_null(request()->Preview))
        {
            $previewImage = time() . '_' . request()->Preview->getClientOriginalName();
            request()->Preview->move(public_path(Config('Constants.directory.custom_products')), $previewImage);

            $filepath = public_path($CustomProduct->Preview);
            if(\File::exists($filepath)) \File::delete($filepath);

            $CustomProduct->Preview         = Config('Constants.directory.custom_products') . '/' . $previewImage;
        }
        

        if(!is_null(request()->Model))
        {
            $model = time() . '_' . request()->Model->getClientOriginalName();
            request()->Model->move(public_path(Config('Constants.directory.custom_products')), $model);

            $filepath = public_path($CustomProduct->Model);
            if(\File::exists($filepath)) \File::delete($filepath);

            $CustomProduct->Model           = Config('Constants.directory.custom_products') . '/' . $model;
        }

        $CustomProduct->ColorPrice      = $request->input('ColorPrice');
        $CustomProduct->TextPrice       = $request->input('TextPrice');

        $CustomProduct->Status          = $request->input('Status') == 'on'? true : false;
        $CustomProduct->PartPrices      = trim($PartPrices);


        $CustomProduct->save();
        $request->session()->flash('message', 'Successfully updated custom product.');

        return redirect()->route('admin.customproduct.index');
    }

    public function delete(Request $request)
    {
        $CustomProduct = CustomProduct::find($request->input("CustomProduct"));
        
        if($CustomProduct){
            
            $filepath = public_path($CustomProduct->Preview);
            if(\File::exists($filepath)) \File::delete($filepath);


            $filepath = public_path($CustomProduct->Model);
            if(\File::exists($filepath)) \File::delete($filepath);

            $CustomProduct->delete();
        }
        
        return redirect()->route('admin.customproduct.index');
    }
}