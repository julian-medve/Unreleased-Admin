<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faq;

class FaqController extends Controller
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
    
    public function index()
    {
        return view('admin.settings.faq.index', array(
            'faq'  => Faq::all()->first(),
        ));
    }

    public function update(Request $request)
    {
        if($request->input('Id'))
            $faq = Faq::find($request->input('Id'));
        else
            $faq = new Faq();
                     
        $faq->Url   = $request->input('Url');
        $faq->save();
    

        $request->session()->flash('message', 'Successfully saved Faq URL.');
        return back();
    }
    
}