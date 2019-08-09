<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;
use ImageIntervention;

class ImageController extends Controller
{
    public function index(Request $request)
    {
        abort(403, 'Unauthorized action.');
    }

    public function admin(Request $request)
    {
        $images = \App\Image::where("user_id",Auth()->user()->id)->get();
        $data = ['images'=>$images];
        return view('image.admin',$data);
    }
    
    public function save(Request $request)
    {
        request()->validate([
            //'file_name' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:300',
            'file_name' => 'required|image|mimes:svg|max:300',
        ]);
        
        if ($files = $request->file('photo_name')) {
            $userId = Auth()->user()->id;
            
            $image = new Image;
            $image->filename = rand(1,9000);
            $image->user_id = $userId;
            $image->save();
            
            $fileExt = $files->getClientOriginalExtension();
            $fileName = $userId.'_'.$image->id.'_'.rand(10,99999999).'.'.$fileExt;
            
            # Updating table for new filename
            $image->filename = $fileName;
            $image->save();
            
            // for save original image
            $ImageUpload = ImageIntervention::make($files);
            $ImageUpload->save(public_path('uploads/images').'/'.$fileName);
            
            // for save thumnail image
            //$ImageUpload->resize(250,170);
            $ImageUpload->resize(125,null,function($constraint) {
                $constraint->aspectRatio(); # auto height according to aspect ratio
            });
            $ImageUpload = $ImageUpload->save(public_path('uploads/images/thumbs').'/'.$fileName);
            
            //$image = Image::latest()->first(['filename']);
            return Response()->json($image);
        }
    }

    
}
