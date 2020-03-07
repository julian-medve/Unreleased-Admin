<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
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
        return view('admin.customer.index', array(
            'customers'  => User::where('role', Config('Constants.userrole.customer'))->get()
        ));
    }

    
    public function add()
    {
        return view('admin.customer.add');
    }

    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'name'              => 'required|min:1|max:255',
            'email'             => 'required|max:255|unique:users',
        ]);

        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'role'  => Config('Constants.userrole.customer'),
        ]);

        $request->session()->flash('message', 'Successfully created new Customer.');

        return redirect()->route('admin.customer.index');
    }


    public function edit(Request $request)
    {
        $user = User::find($request->input('id'));

        return view('admin.customer.edit', [ 
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

        $request->session()->flash('message', 'Successfully updated Customer.');

        return redirect()->route('admin.customer.index');
    }

    public function delete(Request $request){
        
        $user = User::find($request->input("id"));
        
        $user->delete();
        
        $request->session()->flash('message', 'Successfully deleted Customer.');
        $request->session()->flash('back', 'admin.customer.index');
        
        return redirect()->route('admin.customer.index');
    }
}