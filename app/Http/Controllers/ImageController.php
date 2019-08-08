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
        $data = [];
        return view('image.admin',$data);
    }
    
    public function save(Request $request)
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
            //$ImageUpload->resize(250,170);
            $ImageUpload->resize(250,null,function($constraint) {
                $constraint->aspectRatio(); # auto width according to aspect ratio
            });
            $ImageUpload = $ImageUpload->save(public_path('uploads/images/thumbs').'/'.$fileName);
            
            $image = new Image;
            $image->filename = $fileName;
            $image->user_id = Auth()->user()->id;
            $image->save();
            
            $image = Image::latest()->first(['filename']);
            return Response()->json($image);
        }
    }

    
}
