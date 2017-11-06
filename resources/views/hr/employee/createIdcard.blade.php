@php
namespace App\Http\Controllers\hr;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\generateIdcard;
use App\country;
use App\hr_company;
use App\hr_branch;
use App\hr_department;
use App\hr_designation; 
use App\hr_emp_personal_details;
use App\hr_emp_address;
use PDF; 
use URL;
use DB;
use Carbon; 
@endphp
@php
     $i = 1;   
@endphp
@foreach ($employee_details as $element)
    @php
    //DB::enableQueryLog();
        $employee_details = DB::table('hr_emp_personal_details')
                            ->leftjoin('hr_companies','hr_companies.id','=','hr_emp_personal_details.company_id')
                            ->leftjoin('hr_departments','hr_departments.id','=','hr_emp_personal_details.department_id')
                            ->leftjoin('hr_emp_address','hr_emp_address.user_id','=','hr_emp_personal_details.user_id')
                            ->leftjoin('hr_branch','hr_branch.id','=','hr_emp_personal_details.branch_id')
                            ->leftjoin('hr_designation','hr_designation.id','=','hr_emp_personal_details.designation_id')
                            ->leftjoin('countries','countries.id','=','hr_emp_personal_details.nationality')
                            ->where('hr_emp_personal_details.code',$element)
                            ->select('hr_companies.*','countries.*','hr_departments.*','hr_branch.*','hr_designation.*','hr_emp_personal_details.*','hr_emp_address.address as useraddress', 'hr_emp_address.city as usercity', 'hr_emp_address.state as userstate', 'hr_emp_address.zip_code as userzipcode','hr_emp_address.country as usercountry')->first();
//dd(DB::getQueryLog());
    @endphp
    
<body style="background-image: url({{URL::to('/') }}/img/id_card/new.jpg); background-repeat: no-repeat;font-family: arial, sans-serif" >
    <div style="margin-left: 280px;">
        <table cellspacing="0" style="margin-top:40px;font-size: 11px;" cellpadding="0" >
            <tr>
                <td width="100px" ><b>Address:</b></td>
                
            </tr>
             <tr>
                <td width="100px" height="14px">{{ucfirst($employee_details->useraddress)}}</td>
                
            </tr>
             <tr>
                <td width="100px" height="14px">{{ucfirst($employee_details->usercity)}}</td>
                
            </tr>
             <tr>
                <td width="100px" height="14px">{{ucfirst($employee_details->userstate)}}</td>
                
            </tr>
            <tr>
                <td width="100px" height="14px"> {{ucfirst($employee_details->userzipcode)}}</td>
                
            </tr>
             <tr>
                <td width="100px">{{ucfirst($employee_details->mobile)}} </td>
               
            </tr>
            <tr>
                <td width="100px"> </td>
               
            </tr>
           <tr> 
                <td width="100px"><br> </td>
               
            </tr>
           
            <tr>
                <td width="100px" height="14px"><b>D.O.B:</b><b>@php $date = new Carbon( $employee_details->dob ) @endphp {{ $date->format('d/m/Y') }}</b> </td>
               
            </tr>
            <tr>
                <td width="100px" height="14px"><b>Blood Group:</b>{{ucfirst($employee_details->bloodgroup)}}</td>
               
            </tr>


        </table>
    </div>





    <div style="margin-left:27px;">
        <table cellspacing="0" style="margin-top:-48px;font-size: 11px;"  cellpadding="0"   >
            <tr>
                <td align="center" width="100px" height="110px" 
                 > <img src="{{URL::to('/') }}/storage/img/employee/{{$employee_details->photo}}" width="90" height="110" ></td>
                
            </tr>
             <tr>
                <td width="200px" height="14px" align="center">{{ucfirst($employee_details->code)}}</td>
                
            </tr>
             <tr>
                <td width="200px" height="14px" align="center">{{ucfirst($employee_details->salutation_name)}}{{ucfirst($employee_details->name)}}</td>
                
            </tr>
             <tr>
                <td width="200px" height="14px" align="center">{{ucfirst($employee_details->designation_name)}}</td>
                
            </tr>
           

          <tr>
                <td width="200px" align="center"> <br></td>
                
            </tr>
        

             <tr>
                <td width="200px" height="14px" align="center">{{ucfirst($employee_details->company_name)}}</td>
               
            </tr>
            <tr>
                <td width="200px" height="14px" align="center">{{ucfirst($employee_details->branch_name)}}</td>
               
            </tr>
          

        </table>
    </div>
</body>

@endforeach   

