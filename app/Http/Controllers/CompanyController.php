<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Company;

class CompanyController extends Controller
{
    //
    public function list(Request $request)
    {
        //$companies = Company::all(); # will need "use App\Company;" above
        // or
        //$companies = \App\Company::all(); # dont need "use App\Company;" above
        $data = [];
        return view('company.list',$data);
    }
}
