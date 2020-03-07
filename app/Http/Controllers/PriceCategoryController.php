<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PriceCategory;

class PriceCategoryController extends Controller
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
        $PriceCategories = PriceCategory::all();

        return view('admin.settings.pricecategory.index',  array(
            'PriceCategories'           => $PriceCategories,
        ));
    }

    public function add()
    {
        return view('admin.settings.pricecategory.add');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'Name'              => 'required',
            'Description'       => 'required',
        ]);

        
        $PriceCategory = new PriceCategory();
        $PriceCategory->Name             = $request->input('Name');
        $PriceCategory->Description      = $request->input('Description');
        
        $PriceCategory->save();
        $request->session()->flash('message', 'Successfully created price category.');

        return redirect()->route('admin.settings.pricecategory.index');
    }

    public function edit(Request $request)
    {
        $PriceCategory = PriceCategory::find($request->input('PriceCategory'));

        return view('admin.settings.pricecategory.edit', [ 
            'PriceCategory'  => $PriceCategory,
            ]);
    }

    public function update(Request $request)
    {
        $PriceCategory = PriceCategory::find($request->input('PriceCategory'));

        $PriceCategory->Name            = $request->input('Name');
        $PriceCategory->Description     = $request->input('Description');

        $PriceCategory->save();
        $request->session()->flash('message', 'Successfully updated price category.');

        return redirect()->route('admin.settings.pricecategory.index');
    }

    public function delete(Request $request)
    {
        $PriceCategory = PriceCategory::find($request->input("PriceCategory"));
        
        if($PriceCategory){
            
            $PriceCategory->delete();
        }
        
        return redirect()->route('admin.settings.pricecategory.index');
    }
}