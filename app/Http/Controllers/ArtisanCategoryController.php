<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ArtisanCategory;
use App\Models\ArtisanProduct;
use App\Models\TypeCategory;
use Config\Constants;
use File;

class ArtisanCategoryController extends Controller
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
        $artisan_categories = ArtisanCategory::with('user')->paginate( 10 );

        foreach($artisan_categories as $category)
        {
            if(strlen($category->Description) > Config('Constants.custom.description_max_length'))
                $category->Description = substr($category->Description, 0, Config('Constants.custom.description_max_length')) . Config('Constants.custom.description_more');
        }

        return view('admin.artisan.category.index',  array(
            'artisan_categories'           => $artisan_categories,
        ));
    }

    public function add()
    {
        return view('admin.artisan.category.add');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'Name'              => 'required|min:1|max:64',
            'Preview'           => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        
        $previewImage = time() . '_' . request()->Preview->getClientOriginalName();
        request()->Preview->move(public_path(Config('Constants.directory.artisan_categories')), $previewImage);

        $user = auth()->user();
        $ArtisanCategory = new ArtisanCategory();
        $ArtisanCategory->Name              = $request->input('Name');
        $ArtisanCategory->Description       = $request->input('Description');
        $ArtisanCategory->PreviewImage      = Config('Constants.directory.artisan_categories') . '/' . $previewImage;
        $ArtisanCategory->Submitter         = $user->id;
        $ArtisanCategory->Status            = $request->input('Status') == 'on'? true : false;

        $ArtisanCategory->save();
        $request->session()->flash('message', 'Successfully created artisan category.');

        return redirect()->route('admin.artisan.category.index');
    }

    public function edit(Request $request)
    {
        $ArtisanCategory = ArtisanCategory::find($request->input('ArtisanCategory'));

        return view('admin.artisan.category.edit', [ 
            'ArtisanCategory'  => $ArtisanCategory,
            ]);
    }

    public function update(Request $request)
    {
        $ArtisanCategory = ArtisanCategory::find($request->input('ArtisanCategory'));

        $ArtisanCategory->Name              = $request->input('Name');
        $ArtisanCategory->Description       = $request->input('Description');


        if(!is_null(request()->Preview))
        {
            $previewImage = time() . '_' . request()->Preview->getClientOriginalName();
            request()->Preview->move(public_path(Config('Constants.directory.artisan_categories')), $previewImage);

            $filepath = public_path($ArtisanCategory->PreviewImage);
            if(\File::exists($filepath)) \File::delete($filepath);

            $ArtisanCategory->PreviewImage  = Config('Constants.directory.artisan_categories') . '/' . $previewImage;
        }


        $ArtisanCategory->Status          = $request->input('Status') == 'on'? true : false;
        $ArtisanCategory->Submitter        = auth()->user()->id;

        $ArtisanCategory->save();
        $request->session()->flash('message', 'Successfully updated artisan category.');

        return redirect()->route('admin.artisan.category.index');
    }

    public function delete(Request $request)
    {
        $ArtisanCategory = ArtisanCategory::find($request->input("ArtisanCategory"));
        
        $ArtisanProducts = ArtisanProduct::where('ArtisanCategory', '=', $request->input('ArtisanCategory'));

        foreach($ArtisanProducts as $product){

            $filepath = public_path($product->Preview);
            if(\File::exists($filepath)) \File::delete($filepath);

            $product->delete();
        }

        if($ArtisanCategory){
            
            $filepath = public_path($ArtisanCategory->Preview);
            if(\File::exists($filepath)) \File::delete($filepath);

            $ArtisanCategory->delete();
        }
        
        return redirect()->route('admin.artisan.category.index');
    }
}