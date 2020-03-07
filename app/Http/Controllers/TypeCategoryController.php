<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TypeCategory;

class TypeCategoryController extends Controller
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
        $TypeCategories = TypeCategory::all();

        return view('admin.settings.typecategory.index',  array(
            'TypeCategories'           => $TypeCategories,
        ));
    }

    public function add()
    {
        return view('admin.settings.typecategory.add');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'Name'              => 'required',
            'Description'       => 'required',
        ]);

        
        $TypeCategory = new TypeCategory();
        $TypeCategory->Name             = $request->input('Name');
        $TypeCategory->Description      = $request->input('Description');
        
        $TypeCategory->save();
        $request->session()->flash('message', 'Successfully created price category.');

        return redirect()->route('admin.settings.typecategory.index');
    }

    public function edit(Request $request)
    {
        $TypeCategory = TypeCategory::find($request->input('TypeCategory'));

        return view('admin.settings.typecategory.edit', [ 
            'TypeCategory'  => $TypeCategory,
            ]);
    }

    public function update(Request $request)
    {
        $TypeCategory = TypeCategory::find($request->input('TypeCategory'));

        $TypeCategory->Name            = $request->input('Name');
        $TypeCategory->Description     = $request->input('Description');

        $TypeCategory->save();
        $request->session()->flash('message', 'Successfully updated price category.');

        return redirect()->route('admin.settings.typecategory.index');
    }

    public function delete(Request $request)
    {
        $TypeCategory = TypeCategory::find($request->input("TypeCategory"));
        
        if($TypeCategory){
            
            $TypeCategory->delete();
        }
        
        return redirect()->route('admin.settings.typecategory.index');
    }
}