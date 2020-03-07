<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class PatternSubmitterController extends Controller
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
        return view('admin.patternsubmitter.index', array(
            'Submitters'  => User::where('role', Config('Constants.userrole.submitter'))->get()
        ));
    }

    public function enable(Request $request)
    {
        $user = User::find($request->input('id'));
        
        $user->allowed = true;
        $user->save();

        $request->session()->flash('message', 'Successfully updated Pattern Submitter.');

        return redirect()->route('admin.patternsubmitter.index');
    }

    public function disable(Request $request)
    {
        $user = User::find($request->input('id'));
        
        $user->allowed = false;
        $user->save();

        $request->session()->flash('message', 'Successfully updated Pattern Submitter.');

        return redirect()->route('admin.patternsubmitter.index');
    }

    public function delete(Request $request){
        
        $user = User::find($request->input("id"));
        
        $user->delete();
        
        $request->session()->flash('message', 'Successfully deleted Pattern Submitter.');
        
        return redirect()->route('admin.patternsubmitter.index');
    }
}