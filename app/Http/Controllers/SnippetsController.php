<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
    
    public function dropzone()
    {
        #using dropzone
        return view('snippets.dropzone');
    }
}
