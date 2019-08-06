<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;

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
    
    
    
    
}
