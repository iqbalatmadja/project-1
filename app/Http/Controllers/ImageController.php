<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\Image;
class ImageController extends Controller
{
    public function index(Request $request)
    {
        abort(403, 'Unauthorized action.');
    }

    public function admin(Request $request)
    {
        $data = [];
        return view('image.admin',$data);
    }
    
    /*
    public function index(Request $request)
    {
        $data = [];
        return view('image.index',$data);
    }
    */
    
    /*
    public function save(Request $request)
    {
        $imageFile = $request->file('file');
        $imageName = $imageFile->getClientOriginalName();
        $imageFile->move(public_path('uploads/images'),$imageName);
        
        $image = new Image;
        $image->filename = $imageName;
        $image->user_id = Auth()->user()->id;
        $image->save();
        return response()->json(['success'=>$imageName]);
    }
    */
    
    /*
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
    */
}
