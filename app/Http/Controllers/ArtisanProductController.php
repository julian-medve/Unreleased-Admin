<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ArtisanCategory;
use App\Models\ArtisanProduct;
use App\Models\TypeCategory;
use Config\Constants;
use File;

class ArtisanProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $artisan_products = ArtisanProduct::with('user')->where('ArtisanCategory', '=', $request->input('ArtisanCategory'))->paginate( 10 );

        foreach($artisan_products as $product)
        {
            if(strlen($product->Description) > Config('Constants.custom.description_max_length'))
                $product->Description = substr($product->Description, 0, Config('Constants.custom.description_max_length')) . Config('Constants.custom.description_more');
        }

        return view('admin.artisan.product.index',  array(
            'artisan_products'           => $artisan_products,
            'ArtisanCategory'           => $request->input('ArtisanCategory'),
        ));
    }

    public function add(Request $request)
    {
        return view('admin.artisan.product.add', array(
            'ArtisanCategory'           => $request->ArtisanCategory,
        ));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'Name'             => 'required|min:1|max:64',
            'Price'             => 'required',
            'Size'             => 'required',
            'Quantity'             => 'required',
            'Preview'           => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        
        $previewImage = time() . '_' . request()->Preview->getClientOriginalName();
        request()->Preview->move(public_path(Config('Constants.directory.artisan_products')), $previewImage);

        $user = auth()->user();
        $artisan_product = new ArtisanProduct();
        $artisan_product->Name              = $request->input('Name');
        $artisan_product->Description       = $request->input('Description');
        $artisan_product->Price             = $request->input('Price');
        $artisan_product->Size              = $request->input('Size');
        $artisan_product->Quantity          = $request->input('Quantity');
        $artisan_product->Preview           = Config('Constants.directory.artisan_products') . '/' . $previewImage;
        $artisan_product->Status            = $request->input('Status') == 'on'? true : false;
        $artisan_product->Submitter         = $user->id;
        $artisan_product->ArtisanCategory   = $request->input('ArtisanCategory');

        $artisan_product->save();
        $request->session()->flash('message', 'Successfully created artisan product.');

        return redirect()->route('admin.artisan.product.index', ['ArtisanCategory' => $request->input('ArtisanCategory')] );
    }

    public function edit(Request $request)
    {
        $artisan_product = ArtisanProduct::find($request->input('ArtisanProduct'));

        return view('admin.artisan.product.edit', [ 
            'ArtisanProduct'   => $artisan_product,
            ]);
    }

    public function update(Request $request)
    {
        $artisan_product = ArtisanProduct::find($request->input('ArtisanProduct'));

        $artisan_product->Name          = $request->input('Name');
        $artisan_product->Description   = $request->input('Description');
        $artisan_product->Price         = $request->input('Price');
        $artisan_product->Size          = $request->input('Size');
        $artisan_product->Quantity      = $request->input('Quantity');


        if(!is_null(request()->Preview))
        {
            $previewImage = time() . '_' . request()->Preview->getClientOriginalName();
            request()->Preview->move(public_path(Config('Constants.directory.artisan_categories')), $previewImage);

            $filepath = public_path($artisan_product->Preview);
            if(\File::exists($filepath)) \File::delete($filepath);

            $artisan_product->Preview  = Config('Constants.directory.artisan_categories') . '/' . $previewImage;
        }

        
        $artisan_product->Status          = $request->input('Status') == 'on'? true : false;
      

        $artisan_product->save();
        $request->session()->flash('message', "Successfully updated Artisan Product.");

        return redirect()->route('admin.artisan.product.index', ['ArtisanCategory' => $artisan_product->ArtisanCategory ] );
    }

    public function delete(Request $request)
    {
        $ArtisanProduct = ArtisanProduct::find($request->input("ArtisanProduct"));
        
        if($ArtisanProduct){
            
            $ArtisanCategory = $ArtisanProduct->ArtisanCategory;

            $filepath = public_path($ArtisanProduct->Preview);
            if(\File::exists($filepath)) \File::delete($filepath);

            $ArtisanProduct->delete();
        }
        
        return redirect()->route('admin.artisan.product.index', ['ArtisanCategory' => $ArtisanCategory ] );
    }
}