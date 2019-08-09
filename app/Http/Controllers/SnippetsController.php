<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;
use ImageIntervention;

class SnippetsController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }
    
    public function index()
    {
        return view('snippets.index');
    }
    
    public function upload1()
    {
        #using dropzone
        return view('snippets.upload1');
    }
    
    public function upload1Save(Request $request)
    {
        request()->validate([
            'photo_name' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        
        if ($files = $request->file('photo_name')) {
            
            $fileName = time().$files->getClientOriginalName();
            // for save original image
            $ImageUpload = ImageIntervention::make($files);
            $ImageUpload->save(public_path('uploads/images').'/'.$fileName);
            
            // for save thumnail image
            $ImageUpload->resize(250,125);
            $ImageUpload = $ImageUpload->save(public_path('uploads/images/thumbs').'/'.$fileName);
            
            $image = new Image;
            $image->filename = $fileName;
            $image->user_id = Auth()->user()->id;
            $image->save();
            
            $image = Image::latest()->first(['filename']);
            return Response()->json($image);
        }
    }
    
    public function ckeditor()
    {
        return view('snippets.ckeditor');
    }
    
    public function echarts()
    {
        return view('snippets.echarts');
    }
    
}
