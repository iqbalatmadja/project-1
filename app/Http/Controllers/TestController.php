<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    function roundNearestHundred($number)
    {
        $round = (strlen($number)-1)*-1;
        return round($number,$round); 
    }
    
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function index()
    {
        $x = self::roundNearestHundred(150);
        echo $x;die;
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

    public function ajax1()
    {
        return response()->json([
    	    'name' => 'Abigail',
    	    'state' => 'CA'
    	]);
    }
    
    public function countryList()
    {
        return view('test.countryList');
    }
    
    public function populateCountry(Request $request)
    {
        $countries = DB::table('countries');
        //$c = $countries->where('countryCode','AD');
        $filter1 = !empty($request->post('filter1')) ? $request->post('filter1') : '';
        $filter2 = !empty($request->post('filter2')) ? $request->post('filter2') : '';
        
        //$c = $countries;
        $conditionArray = [];
        if(!empty($filter1)){
            $conditionArray[] = ['countryName','LIKE','%'.$filter1.'%'];
        }

        if(!empty($filter2)){
            $conditionArray[] = ['currencyCode','LIKE','%'.$filter2.'%'];
        }
        
        
        $c = $countries->where($conditionArray);
        
        
        $r = $c->get();
        return response()->json(['data'=>$r]);
    }
    
    public function ajaxDummy(Request $request)
    {
        return response()->json([]);
    }
}
