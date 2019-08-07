<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\Image;
class ImageController extends Controller
{
    //
    public function index(Request $request)
    {
        //$companies = Company::all(); # will need "use App\Company;" above
        // or
        //$companies = \App\Company::all(); # dont need "use App\Company;" above
        $data = [];
        return view('image.index',$data);
    }
    
    public function save(Request $request)
    {
        $image = $request->file('file');
        $imageName = $image->getClientOriginalName();
        $image->move(public_path('uploads/images'),$imageName);
        
        $image = new Image;
        $image->filename = $imageName;
        $image->save();
        return response()->json(['success'=>$imageName]);
    }
    
    public function delete(Request $request)
    {
        $filename =  $request->get('filename');
        Image::where('filename',$filename)->delete();
        $path=public_path().'/uploads/images/'.$filename;
        if (file_exists($path)) {
            unlink($path);
        }
        return $filename;
    }
    
    
    
}
