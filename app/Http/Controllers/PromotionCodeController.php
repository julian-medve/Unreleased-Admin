<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PromotionCode;

class PromotionCodeController extends Controller
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
        $PromotionCodes = PromotionCode::all();

        return view('admin.promotioncode.index',  compact('PromotionCodes'));
    }

    public function add()
    {
        return view('admin.promotioncode.add');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'Name'              => 'required',
            'Description'       => 'required',
            'Code'              => 'required',
            'Quota'             => 'required',
        ]);

        
        $PromotionCode = new PromotionCode();
        $PromotionCode->Name             = $request->input('Name');
        $PromotionCode->Description      = $request->input('Description');
        $PromotionCode->Code             = $request->input('Code');
        $PromotionCode->Quota            = $request->input('Quota');
        
        $PromotionCode->save();
        $request->session()->flash('message', 'Successfully created Promotion Code.');

        return redirect()->route('admin.promotioncode.index');
    }

    public function edit(Request $request)
    {
        $PromotionCode = PromotionCode::find($request->input('PromotionCode'));

        return view('admin.promotioncode.edit', [ 
            'PromotionCode'  => $PromotionCode,
            ]);
    }

    public function update(Request $request)
    {
        $PromotionCode = PromotionCode::find($request->input('PromotionCode'));

        $PromotionCode->Name            = $request->input('Name');
        $PromotionCode->Description     = $request->input('Description');
        $PromotionCode->Code            = $request->input('Code');
        $PromotionCode->Quota           = $request->input('Quota');

        $PromotionCode->save();
        $request->session()->flash('message', 'Successfully updated Promotion Code.');

        return redirect()->route('admin.promotioncode.index');
    }

    public function delete(Request $request)
    {
        $PromotionCode = PromotionCode::find($request->input("PromotionCode"));
        
        if($PromotionCode){
            
            $PromotionCode->delete();
        }
        
        return redirect()->route('admin.promotioncode.index');
    }
}