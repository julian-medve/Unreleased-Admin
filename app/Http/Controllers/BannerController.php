<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use File;

class BannerController extends Controller
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
        return view('admin.banner.index', array(
            'bannerlist'  => Banner::all()
        ));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function add(Request $request){
        return view('admin.banner.add');
    }

    public function store(Request $request)
    {
        request()->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:width=1081,height=484',
        ]);

        $imageName = time() . '_' . request()->image->getClientOriginalName();
        request()->image->move(public_path(Config('Constants.directory.banners')), $imageName);

        $bannerlist = new Banner();
        $bannerlist->filepath = Config('Constants.directory.banners') . '/' . $imageName;
        $bannerlist->url = $request->input('url');
        $bannerlist->save();

        request()->session()->flash('message', 'Successfully created banner.');
        
        return redirect()->route('admin.banner.index');
    }

    
    public function edit(Request $request){

        $banner = Banner::find($request->input('id'));
        return  view('admin.banner.edit', compact('banner'));
    }

    public function update(Request $request){

        request()->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:width=1081,height=484',
        ]);

        $imageName = time() . '_' . request()->image->getClientOriginalName();
        request()->image->move(public_path(Config('Constants.directory.banners')), $imageName);

        $banner = Banner::find($request->input('id'));
        $banner->filepath = Config('Constants.directory.banners') . '/' . $imageName;
        $banner->url = $request->input('url');
        $banner->save();

        request()->session()->flash('message', 'Successfully updated banner.');
        
        return redirect()->route('admin.banner.index');
    }

    public function delete(Request $request){
        
        $banner = Banner::where('id', '=', $request->input('id'))->first();
        
        $banner_path = public_path($banner->filepath);
        if(\File::exists($banner_path)) \File::delete($banner_path);

        $banner->delete();
        
        $request->session()->flash('message', 'Successfully deleted banner.');
        $request->session()->flash('back', 'admin.banner');
        
        return redirect()->route('admin.banner.index');
    }


}