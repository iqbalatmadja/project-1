<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;

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
    
    public function populateCompany(Request $request)
    {
        if(empty($request)){
            $companies = Company::all();
        }else{
            $companies = Company::all();
        }
        $resultArray = [];    
        if(!empty($companies)){
            foreach ($companies as $c){
                $u = [
                    'company_id' => $c->id,
                    'company_name' => $c->name,
                    'company_status' => $c->is_active,
                    'company_status_text' => $c->is_active == 0 ? 'Inactive' : 'Active',
                    'company_created_at' => $c->created_at,
                    'company_updated_at' => $c->updated_at,
                    
                    
                ];
                array_push($resultArray,$u);
            }
        }
        $result = $resultArray;
        return response()->json(['data'=>$result]);
    }
    
    public function getEditForm(Request $request)
    {
        $view = 'company.editForm';
        $id = !empty($request->post('id')) ? $request->post('id') : '';
        $company = Company::find($id);
        if(empty($company)){
            $company = new Company;
        }
        
        $data = ['company'=>$company];
        
        return response()->view($view,$data,200)->header('Content-Type', 'text/html');
        
    }
    
    public function updateCompany(Request $request)
    {
        $frmdata = !empty($request->post('frmdata')) ? $request->post('frmdata') : '';
        $pars = [];
        parse_str($frmdata, $pars); 
        
        $companyId = $pars['cid'];
        $name = !empty($pars['n']) ? $pars['n'] : '';
        
        if(empty($companyId)){
            $company = new Company;
            $company->save();
        }else{
            $company = Company::find($companyId);
        }
        
        if(empty($company)){
           $result = 0;
           $message = 'Invalid ID!';
        }else{
            if(empty($name)){
                $result = 0;
                $message = 'A Name Is Needed!';
            }else{
                $company->name = $name;
                if($company->save()){
                    $result = 1;
                    $message = '';
                }else{
                    $result = 0;
                    $message = 'Something is wrong!';
                };
                
            }
        }
        
        $data = ['result'=>$result,'message'=>$message];
        return response()->json($data);
    }

    public function toggleCompanyStatus(Request $request)
    {
        $companyId = !empty($request->post('id')) ? $request->post('id') : 0;
        $company = Company::find($companyId);
        
        if(empty($company)){
            $result = 0;
            $message = 'Invalid ID!';
        }else{
            $company->is_active = $company->is_active == 1 ? 0 : 1;
            $company->save();
            $result = 1;
            $message = '';
        }
        
        $data = ['result'=>$result,'message'=>$message];
        return response()->json($data);
    }
    
}
