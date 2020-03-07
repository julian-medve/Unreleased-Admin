<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Config\Constants;

class AdministratorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('super_admin');
    }
    
    public function index()
    {
        return view('admin.administrator.index', array(
            'adminlist'  => User::where('role', Config('Constants.userrole.admin'))->get()
        ));
    }

    
    public function add()
    {
        return view('admin.administrator.add');
    }

    public function createAdministrator(Request $request)
    {
        $validatedData = $request->validate([
            'name'              => 'required|min:1|max:255',
            'email'             => 'required|max:255|unique:users',
        ]);

        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'role'  => Config('Constants.userrole.admin'),
        ]);

        $request->session()->flash('message', 'Successfully created new Administrator.');

        return redirect()->route('admin.administrator.index');
    }


    public function edit(Request $request)
    {
        $user = User::find($request->input('id'));

        return view('admin.administrator.edit', [ 
            'user'  => $user,
            ]);
    }

    public function update(Request $request)
    {
        $user = User::find($request->input('id'));
        
        $user->name     = $request->input('name');
        $user->email    = $request->input('email');
        $user->password = Hash::make($request->input('password'));

        $user->save();

        $request->session()->flash('message', 'Successfully updated Administrator.');

        return redirect()->route('admin.administrator.index');
    }

    public function delete(Request $request){
        
        $user = User::find($request->input("id"));
        
        $user->delete();
        
        $request->session()->flash('message', 'Successfully deleted administrator.');
        $request->session()->flash('back', 'admin.administrator.index');
        
        return redirect()->route('admin.administrator.index');
    }
}