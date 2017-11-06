<?php
namespace App\Http\Controllers\hr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\Facades\Session;
use App\hr_resignation;
use DB;
use Auth;
use Mail;
use PDF;
class resignationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $user=Auth::guard('admin')->user()->username;  
        $login=\DB::table('logins')->where('username','=',$user)
        ->join('hr_emp_personal_details','hr_emp_personal_details.user_id','=','logins.id')
        ->join('hr_designation','hr_designation.id','=','hr_emp_personal_details.designation_id')
        ->select('hr_designation.designation_name','hr_emp_personal_details.name')
        ->get();
        foreach($login as $logins)

        $resign=\DB::table('logins')->where('username','=',$user)
        ->join('hr_resignations','logins.id','=','hr_resignations.resign_employee')
        ->select('hr_resignations.resign_date','hr_resignations.resign_reason','hr_resignations.resign_status','hr_resignations.created_at')
        ->get();
        $count=count($resign);
        return view('hr.resignation.apply_resignation',compact('user','logins','resign','count'));

    }
   

    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {



    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function store(Request $request)
    { 
        
        $user=\DB::table('logins')->where('username','=',$request->from)
        ->leftjoin('hr_emp_personal_details','hr_emp_personal_details.user_id','=','logins.id')
        ->select('hr_emp_personal_details.name','logins.id')
        ->get();
        foreach($user as $users)
        $userid=$users->id;
        $user=$users->name;
        $applyresignation= new hr_resignation();
        $applyresignation->resign_employee=$userid;
        $applyresignation->resign_reason=$request->resign_reason;
        $applyresignation->resign_status='applied';
        $applyresignation->resign_date=date("Y-m-d",strtotime($request->resign_date));
        $applyresignation->status_date=date("Y-m-d");      
        $applyresignation->save();
        Session::flash('message', 'Resignation Applied  Successfully!');



        $data = array( 'heading' =>'RESIGNATION',
                        
                        'employeecode' =>$request->from,
                        'resigndate'=>date("Y-m-d",strtotime($request->resign_date)),
                        'reason'=>$request->reason);
        // Mail::send('hr.resignation.resignationmail',compact('data'), function ($message) use ($user,$userid)
        // {
        //     $message->from('heeraerptl@gmail.com', 'Resignation Applied');
        //     $message->to('phpdiniya@gmail.com')->subject('Resignation Applied by'.' '.$user.' ('.$userid.') ');
        // }); 

        $resign=\DB::table('logins')->where('username','=',$request->from)
        ->leftJoin('hr_emp_personal_details','hr_emp_personal_details.user_id','=','logins.id')
        ->leftJoin('hr_emp_address','hr_emp_personal_details.user_id','=','hr_emp_address.user_id')
        ->leftJoin('hr_designation','hr_designation.id','=','hr_emp_personal_details.designation_id')
        ->leftJoin('hr_companies','hr_companies.id','=','hr_emp_personal_details.company_id')  
        ->leftJoin('hr_branch','hr_branch.company_id','=','hr_companies.id')       
        ->leftJoin('countries','countries.id','=','hr_emp_address.country')
        ->get(); 
        foreach($resign as $resigns)

        $pdf =PDF::loadView('hr.resignation.apply_resignation_pdf',compact('resigns'));
        return $pdf->stream();   
        return redirect('/hr/resignation/apply_resignation');



    }

    public function show()
    {  
        $resign=\DB::table('hr_resignations')->where('resign_status','=','applied')->orderBy('hr_resignations.id', 'desc')
       ->join('logins','logins.id','=','hr_resignations.resign_employee')
       ->join('hr_emp_personal_details','hr_emp_personal_details.user_id','=','logins.id')
       ->select('logins.username','hr_emp_personal_details.name','hr_resignations.resign_date','hr_resignations.resign_reason','hr_resignations.created_at','hr_resignations.id')
        ->get();   
        return view('hr.resignation.view_resignation',compact('resign'));
    }

    public function approve($id)
    {  
        $resign = hr_resignation::find($id);
        $resign->resign_status='approved';
        $resign->status_date=date("Y-m-d");
        $resign->save();
        Session::flash('message', 'Resignation Approved Successfully!');
        return redirect('/hr/resignation/view_resignation');
    }
    public function deny($id)
    {  
        $resign = hr_resignation::find($id);
        $resign->resign_status='rejected';
        $resign->status_date=date("Y-m-d");
        $resign->save();
        Session::flash('message', 'Resignation Rejected Successfully!');
        return redirect('/hr/resignation/view_resignation');
    }

    public function view()
    {
        return view('hr.resignation.resignation_report');
    }

    public function report(Request $request)
    {
        $from = date("Y-m-d",strtotime($request->date));
        $to = date("Y-m-d",strtotime($request->date1));
        $status=$request->status;
       
        $report=\DB::table('hr_resignations')->where('hr_resignations.resign_status','=',$status)->whereDate('hr_resignations.created_at','>=',$from)
        ->whereDate('hr_resignations.created_at','<=',$to)
        ->orderBy('hr_resignations.id', 'desc')
        ->join('logins','hr_resignations.resign_employee','=','logins.id')
        ->join('hr_emp_personal_details','logins.id','=','hr_emp_personal_details.user_id')
        ->select('logins.username','hr_emp_personal_details.name','hr_resignations.created_at','hr_resignations.resign_date','hr_resignations.resign_reason','hr_resignations.resign_status','hr_resignations.status_date')
        ->get();
        return view('hr.resignation.resignation_report',compact('report')); 
    }


}
