<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PriceCategory;
use App\Models\TypeCategory;
use App\Models\CustomPattern;
use Config\Constants;

class CustomPatternController extends Controller
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

    public function index(Request $request)
    {
        $CustomPatterns = CustomPattern::all();

        return view('admin.custompattern.index',  array(
            'CustomPatterns'        => $CustomPatterns,
        ));
    }

    public function add(Request $request)
    {
        return view('admin.custompattern.add');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'Name'              => 'required',
            'Preview'           => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        
        $previewImage = time() . '_' . request()->Preview->getClientOriginalName();
        request()->Preview->move(public_path(Config('Constants.directory.custom_patterns')), $previewImage);

        $user = auth()->user();
        $CustomPattern = new CustomPattern();
        $CustomPattern->Name            = $request->input('Name');
        $CustomPattern->Preview         = Config('Constants.directory.custom_patterns') . '/' . $previewImage;
        $CustomPattern->Submitter       = $user->id;
        
        $CustomPattern->save();
        $request->session()->flash('message', 'Successfully created custom pattern.');

        return redirect()->route('admin.custompattern.index');
    }

    public function edit(Request $request)
    {
        $CustomPattern = CustomPattern::find($request->input('CustomPattern'));
        $TypeCategories = TypeCategory::all();
        $PriceCategories = PriceCategory::all();

        return view('admin.custompattern.edit', [ 
            'CustomPattern'   => $CustomPattern,
            'TypeCategories'    => $TypeCategories,
            'PriceCategories'   => $PriceCategories,
            ]);
    }

    public function update(Request $request)
    {
        // if(!auth()->user()->role == Config("Constants.userrole.submitter"))
            
        //     $validatedData = $request->validate([
        //         'PriceCategory'     => 'required',
        //         'TypeCategory'      => 'required',
        //     ]);

        $CustomPattern = CustomPattern::find($request->input('CustomPattern'));

        $CustomPattern->Name           = $request->input('Name');


        if(!is_null(request()->Preview))
        {
            $previewImage = time() . '_' . request()->Preview->getClientOriginalName();
            request()->Preview->move(public_path(Config('Constants.directory.custom_patterns')), $previewImage);

            $filepath = public_path($CustomPattern->Preview);
            if(\File::exists($filepath)) \File::delete($filepath);

            $CustomPattern->Preview         = Config('Constants.directory.custom_patterns') . '/' . $previewImage;
        }

        
        $CustomPattern->Approved        = $request->input('Approve') == 'on'? true : false;
        $CustomPattern->TypeCategory    = $request->input('TypeCategory');
        $CustomPattern->PriceCategory   = $request->input('PriceCategory');

        $CustomPattern->Accepted        = $request->input('Accept') == 'on'? true : false;
        

        $CustomPattern->save();
        $request->session()->flash('message', 'Successfully updated custom pattern.');

        return redirect()->route('admin.custompattern.index');
    }

    public function delete(Request $request)
    {
        $CustomPattern = CustomPattern::find($request->input("CustomPattern"));
        
        if($CustomPattern){
            
            $filepath = public_path($CustomPattern->preview);
            if(\File::exists($filepath)) \File::delete($filepath);

            $customize = $CustomPattern->customize;
            $CustomPattern->delete();
        }
        
        return redirect()->route('admin.custompattern.index', ['customize' => $customize ] );
    }
}
