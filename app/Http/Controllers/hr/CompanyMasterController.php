<?php 

namespace App\Http\Controllers\hr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\hr_company;
use App\country;
use App\log;
class CompanyMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companys= hr_company::whereNull('deleted_at')->get();
        return view('hr.master.company',compact('companys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $company = new hr_company;
        $this->validate($request,[
            'company_name'=>'required|unique:hr_companies,company_name,NULL,id,deleted_at,NULL',
        ]);
         
        $company->company_name=$request->company_name;
        $company->address1=$request->address1;
        $company->address2=$request->address2;
        $company->city=$request->city;
        $company->state=$request->state;
        $company->countryId=$request->country;
        $company->pinNo=$request->pinNo;
        $company->status=1;
        $company->save();

        $log = new log();
        $log->ip_address =  \Request::getClientIp(true);
        $log->user = session('userId');
        $log->actions = "Created company-".$request->company_name;
        $log->type = "Company";
        $query = $log->save();

        return redirect('/hr/CompanyMaster');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editCompany = hr_company::leftjoin('countries','countries.id','=','hr_companies.countryId')
        ->select('countries.countryName as countryName', 'hr_companies.*')->where('hr_companies.id',$id)
        ->first();
        $companys= hr_company::get();
        return view('hr.master.editCompanyDetails',compact('editCompany','companys'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $company = hr_company::find($id);
        $this->validate($request,[
            'company_name'=>'required',
        ]);
         
        $company->company_name=$request->company_name;
        $company->address1=$request->address1;
        $company->address2=$request->address2;
        $company->city=$request->city;
        $company->state=$request->state;
        $company->countryId=$request->country;
        $company->pinNo=$request->pinNo;
        $company->status=1;
        $company->save();

        $log = new log();
        $log->ip_address =  \Request::getClientIp(true);
        $log->user = session('userId');
        $log->actions = "Edited company-".$request->company_name;
        $log->type = "Company";
        $query = $log->save();

        return redirect('/hr/CompanyMaster');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $companys = hr_company::find($id);
        $companys->delete();
        $log = new log();
        $log->ip_address =  \Request::getClientIp(true);
        $log->user = session('userId');
        $log->actions = "Deleted company-".$companys->company_name;
        $log->type = "Company";
        $query = $log->save();

    }
}
