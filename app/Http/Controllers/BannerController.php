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
        return view('admin.banner', array(
            'bannerlist'  => Banner::all()
        ));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function upload(Request $request)
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

        request()->session()->flash('message', 'Successfully uploaded banner.');
        
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