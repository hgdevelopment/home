<?php

namespace App\Http\Controllers\hr;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\country;
use App\hr_company;
use App\hr_branch;
use App\hr_department;
use App\hr_designation;
use App\User;
use App\hr_emp_personal_details;
use App\hr_emp_address;
use App\hr_emp_certificate;
use App\hr_emp_experience;
use App\hr_emp_family_details;
use App\hr_emp_qualification;
use App\hr_emp_references;
use App\hr_emp_skills;
use App\hr_religion;
use App\hr_emp_proofs;
use App\log;
use App\hr_salary_allowance;

use Auth;
use Mail;
use DataTables;
use DB;
use PDF;
use Alert;



class employeeController extends Controller
{
    //
    public function index(){

    }
    public function addEmployee(){
    	$listTypes= ['country'=>country::all(),
                     'company'=>hr_company::all(),
                     'department'=>hr_department::all(),
                     'religion'=>hr_religion::all()];

    	return view('hr.employee.add_employee',compact('listTypes'));
    }
    public function listEmployee(){
        $data=['password'=>'4646dt','username'=>'evxvvx','name'=>'gdvd'];
        return view('hr.employee.list_employee',compact('data'));
    }
    public function datatable_employee(Request $request){
       $data= DB::table('logins')

                     ->join('hr_emp_personal_details', function ($join) {
                        $join->on('logins.id', '=', 'hr_emp_personal_details.user_id')
                             ->orderBy('hr_emp_personal_details.company_id', 'desc');
                         })
                     ->join('hr_companies', function ($join) {
                        $join->on('hr_emp_personal_details.company_id', '=', 'hr_companies.id');
                         })
                     ->join('hr_branch', function ($join) {
                        $join->on('hr_emp_personal_details.branch_id', '=', 'hr_branch.id');
                         })
                     ->join('hr_departments', function ($join) {
                        $join->on('hr_emp_personal_details.department_id', '=', 'hr_departments.id');
                         })
                     ->join('hr_designation', function ($join) {
                        $join->on('hr_emp_personal_details.designation_id', '=', 'hr_designation.id');
                         })
                     ->select([
                           'logins.id as user_id',
                            DB::raw('@rownum  := @rownum  + 1 AS rownum'),
                            'hr_emp_personal_details.code as code',
                            'hr_emp_personal_details.name as name',
                            'hr_companies.company_name as company',
                            'hr_branch.branch_name as branch',
                            'hr_departments.department_name as department',
                            'hr_designation.designation_name as designation',
                            'hr_emp_personal_details.gender as gender',
                            'hr_emp_personal_details.dob as dob',
                            'logins.userType as usertype',
                            'logins.status as status']);
                     
                     // ->where('logins.status','Active')
                     // ->get()
                        if ($name = $request->get('name')) {
                          //  print($datatable->request->get('name'));
                             $data->where('hr_emp_personal_details.name', 'like', "$name%");
                        }
                        if ($code = $request->get('code')) {
                            $data->where('hr_emp_personal_details.code', 'like', "$code%");
                        }
                        if($usertype = $request->get('usertype') &&  $request->get('usertype')!='All'){
                            $data->where('logins.userType', '=', $request->get('usertype'));
                        }else{
                             $data->whereIn('logins.userType', ['EMP', 'OI', 'ME']);
                        }
                        if ($status = $request->get('status')) {
                            $data->where('logins.status', 'like', "$status%");
                        }
        $datatable= DataTables::of($data)
            ->addColumn('action', function ($data) {
                return '<div class="dropdown">
                  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Action
                  <span class="caret"></span></button>
                  <ul class="dropdown-menu">
                    <li><a href="#" class="view-employee" data-id="'.$data->user_id.'"><i class="fa fa-eye" aria-hidden="true"></i> View</a></li>
                    
                  </ul>
                </div>';  });
           
        
         return $datatable->make(true);
    }
    public function view($id){
        $listTypes= ['country'=>country::all(),
                     'company'=>hr_company::all(),
                     'department'=>hr_department::all(),
                     'religion'=>hr_religion::all()];

        $data= DB::table('logins')
                     ->where('logins.id',$id)
                     ->join('hr_emp_personal_details', function ($join) {
                        $join->on('logins.id', '=', 'hr_emp_personal_details.user_id')
                             ->orderBy('hr_emp_personal_details.company_id', 'desc');
                         })
                     ->leftJoin('hr_companies', 'hr_emp_personal_details.company_id', '=', 'hr_companies.id')
                     ->leftJoin('countries','countries.id', '=', 'hr_emp_personal_details.nationality') 
                     ->leftJoin('hr_branch', 'hr_emp_personal_details.branch_id', '=', 'hr_branch.id')
                     ->leftJoin('hr_departments', 'hr_emp_personal_details.department_id', '=', 'hr_departments.id')
                     ->leftJoin('hr_designation','hr_emp_personal_details.designation_id', '=', 'hr_designation.id')
                     ->leftJoin('hr_religions','hr_religions.id', '=', 'hr_emp_personal_details.religion') 
                     ->leftJoin('hr_emp_proofs', 'hr_emp_proofs.user_id', '=', 'logins.id')
                    ->select('*','logins.status as emp_status','hr_emp_personal_details.email as p_email')
                     ->get();

        $address =  DB::table('hr_emp_address')
                    ->where('hr_emp_address.user_id',$id)
                    ->leftjoin('countries','countries.id', '=', 'hr_emp_address.country')
                    ->select('countries.*','hr_emp_address.*','hr_emp_address.id as addr_id')
                    ->get();
         $skills =  DB::table('hr_emp_skills')
                    ->where('hr_emp_skills.user_id',$id)
                    ->get();
      return view('hr.employee.view_employee',compact('data','id','address','skills','listTypes'));
    }
    public function qualification($id){
          $data= DB::table('logins')
                     ->where('logins.id',$id)
                     ->join('hr_emp_personal_details', function ($join) {
                        $join->on('logins.id', '=', 'hr_emp_personal_details.user_id')
                             ->orderBy('hr_emp_personal_details.company_id', 'desc');
                         })
                     ->join('hr_branch', function ($join) {
                        $join->on('hr_emp_personal_details.branch_id', '=', 'hr_branch.id');
                         })
                     ->join('hr_designation', function ($join) {
                        $join->on('hr_emp_personal_details.designation_id', '=', 'hr_designation.id');
                         })
                     ->get();
          $qualification = DB::table('hr_emp_qualification') 
                        ->where('user_id',$id)->get();       
      return view('hr.employee.qualification_employee',compact('data','id','qualification'));
    }
    public function certificate($id){
         $data= DB::table('logins')
                     ->where('logins.id',$id)
                     ->join('hr_emp_personal_details', function ($join) {
                        $join->on('logins.id', '=', 'hr_emp_personal_details.user_id')
                             ->orderBy('hr_emp_personal_details.company_id', 'desc');
                         })
                     ->join('hr_branch', function ($join) {
                        $join->on('hr_emp_personal_details.branch_id', '=', 'hr_branch.id');
                         })
                     ->join('hr_designation', function ($join) {
                        $join->on('hr_emp_personal_details.designation_id', '=', 'hr_designation.id');
                         })
                     ->get();
          $certificate = DB::table('hr_emp_certificate') 
                        ->where('user_id',$id)->get();       
      return view('hr.employee.certificate_employee',compact('data','id','certificate'));
    }
    public function family($id){
         $data= DB::table('logins')
                     ->where('logins.id',$id)
                     ->join('hr_emp_personal_details', function ($join) {
                        $join->on('logins.id', '=', 'hr_emp_personal_details.user_id')
                             ->orderBy('hr_emp_personal_details.company_id', 'desc');
                         })
                     ->join('hr_branch', function ($join) {
                        $join->on('hr_emp_personal_details.branch_id', '=', 'hr_branch.id');
                         })
                     ->join('hr_designation', function ($join) {
                        $join->on('hr_emp_personal_details.designation_id', '=', 'hr_designation.id');
                         })
                     ->get();
          $family = DB::table('hr_emp_family_details') 
                        ->where('userid',$id)->get();       
      return view('hr.employee.family_employee',compact('data','id','family'));
    }
    public function experience($id){
             $data= DB::table('logins')
                     ->where('logins.id',$id)
                     ->join('hr_emp_personal_details', function ($join) {
                        $join->on('logins.id', '=', 'hr_emp_personal_details.user_id')
                             ->orderBy('hr_emp_personal_details.company_id', 'desc');
                         })
                     ->join('hr_branch', function ($join) {
                        $join->on('hr_emp_personal_details.branch_id', '=', 'hr_branch.id');
                         })
                     ->join('hr_designation', function ($join) {
                        $join->on('hr_emp_personal_details.designation_id', '=', 'hr_designation.id');
                         })
                     ->get();
          $experience = DB::table('hr_emp_experience') 
                        ->where('user_id',$id)->get();       
      return view('hr.employee.experience_employee',compact('data','id','experience'));
    }
    public function reference($id){
          $data= DB::table('logins')
                     ->where('logins.id',$id)
                     ->join('hr_emp_personal_details', function ($join) {
                        $join->on('logins.id', '=', 'hr_emp_personal_details.user_id')
                             ->orderBy('hr_emp_personal_details.company_id', 'desc');
                         })
                     ->join('hr_branch', function ($join) {
                        $join->on('hr_emp_personal_details.branch_id', '=', 'hr_branch.id');
                         })
                     ->join('hr_designation', function ($join) {
                        $join->on('hr_emp_personal_details.designation_id', '=', 'hr_designation.id');
                         })
                     ->get();
          $references = DB::table('hr_emp_references') 
                        ->where('user_id',$id)->get();       
      return view('hr.employee.references_employee',compact('data','id','references'));
    }

    public function editEmployee(){
        $listTypes= ['country'=>country::all(),
                     'company'=>hr_company::all(),
                     'department'=>hr_department::all()];

        return view('hr.employee.edit_employee',compact('listTypes'));
    }
    
    public function ajax_branch(Request $request){
        $branch = hr_branch::where('company_id',$request->_id)->get();
       return response()->json($branch);
    }
    public function ajax_designation(Request $request){
        $designation = hr_designation::where('department_id',$request->_id)->get();
       return response()->json($designation);
    }
    public function ajax_employee_id_exist(Request $request){
       $code=str_pad($request->emplyee_id,10,"0",STR_PAD_LEFT);
       if(User::where('username',$code)->count()>0){
       	return response()->json(array('valid' => false));
       }

       return response()->json(array('valid' => true));
    }
    public function generateRandomString($length = 4) {
	    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }
	    return $randomString;
	}
    public function create(Request $request){
    	$this->validate($request,[
		'emplyee_id'=>'required',
		'name'=>'required',
	    ]);
        $code_username=str_pad($request->emplyee_id,10,"0",STR_PAD_LEFT);
        $user = User::where('username',$code_username)->get();
        if(count($user)>0){
            return response()->json(array('result' => false,'msg'=>'Employee ID Already Exist'.'('.$request->emplyee_id.')'));
        }
	    $user = new User;
	    $persoanl = new hr_emp_personal_details;
	    $c_address = new hr_emp_address;
	    $t_address = new hr_emp_address;
	    $skills = new hr_emp_skills;
        $proofs = new hr_emp_proofs;
        $password=$this->generateRandomString();
	    $user->username=$code_username;
	    $user->password=Hash::make($password);
	    $user->userType=$request->scheeme;
	    $user->status=$request->status;
	    $user->save();
	    $username=$code_username;
        $email_id=$request->email;
	    $user_id=$user->id;
        $persoanl_name=$request->name;
	    //photo upload
		$profilepic = 'HEERA_EMPLOYEE'.time().'.'.$request->photo->getClientOriginalExtension();
		$request->photo->move(storage_path('img/employee'), $profilepic);
         
	    $persoanl->user_id=$user_id;
	    $persoanl->name=$request->name;
        $persoanl->salutation_name=$request->emp_name;
        $persoanl->salutation_guardian=$request->emp_name_g;
	    $persoanl->code=$username;
	    $persoanl->guardian=$request->gname;
	    $persoanl->gender=$request->gender;
	    $persoanl->dob=Carbon::createFromFormat('d/m/Y', $request->dob)->format('Y-m-d');
	    $persoanl->marital_status=$request->marital_s;
	    $persoanl->religion=$request->religion;
	    $persoanl->caste=$request->caste;
	    $persoanl->bloodgroup=$request->bloodgroup;
	    $persoanl->nationality=$request->nationality;
	    $persoanl->mobile=$request->mobile;
	    $persoanl->email=$request->email;
	    $persoanl->photo=$profilepic;
	    $persoanl->company_id=$request->company;
	    $persoanl->branch_id=$request->branch;
	    $persoanl->department_id=$request->department;
	    $persoanl->designation_id=$request->designation;
	    $persoanl->date_of_joining=Carbon::createFromFormat('d/m/Y', $request->dateofjoing)->format('Y-m-d');
	    $persoanl->work_shift=json_encode(array('from' => $request->workshift_from, 'to'=>$request->workshift_to));
	    $persoanl->salary=$request->monthly_sal;
	    $persoanl->job_type=$request->jobtype;
	    $persoanl->added_id=Auth::guard('admin')->user()->id;
	    $persoanl->save();

        $c_address->user_id=$user_id;
        $c_address->address=$request->c_address;
        $c_address->city=$request->c_city;
        $c_address->state=$request->c_state;
        $c_address->country=$request->c_country;
        $c_address->zip_code=$request->c_zip;
        $c_address->type='correspondence';
        $c_address->save();

        $t_address->user_id=$user_id;
        $t_address->address=$request->p_address;
        $t_address->city=$request->p_city;
        $t_address->state=$request->p_state;
        $t_address->country=$request->p_country;
        $t_address->zip_code=$request->p_zip;
        $t_address->type='permanent';
        $t_address->save();

        $skills->user_id=$user_id;
        $skills->computer=$request->computer_skill;
        $skills->typing_speed=$request->typing_speed;
        $skills->knowldge=$request->knowledge;
        $skills->hobbies=$request->hobbies;
        $skills->save();

        $proofs->user_id=$user_id;
        $proofs->proof_type=$request->proof_type;
        $proofs->proof_number=$request->proof_number;
        $proofs->save();



	    for ($i=0; $i<count($request->course_cer); $i++ ) {
        	if($request->course_cer[$i]!=''){
        	$certificate = new hr_emp_certificate;
        	$certificate->user_id=$user_id;
        	$certificate->course=$request->course_cer[$i];
        	$certificate->authority=$request->authority[$i];
        	$certificate->institution=$request->institution[$i];
        	$certificate->year=$request->year_cer[$i];
        	$certificate->save();
        	}
        }
        for ($i=0; $i<count($request->exp_organisation); $i++ ) {
        	if($request->exp_organisation[$i]!=''){
        	$experience = new hr_emp_experience;
        	$experience->user_id=$user_id;
        	$experience->organisation=$request->exp_organisation[$i];
        	$experience->designation=$request->exp_designation[$i];
        	$experience->responsibilities=$request->exp_responsibilities[$i];
        	$experience->income=$request->exp_income[$i];
        	$experience->timeperiod=$request->exp_period[$i].'-'.$request->exp_period_2[$i];
        	$experience->save();
        	}
        }

        for ($i=0; $i<count($request->f_name); $i++ ) {
        	if($request->f_name[$i]!=''){
        	$family = new hr_emp_family_details;
        	$family->userid=$user_id;
        	$family->name=$request->f_name[$i];
        	$family->relationship=$request->f_relation[$i];
        	$family->gender=$request->f_gender[$i];
        	$family->mobile=$request->f_mobile[$i];
        	$family->save();
        	}
        }
        for ($i=0; $i<count($request->course); $i++ ) {
        	if($request->course[$i]!=''){
        	$qualification = new hr_emp_qualification;
        	$qualification->user_id=$user_id;
        	$qualification->course=$request->course[$i];
        	$qualification->university=$request->ac_institution[$i];
        	$qualification->pass_out=$request->year_pass[$i];
        	$qualification->marks=$request->mark_pers[$i];
        	$qualification->specialization=$request->specialization[$i];
        	$qualification->save();
        	}
        }
        for ($i=0; $i<count($request->r_name); $i++ ) {
        	if($request->r_name[$i]!=''){
        	$reference = new hr_emp_references;
        	$reference->user_id=$user_id;
        	$reference->name=$request->r_name[$i];
        	$reference->mobile_no=$request->r_mobile[$i];
        	$reference->email_id=$request->r_email[$i];
        	$reference->relationship=$request->r_relationship[$i];
        	$reference->save();
        	}
        }
            $log = new log();
            $log->ip_address =  \Request::getClientIp(true);
            $log->user = Auth::guard('admin')->user()->id;
            $log->actions = "Created Employee-".$code_username;
            $log->save();

        


	    
	   return response()->json(array('result' => true,'id'=>$user_id));
    }

    // updations
    public function personal_update(Request $request)
    {
        
        $persoanl_de=hr_emp_personal_details::where('user_id',$request->_id)->first();
        $persoanl_de->name=$request->p_name;
        $persoanl_de->salutation_name=$request->emp_name;
        $persoanl_de->salutation_guardian=$request->emp_name_g;
        $persoanl_de->guardian=$request->p_gname;
        $persoanl_de->gender=$request->p_gender;
        $persoanl_de->dob=Carbon::createFromFormat('d/m/Y', $request->p_dob)->format('Y-m-d');
        $persoanl_de->marital_status=$request->p_marital;
        $persoanl_de->religion=$request->p_religion;
        $persoanl_de->caste=$request->p_caste;
        $persoanl_de->bloodgroup=$request->bloodgroup;
        $persoanl_de->nationality=$request->p_nationality;
        $persoanl_de->mobile=$request->p_mobile;
        $persoanl_de->email=$request->p_email;
        if ($request->hasFile('photo')) {
            $profilepic = 'HEERA_EMPLOYEE'.time().'.'.$request->photo->getClientOriginalExtension();
            $request->photo->move(storage_path('img/employee'), $profilepic);
            $persoanl_de->photo=$profilepic;
        }
        $persoanl_de->save();
        $proofs=hr_emp_proofs::where('user_id','=',$request->_id)->first();
        if($proofs){
        $proofs->proof_type=$request->proof_type;
        $proofs->proof_number=$request->proof_number;
        $proofs->save();
          
        }else{
          $proof=new hr_emp_proofs;
          $proof->user_id=$request->_id;
          $proof->proof_type=$request->proof_type;
          $proof->proof_number=$request->proof_number;
          $proof->save();
        }
       

        return response()->json(array('result' => true));
    }
    public function company_update(Request $request)
    {
        $persoanl_de=hr_emp_personal_details::where('user_id',$request->_id)->first();
        $persoanl_de->company_id=$request->company;
        $persoanl_de->branch_id=$request->branch;
        $persoanl_de->department_id=$request->department;
        $persoanl_de->designation_id=$request->designation;

        $persoanl_de->date_of_joining=Carbon::createFromFormat('d/m/Y', $request->dateofjoing)->format('Y-m-d');
        $persoanl_de->work_shift=json_encode(array('from' => $request->workshift_from, 'to' => $request->workshift_to));
        $persoanl_de->salary=$request->monthly_sal;
        $persoanl_de->job_type=$request->jobtype;
        $persoanl_de->save();
        $user=User::where('id',$request->_id)->first();
        $user->userType=$request->scheeme;
        $user->status=$request->status;
        $user->save();
        return response()->json(array('result' => true));
    }

    public function address_update(Request $request)
    {
        $address=hr_emp_address::where('id',$request->_id_ad)->first();
        $address->address=$request->_address;
        $address->city=$request->_city;
        $address->state=$request->_state;
        $address->country=$request->_country;
        $address->zip_code=$request->_zip_code;
        $address->save();
        return response()->json(array('result' => true));
    }
    public function address_new(Request $request)
    {
        $addr_count=hr_emp_address::where('user_id',$request->_id)->where('type',$request->_type)->count();
        if($addr_count>0){
            return response()->json(array('result' => false,'msg'=> ucfirst($request->_type).'address already exist'));
        }
        $address=new hr_emp_address;
        $address->user_id=$request->_id;
        $address->address=$request->_address;
        $address->city=$request->_city;
        $address->state=$request->_state;
        $address->country=$request->_country;
        $address->zip_code=$request->_zip_code;
        $address->type=$request->_type;
        $address->save();
        return response()->json(array('result' => true));
    }
    public function skills_update(Request $request){
        $skills=hr_emp_skills::where('user_id',$request->_id)->first();
        $skills->computer=$request->computer;
        $skills->typing_speed=$request->typingspeed;
        $skills->knowldge=$request->knowledge;
        $skills->hobbies=$request->hobbies;
        $skills->save();
        return response()->json(array('result' => true));
    }
    public function qualificaton_update(Request $request){
        $qualificaton=hr_emp_qualification::where('user_id',$request->_id);

        if(count($qualificaton)>0){
           $qualificaton->delete();
           }
           //return count($request->course);

        for ($i=0; $i<count($request->course); $i++ ) {
            if($request->course[$i]!=''){
            $qualification = new hr_emp_qualification;
            $qualification->user_id=$request->_id;
            $qualification->course=$request->course[$i];
            $qualification->university=$request->instute[$i];
            $qualification->pass_out=$request->year_passing[$i];
            $qualification->marks=$request->year_marks[$i];
            $qualification->specialization=$request->special[$i];
            $qualification->save();
            }
        }
        return response()->json(array('result' => true));
    }
    public function certificate_update(Request $request){
        $certificate=hr_emp_certificate::where('user_id',$request->_id);

        if(count($certificate)>0){
           $certificate->delete();
           }
        for ($i=0; $i<count($request->course); $i++ ) {
            if($request->course[$i]!=''){
            $certificate = new hr_emp_certificate;
            $certificate->user_id=$request->_id;
            $certificate->course=$request->course[$i];
            $certificate->authority=$request->authority[$i];
            $certificate->institution=$request->instute[$i];
            $certificate->year=$request->year[$i];
            $certificate->save();
            }
        }
        return response()->json(array('result' => true));
    }
    public function family_update(Request $request){
        $family=hr_emp_family_details::where('userid',$request->_id);

        if(count($family)>0){
           $family->delete();
           }
        for ($i=0; $i<count($request->f_name); $i++ ) {
            if($request->f_name[$i]!=''){
            $family = new hr_emp_family_details;
            $family->userid=$request->_id;
            $family->name=$request->f_name[$i];
            $family->relationship=$request->f_relation[$i];
            $family->gender=$request->f_gender[$i];
            $family->mobile=$request->f_mobile[$i];
            $family->save();
            }
        }
        return response()->json(array('result' => true));
    }
    public function experience_update(Request $request){
        $experience=hr_emp_experience::where('user_id',$request->_id);

        if(count($experience)>0){
           $experience->delete();
           }
        for ($i=0; $i<count($request->exp_organisation); $i++ ) {
            if($request->exp_organisation[$i]!=''){
            $experience = new hr_emp_experience;
            $experience->user_id=$request->_id;
            $experience->organisation=$request->exp_organisation[$i];
            $experience->designation=$request->exp_designation[$i];
            $experience->responsibilities=$request->exp_responsibilities[$i];
            $experience->income=$request->exp_income[$i];
            $experience->timeperiod=$request->exp_period[$i].'-'.$request->exp_period_2[$i];
            $experience->save();
            }
        }
        return response()->json(array('result' => true));
    }
    public function reference_update(Request $request){
        $reference=hr_emp_references::where('user_id',$request->_id);

        if(count($reference)>0){
           $reference->delete();
           }
        for ($i=0; $i<count($request->r_name); $i++ ) {
            if($request->r_name[$i]!=''){
            $reference = new hr_emp_references;
            $reference->user_id=$request->_id;
            $reference->name=$request->r_name[$i];
            $reference->mobile_no=$request->r_mobile[$i];
            $reference->email_id=$request->r_email[$i];
            $reference->relationship=$request->r_relationship[$i];
            $reference->save();
            }
        }
        return response()->json(array('result' => true));
    }
    
    
    public function viewAppointmentLetter()
    {
        return view('hr.employee.appointmentletter'); 
    }

    public function createAppointment(Request $request)
    {
        $letter=hr_emp_personal_details::where('code', 'like', $request->employeecode)->first();
         if(count($letter)==0) {
            Alert::info('no records found','info');
        return redirect('hr/employee/appointment_letter_view');
        }else{
    
        return view('hr.employee.appointmentletter_view',compact('letter')); }
    }
    public function appointment_letter($id)
    {
        $employee_details = hr_emp_personal_details::join('hr_companies','hr_companies.id','=','hr_emp_personal_details.company_id')
        ->where('hr_emp_personal_details.code',$id)
        ->leftjoin('hr_departments','hr_departments.id','=','hr_emp_personal_details.department_id')
        ->leftjoin('hr_emp_address','hr_emp_address.user_id','=','hr_emp_personal_details.user_id')
        ->leftjoin('hr_branch','hr_branch.id','=','hr_emp_personal_details.branch_id')
        ->leftjoin('hr_designation','hr_designation.id','=','hr_emp_personal_details.designation_id')
        ->leftjoin('countries','countries.id','=','hr_emp_personal_details.nationality')
        ->select('hr_companies.*','countries.*','hr_departments.*','hr_branch.*','hr_designation.*','hr_emp_personal_details.*','hr_emp_address.address as useraddress', 'hr_emp_address.city as usercity', 'hr_emp_address.state as userstate', 'hr_emp_address.zip_code as userzipcode')
        ->first();

       
        // select `hr_companies`.*, `hr_departments`.*, `hr_branch`.*,`hr_designation`.* , `hr_emp_personal_details`.* from `hr_emp_personal_details` left join `hr_companies` on `hr_companies`.`id` = `hr_emp_personal_details`.`id` left join `hr_departments` on `hr_departments`.`id` = `hr_emp_personal_details`.`id` left join `hr_branch` on `hr_branch`.`id` = `hr_emp_personal_details`.`id` left join `hr_designation` on `hr_designation`.`id` = `hr_emp_personal_details`.`id` where `hr_emp_personal_details`.`code` = '0000000691' limit 1

        //DB::enableQueryLog();

        $salary=hr_salary_allowance::where('company_id','=',$employee_details->company_id)->get();
        $terms=DB::table('appointent_letter')->get();
        //dd(DB::getQueryLog());
        $pdf =PDF::loadView('hr.employee.appointment',compact('employee_details','salary','terms'));
        return $pdf->stream();
    }
    public function createExperience(){
        return view('hr.employee.experience_certificate_employee');
    }
    public function createExperience_view(Request $request){
        $id=$request->employeecode;
        $resignation_data = DB::table('hr_resignations')
                ->join('logins','logins.id','=','hr_resignations.resign_employee')
                ->where('logins.username',$id)->get();

        return view('hr.employee.experience_certificate_employee',compact('id','resignation_data'));
    }
    public function createExperience_pdf($id){
      $employee_details = hr_emp_personal_details::join('hr_companies','hr_companies.id','=','hr_emp_personal_details.company_id')
        ->where('hr_emp_personal_details.code',$id)
        ->leftjoin('hr_departments','hr_departments.id','=','hr_emp_personal_details.department_id')
        ->leftjoin('hr_emp_address','hr_emp_address.user_id','=','hr_emp_personal_details.user_id')
        ->leftjoin('hr_branch','hr_branch.id','=','hr_emp_personal_details.branch_id')
        ->leftjoin('hr_designation','hr_designation.id','=','hr_emp_personal_details.designation_id')
        ->leftjoin('countries','countries.id','=','hr_emp_personal_details.nationality')
        ->leftjoin('hr_resignations','hr_resignations.resign_employee','=','hr_emp_personal_details.user_id')
        ->select('hr_companies.*','countries.*','hr_departments.*','hr_branch.*','hr_designation.*','hr_emp_personal_details.*','hr_emp_address.address as useraddress', 'hr_emp_address.city as usercity', 'hr_emp_address.state as userstate', 'hr_emp_address.zip_code as userzipcode','hr_resignations.resign_date')
        ->first();
       
        $pdf =PDF::loadView('hr.employee.experience_certificate_employee_pdf',compact('employee_details','salary','terms'));
        return $pdf->stream();
       
    }
}
