<?php
namespace App\Http\Controllers\hr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\Facades\Session;
use App\hr_visitor;
use DB;
use Auth;
use App\log;
class visitorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('hr.visitor.visitor_registration');

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
        $visitor= new hr_visitor();
        $visitor->visitor_salutation=$request->salutation;
        $visitor->visitor_name=$request->name;
        $visitor->visitor_mobile=$request->mobile;
        $visitor->visitor_email=$request->email;
        $visitor->visitor_purpose=$request->purpose;
        $visitor->whom_to_visit =$request->whom_to_visit;
        $visitor->visitor_address=$request->address;
        $visitor->remarks=$request->remarks;
        $visitor->added_by = session::get('userId');
        $visitor->save();
       
        $log = new log();
        $log->ip_address =  \Request::getClientIp(true);
        $log->user = session('userId');
        $log->actions = "Visitor Registered-".$request->name;
        $log->save();

        $lastInsertedID =$visitor->id;
        $visitor=\DB::table('hr_visitors')->where('id','=',$lastInsertedID)->get();
        Session::flash('message', 'Visitor Registered Successfully!');
        Session::flash('visitor', $visitor);
        return redirect('hr/visitor/visitor_registration');
    }
   
   
    public function show()
    { 
    $visitor=\DB::table('hr_visitors')->whereNull('deleted_at')->orderBy('hr_visitors.id', 'desc')
    ->join('logins','hr_visitors.added_by','=','logins.id')
    ->select('logins.username','hr_visitors.visitor_name','hr_visitors.created_at','hr_visitors.visitor_mobile','hr_visitors.visitor_purpose','hr_visitors.whom_to_visit','hr_visitors.visitor_address','hr_visitors.remarks','hr_visitors.id')
    ->get();   
    return view('hr.visitor.view_visitor',compact('visitor'));

    }

    public function editvisitor($id)
    { 
    $visitor=\DB::table('hr_visitors')->where('id',$id)->get();
    foreach($visitor as $visitors)
    return view('hr.visitor.edit_visitor',compact('visitors')); 

    }


    public function updatevisitor(Request $request )
    { 
    $id=$request->id;   
    $visitor = hr_visitor::find($id); 
    $visitor->visitor_salutation=$request->salutation;
    $visitor->visitor_name=$request->name;
    $visitor->visitor_mobile=$request->mobile;
    $visitor->visitor_email=$request->email;
    $visitor->visitor_purpose=$request->purpose;
    $visitor->whom_to_visit =$request->whom_to_visit;
    $visitor->visitor_address=$request->address;
    $visitor->remarks=$request->remarks;
    $visitor->save();

    $log = new log();
    $log->ip_address =  \Request::getClientIp(true);
    $log->user = session('userId');
    $log->actions = "Visitor Updated-".$request->name;
    $log->save();
    Session::flash('message', 'Visitor Updated Successfully!');
    return redirect('/hr/visitor/view_visitor');  


    }
    public function destroy(Request $request,$id)
    {
        $visitor=hr_visitor::find($id);
        $visitor->delete();
        Session::flash('message', 'Visitor Deleted Successfully!');
        return redirect('/hr/visitor/view_visitor');  
    }
}

