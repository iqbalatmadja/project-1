<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function index()
    {
        return view('test.index');
    }

    public function datepickers()
    {
        return view('test.datepickers');
    }

    public function echarts()
    {
        return view('test.echarts');
    }

    public function ckeditor()
    {
        return view('test.ckeditor');
    }

    public function ajax1()
    {
        return response()->json([
    	    'name' => 'Abigail',
    	    'state' => 'CA'
    	]);
    }
}
