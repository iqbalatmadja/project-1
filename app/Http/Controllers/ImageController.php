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
