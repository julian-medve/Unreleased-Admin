<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Settings;

class SettingsController extends Controller
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
        $Faq = Settings::where('Name', 'Faq')->get()->first();
        
        if(!is_null($Faq) && !empty($Faq))
            $Faq = $Faq['Value'];


        $Production = Settings::where('Name', 'Production')->get()->first();
        
        if(!is_null($Production) && !empty($Production))
            $Production = $Production['Value'];
        

        // $Custom_Color_Price = Settings::where('Name', 'Custom_Color_Price')->get()->first();
        
        // if(!is_null($Custom_Color_Price) && !empty($Custom_Color_Price))
        //     $Custom_Color_Price = $Custom_Color_Price['Value'];


        // $Custom_Text_Price = Settings::where('Name', 'Custom_Text_Price')->get()->first();
        
        // if(!is_null($Custom_Text_Price) && !empty($Custom_Text_Price))
        //     $Custom_Text_Price = $Custom_Text_Price['Value'];

        // return view('admin.settings.others.index', compact('Faq', 'Custom_Color_Price', 'Custom_Text_Price'));

        return view('admin.settings.others.index', compact('Faq', 'Production'));
    }


    public function update(Request $request)
    {

        // Save Faq Url
        $Faq = Settings::where('Name', 'Faq')->get()->first();

        if(empty($Faq)){

            $Faq = new Settings();
            $Faq->Name       = 'Faq';
        }
        $Faq->Value      = $request->input('Faq');
        $Faq->save();


        $Production = Settings::where('Name', 'Production')->get()->first();

        if(empty($Production)){

            $Production = new Settings();
            $Production->Name       = 'Production';
        }

        if($request->input('Production') == 'on')
            $Production->Value      = true;
        else
            $Production->Value      = false;
            
        $Production->save();


        // Save Custom Color Price

        // $Custom_Color_Price = Settings::where('Name', 'Custom_Color_Price')->get()->first();

        // if(empty($Custom_Color_Price)){

        //     $Custom_Color_Price = new Settings();
        //     $Custom_Color_Price->Name       = 'Custom_Color_Price';
        // }
        // $Custom_Color_Price->Value      = $request->input('Custom_Color_Price');
        // $Custom_Color_Price->save();



        // Save Custom Text Price

        // $Custom_Text_Price = Settings::where('Name', 'Custom_Text_Price')->get()->first();

        // if(empty($Custom_Text_Price)){

        //     $Custom_Text_Price = new Settings();
        //     $Custom_Text_Price->Name       = 'Custom_Text_Price';
        // }
        // $Custom_Text_Price->Value      = $request->input('Custom_Text_Price');
        // $Custom_Text_Price->save();
    

        $request->session()->flash('message', 'Successfully saved Faq URL.');
        return back();
    }
    
}