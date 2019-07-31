<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;

class CompanyController extends Controller
{
    //
    public function list(Request $request)
    {
        $companies = Company::all();
        $data = ['companies'=>$companies];
        return view('company.list',$data);
    }
}
