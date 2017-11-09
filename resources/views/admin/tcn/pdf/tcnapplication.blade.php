<html>
<head>
<meta charset="utf-8">
<title>Application Form - {{ucfirst($tcnrequest->tcnCode)}}</title>
<link href = "https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
<style type="text/css" media="screen">

html,body{
margin:0px;
padding: 10px 20px;
}
.header-bar{
background: #bcd688;
}
.header-bar h3{
font-size: 16px;
padding:6px;
}
.table-data{
width: 100%;
}
.table-data tr th,.table-data tr td{
font-size: 12px;
padding:2px;
}
.table-data tr th{
position: relative;
padding-left:8px;
}
.table-data tr td{
padding-right:8px;
}
.table-data tr th:before{
position: absolute;
top:5px;
left:0px;
font-size: 14px;
font-weight: bold;

}


.table-data tr td:nth-child(3){
padding-left:20px;
}
.pull-left{
float: left;
}
.pull-right{
float: right;
}
.clear-fix{
clear:both;
}
.clear-fix:before{
clear:both;
}
.clear-fix:after{
clear:both;
}
.sub-content{
font-size: 12px;
font-weight: 400px !important;
}
</style>
<style>
.personal_details{
border:1px solid #bbb;
font-size:12px;
width:100% !important;
}
.personal_details tr td,
.personal_details tr th,
{
border:1px solid #bbb;
}
.page-break {
page-break-after: always; 
}
@font-face {
font-weight: normal;
font-style: normal;
font-variant: normal;
src: local("ariali"), url("{{URL::to('/') }}/vendor/dompdf.dompdf/lib/fonts/ariali.ufm") format("truetype");
}
</style>
</head>
<body>
  <header id="header" class="">
    <img src="@php echo public_path();@endphp/img/tcnmaster/headerTCN.png" alt="" style="width:775px;height:130px">
  </header>

<div style="margin-top:5px">
  <div class="" style="float:left;padding-top: 80px;margin-left: 10px">
    <table style="">
      <tbody>
        <tr>
          <td>MEMBER CODE</td> <td>: {{$tcnrequest->member->code}} </td>
        </tr>
            <tr><td></td></tr>
        <tr>
          <td>TCN CODE</td><td>: {{$tcnrequest->tcnCode}} </td>
        </tr>
      </tbody>
    </table>
  </div>

  <div class="section" style="float:right;margin-right: 24px">
    <table style="border:1px solid">
    <tbody>

      <tr>

        <td><img class="profile-img" src="@php echo storage_path();@endphp/img/member_img/{{$tcnrequest->member->photo}}" alt="" width="120" height="130" ></td>
      
      </tr>

    </tbody>
    </table>
  </div>
</div>

<div style="clear: both;"></div>

<div>
    <div class="section">
      <div class="header-bar">
        <h3 class="heading-1" style="background-color:#bcd688">Personal Details</h3>
      </div>
      <table class="table-data personal-details personal-table">
        <tbody>
          <tr>
            <td width="17%">NAME</td><th width="27%">: {{ucfirst($tcnrequest->member->name)}}</th>
            <td width="25%">RELIGION</td><th width="">: {{ucfirst($tcnrequest->member->religion)}}</th>
          </tr>

          <tr>
            <td>CASTE</td><th>: {{ucfirst($tcnrequest->member->caste)}}</th>
            <td>GENDER</td><th>: {{ucfirst($tcnrequest->member->gender)}}</th>
          </tr>

          <tr>
            <td>NATIONALITY</td><th>: {{ucfirst($tcnrequest->member->country->countryName)}}</th>
            <td>DATE OF BIRTH</td><th>: {{date('d-m-Y',strtotime($tcnrequest->member->dob))}}</th>
          </tr>

          <tr>
            <td>EDUCATION</td><th>: {{$tcnrequest->member->education}}</th>
            <td>GAURDIAN'S NAME</td><th>: {{$tcnrequest->member->guardian}}</th>
          </tr>

          <tr>
            <td>OCCUPATION</td><th>: {{$tcnrequest->member->occupation}}</th>
            <td>MARITAL STATUS</td><th>: {{$tcnrequest->member->maritalStatus}}</th>
          </tr>

          <tr>
            <td>MOBILE</td><th>: {{$tcnrequest->member->mobileId}} {{$tcnrequest->member->mobileNo}}</th>
            <td>EMAIL</td><th>: {{$tcnrequest->member->email}}</th>
          </tr>

          <tr>
            <td>{{strtoupper($tcnrequest->member->proof->typeOfProof)}}</td><th>: {{$tcnrequest->member->proof->proofNumber}}</th>
            <td></td><th></th>
          </tr>

        </tbody>
      </table>
    </div>
</div>


<hr style="border: 0.5px thin solid;opacity: 0.1%;">

<div>

  <div class="section"  style="width: 17%; float: left;" >
      <div style="padding: 0 !important;margin:  0px 0px 2px 0px  !important; font-weight: bold;" class="heading-1">Address</div>
    <table class="table-data personal-details">
      <tbody>
        <tr>
          <td  style="height: 35px !important" valign="top">STREET</td>
        </tr>

        <tr>  
          <td>CITY</td>
        </tr>

        <tr>
          <td>STATE</td>
        </tr>
        <tr>  
          <td>PIN CODE</td>
        </tr>
      </tbody>
    </table>
  </div>


@php
$i=1;  
@endphp
@foreach ($tcnrequest->member->address as $element)
@if(in_array($element->typeOfAddress,array('permanent','official','correspondance')) && $i<4) 
    <div class="section"  style="width: 27.5%; float: left;" >
        <div class="heading-1" style="padding: 0 !important;margin: 0px 0px 2px 0px !important" >&nbsp;&nbsp;&nbsp;{{($element->typeOfAddress=='correspondance')?'Correspondence':ucfirst($element->typeOfAddress)}} :-</div>
      <table class="table-data personal-details address-table">
        <tbody>
          <tr>
            <th style="padding-left:10px;height: 35px !important" valign="top">{{ucwords($element->address)}} </th>
          </tr>

          <tr>  
            <th style="padding-left:10px;">{{ ucwords($element->city) }}</th>
          </tr>

          <tr>
            <th style="padding-left:10px;">{{ ucwords($element->state) }}</th>
          </tr>
          <tr>  
            <th style="padding-left:10px;">{{ ucwords($element->pin) }}</th>
          </tr>
        </tbody>
      </table>
    </div>
    @endif
@php
  $i++;
@endphp    
@endforeach
</div>

<div style="clear: both;"></div>

<div>   
    <div class="section">
      <div class="header-bar">
        <h3 class="heading-1" style="background-color:#bcd688">Benefit Remittance Details</h3>
      </div>
      <table class="table-data personal-details">
        <tbody>
          
          <tr>
            <td width="17%">ACCOUNT&nbsp;NUMBER</td><th width="27%">: {{$tcnrequest->benefit->accountNumber}}</th>
            <td width="25%">BANK NAME</td><th>: {{$tcnrequest->benefit->bankName}}</th>
          </tr>
          <tr><td></td></tr>
          <tr>
            <td >BRANCH</td><th >: {{$tcnrequest->benefit->branchName}}</th>
            <td >IFSC</td><th>: {{$tcnrequest->benefit->ifsc}}</th>
          </tr>
        </tbody>
      </table>
    </div>
</div>


<div style="clear: both;"></div>

<div>
    <div class="section">
      <div class="header-bar">
        <h3 class="heading-1" style="background-color:#bcd688">Trade Payment Datails</h3>
      </div>
      <table class="table-data personal-details" style="padding-bottom: 0px">
        <tbody>
          <tr>
            <td width="17%">CURRENCY</td><th width="27%">: {{$tcnrequest->currencyType}}</th>
            <td width="25%">NO OF UNITS</td><th>: {{$tcnrequest->unit}}</th>
          </tr> 
          <tr>
            <td>AMOUNT</td><th>: {{$tcnrequest->amount}}</th>
            <td>PAY MODE</td><th>: {{$tcnrequest->paymentMode}}</th>
          </tr> 
          <tr>
            <td>DATE</td><th>: {{date('d-m-Y',strtotime($tcnrequest->depositeDate))}}</th>
            <td>BANK NAME</td><th>: {{$tcnrequest->heeraaccount->bankName}}</th>
          </tr>
          <tr>
            <td>BRANCH NAME</td><th>: {{$tcnrequest->heeraaccount->branchName}}</th>
            <td>HEERA ACCOUNT NO</td><th>: {{$tcnrequest->heeraaccount->accountNumber}}</th>
          </tr>
          <tr><td colspan="4">&nbsp;</td></tr>
          {{-- <tr><td colspan="4">&nbsp;</td></tr> --}}
          <tr>
            <td colspan="3" style="font-size: 13px;"> <span style="font-weight: bold;">NAME  </span>: {{strtoupper($tcnrequest->member->name)}}</td>
            <td align="center"> <img src="@php echo storage_path();@endphp/img/member_img/{{$tcnrequest->member->singnature}}" width="130" height="60" alt="" /><br>SIGNNATURE </td>
          </tr>        
          </tbody>
      </table>
    </div>
</div>



<div style="clear: both;"></div>
                    
                     
<div style="page-break-after: always;"></div>



<div>
  <div class="section">
    <div class="header-bar">
    <h3 class="heading-1" style="background-color:#bcd688">Nominee Datails</h3>
    </div>

    <div style="clear:both;;"> </div>


    <table class="table-data personal-details" cellspacing="3" cellpadding="3">
      <tbody>
        <tr>
          <td width="12.5%">NAME</td>

          <th width="20%^">: {{ucfirst($tcnrequest->nominee_one->name)}}</th>

          <td width="25%">DATE OF BIRTH</td>

          <th width="">: {{date('d-m-Y',strtotime($tcnrequest->nominee_one->dob))}}</th>

          <td rowspan="5" >
          <img src="@php echo storage_path();@endphp/img/nominee/{{$tcnrequest->nominee_one->uploadPhoto }}" alt="" width="120" height="150" style="float: right;">
          </td>
        </tr>

        <tr>
          <td>GENDER</td>
          <th>: {{ucfirst($tcnrequest->nominee_one->gender)}}</th>
          <td >RELATION WITH APPLICANT</td>
          <th>: {{ucfirst($tcnrequest->nominee_one->relationWithApplicant)}}</th>
          <td></td>
        </tr>

        <tr>
          <td>MOBILE</td>
          <th>: {{$tcnrequest->nominee_one->mobile}}</th>
          <td>EMAIL</td>
          <th>: {{$tcnrequest->nominee_one->email}}</th>        
          <td></td>
        </tr>

        <tr>
          <td style="height: 30px" valign="top">ADDRESS</td>
          <th style="height: 30px;" valign="top">: {{$tcnrequest->nominee_one->address->address}}</th>
          <td colspan="3"></td>
        </tr>

        <tr>
          <td valign="top">CITY</td>
          <th valign="top">: {{$tcnrequest->nominee_one->address->city}}</th>
          <td colspan="3"></td>
        </tr>

        <tr>
          <td>PIN</td>
          <th>: {{$tcnrequest->nominee_one->address->pin}}</th>
          <td colspan="3"></td>
        </tr>

      </tbody>
    </table>
  </div>

  <br/>
  <br/>
  <br/>
  <br/>
  <br/>
  <div style="clear: both;"></div>


  <div class="section" style="padding:6px;">
    <div class="pull-left">NAME: {{strtoupper($tcnrequest->nominee_one->name)}}</div>
    <div class="pull-right" style="margin-right: 0px;">SIGNATURE: <br/><br/><img src="@php echo storage_path();@endphp/img/nominee/{{$tcnrequest->nominee_one->signature}}" width="130" height="60" alt="" />
    <br/>
    </div>
  </div>
</div>

<br/>
<br/>
<div style="clear: both;"></div>
<br/>
<br/>

<div>
  @if($tcnrequest->nominee2_id!='0')
  <div class="section">
    <div class="header-bar">
    <h3 class="heading-1" style="background-color:#bcd688">Nominee Datails</h3>
    </div>

    <div style="clear:both;;"> </div>


    <table class="table-data personal-details" cellspacing="3" cellpadding="3">
      <tbody>
        <tr>
          <td width="12.5%">NAME</td>

          <th width="20%">: {{ucfirst($tcnrequest->nominee_two->name)}}</th>

          <td width="25%">DATE OF BIRTH</td>

          <th width="">: {{date('d-m-Y',strtotime($tcnrequest->nominee_two->dob))}}</th>

          <td rowspan="5" >
          <img src="@php echo storage_path();@endphp/img/nominee/{{$tcnrequest->nominee_two->uploadPhoto }}" alt="" width="120" height="150" style="float: right;">
          </td>
        </tr>

        <tr>
          <td>GENDER</td>
          <th>: {{ucfirst($tcnrequest->nominee_two->gender)}}</th>
          <td >RELATION WITH APPLICANT</td>
          <th>: {{ucfirst($tcnrequest->nominee_two->relationWithApplicant)}}</th>
          <td></td>
        </tr>

        <tr>
          <td>MOBILE</td>
          <th>: {{$tcnrequest->nominee_two->mobile}}</th>
          <td>EMAIL</td>
          <th>: {{$tcnrequest->nominee_two->email}}</th>        
          <td></td>
        </tr>

        <tr>
          <td style="height: 30px" valign="top">ADDRESS</td>
          <th style="height: 30px;" valign="top">: {{$tcnrequest->nominee_two->address->address}}</th>
          <td colspan="3"></td>
        </tr>

        <tr>
          <td valign="top">CITY</td>
          <th valign="top">: {{$tcnrequest->nominee_two->address->city}}</th>
          <td colspan="3"></td>
        </tr>

        <tr>
          <td>PIN</td>
          <th>: {{$tcnrequest->nominee_two->address->pin}}</th>
          <td colspan="3"></td>
        </tr>

      </tbody>
    </table>
  </div>

  <br/>
  <br/>
  <br/>
  <br/>
  <br/>
  <div style="clear: both;"></div>


  <div class="section" style="padding:6px;">
    <div class="pull-left">NAME: {{strtoupper($tcnrequest->nominee_two->name)}}</div>
    <div class="pull-right" style="margin-right: 0px;">SIGNATURE: <br/><br/><img src="@php echo storage_path();@endphp/img/nominee/{{$tcnrequest->nominee_two->signature}}" width="130" height="60" alt="" />
    <br/>
    </div>
  </div>
  @endif
</div>

<br/>
<br/>
<div style="clear: both;"></div>
<br/>
<br/>

<div>




    <div style="clear: both;"></div>

    <div style="page-break-after: always;"></div>
    
<div class="section">
 <div class="header-bar" style="background-color:#bcd688">
  <h3 class="heading-1">Introduction Datails
</h3>
 </div>


<table class="table sub-content" >

        <tbody>
     <tr>
        <th colspan="3">MARKETING EXECUTIVE:</th>
      </tr>
      <tr>
         <th colspan="3">SUB AGENT NAME:</th>
      </tr>

      <tr>
        <th colspan="2">I KNOW THE MEMBER FOR LAST ___ MONTHS/YEARS. I CONFIRM THE IDENTITY, OCCUPATION AND ADDRESS OF APPLICANT</th>
      </tr>
      <tr>

        <th rowspan="3">DATE:</th>
        <th rowspan="3">INTRODUCERS SIGNATURE </th>
        <th rowspan="3">SIGNATURE VERIFIED BY</th>

      </tr>
        </tbody>
  </table>



  </div>

  <div class="section ">
 <div class="header-bar">
  <h3 class="heading-1">Declaration From an Individual
</h3>
 </div>
  

  <table class="table sub-content" cellspacing="0" cellpadding="6" >
     

       <tbody>
      
      <tr>
        <th>PLACE:</th>
        <td > </td>
        <th>        </th>
        <th> DATE:</th>
      </tr>
       <tr>
        <th  colspan="4">
        I, the undersigned, will advice you in writing of any change in detail furnished to the company and I will be liable to you for any obligation
which may be standing on my name in your books of data of the receipt of such notice and until all such obligations have been liquidated.

           </th>
      </tr>
       <tr>
       <th  colspan="3" style="text-align: right;margin-right: 30px;font-size: 13px;">
        Yours faithfully
           </th>
      </tr>
        </tbody>
  </table>
  
<table class="table"  cellspacing="0" cellpadding="0" style=" font-size: 12px; width: 100%;border-collapse: collapse;border-spacing: 0;
  margin-bottom: 20px;">
      <tbody>
           <tr>
        <td style="text-align: center;" >NAME</td>
        <td style="text-align: center;" >SIGNATURE:</td>
      </tr>
        </tbody>
  </table>
<br/><br/>
 </div>
 <div class="section">
 <div class="header-bar">
  <h3 class="heading-1">Declaration From Proprietorship Firm
</h3>
 </div>
   


<table class="table sub-content" cellspacing="0" cellpadding="6" >
       <tbody>
      
      <tr>
        <th>PLACE:</th>
        <td > </td>
        <th>        </th>
        <th> DATE:</th>
      </tr>
       <tr>
        <th  colspan="4">
        I, the undersigned, am the sole proprietor of the concern and is solely responsible for liabilities thereof, I will advice you in writing of any
change in detail furnished to the company and I will be liable to you for any obligation which may be standing on my name in your books of
data of the receipt of such notice and until all such obligations have been liquidated.


           </th>
      </tr>
       <tr>
        <th  colspan="3" style="text-align: right;margin-right: 30px;font-size: 13px;">
        Yours faithfully
           </th>
      </tr>
        </tbody>
  </table>
  
  
<table class="table"  cellspacing="0" cellpadding="0" style=" font-size: 12px; width: 100%;border-collapse: collapse;
  border-spacing: 0;
  margin-bottom: 20px;">
  <tbody>
           <tr>
        <td style="text-align: center;" >NAME</td>
        <td style="text-align: center;" >SIGNATURE:</td>
      </tr>
        </tbody>
  </table>
 </div>



 <div class="section ">
 <div class="header-bar">
  <h3 class="heading-1">Declaration From  Partnership Firm
</h3> 
 </div>

 <table class="table sub-content" cellspacing="0" cellpadding="6" >
       <tbody>
      
      <tr>
        <th>PLACE:</th>
        <td > </td>
        <th>        </th>
        <th> DATE:</th>
      </tr>
       <tr>
        <th  colspan="4">
       We, the undersigned, are the only partners in the firm and are jointly and severally responsible for liabilities thereof, We will advice you in
writing of any change in detail furnished to the company and We will be liable to you for any obligation which may be standing on my name in
your books of data of the receipt of such notice and until all such obligations have been liquidated.


           </th>
      </tr>
       <tr>
       <th  colspan="3" style="text-align: right;margin-right: 30px;font-size: 13px;">
        Yours faithfully
           </th>
      </tr>
        </tbody>
  </table>
  
  
<table class="table"  cellspacing="0" cellpadding="0" style=" font-size: 12px; width: 100%;border-collapse: collapse;
  border-spacing: 0;
  margin-bottom: 20px;">
  <tbody>
           <tr>
        <td style="text-align: center;" >NAME</td>
        <td style="text-align: center;" >SIGNATURE:</td>
      </tr>
        </tbody>
  </table>
 </div>
<br/>
<br/>
<div>&nbsp;</div>

<div style="page-break-after: always;"></div>


 <div class="section ">
 <div class="header-bar">
  <h3 class="heading-1">Vernacular Declaration 
</h3>
 </div>


<table class="table tab1 " border="0" cellspacing="0" cellpadding="5" style=" font-size: 13px; width: 100%;border-collapse: collapse;
  border-spacing: 0;
  margin-bottom: 20px;" >
             <tbody>
      
      <tr>
        <td >PLACE:</td>
         <td > </td>
          <td > </td>
        <td > DATE:</td>
      </tr>

      <tr>
        <td>I, Mr./Mrs./Ms. </td>
        <td style="color:#ddd;"> Executive/Agent:</td>
        <td> (Interpreter)</td>
        <th></th>
      </tr>
      <tr>
        <td colspan="2">have explained the contents of this document in</td>
        <td colspan="2">(Language) to following HGEL TCN `A` Member/s:</td>
      </tr>
      <tr>
        <td colspan="2">1.</td>
        <td colspan="2">2.</td>
      </tr>
       <tr>
        <td  colspan="4">
        each of whom have confirmed to me that he/she fully understands the contents of this document and has/have duly put his/her signature(s) to
this declaration.
           </td>
      </tr>
       <tr>
        <td>MEMBER NAME: </td>
        <td > </td>
        <td>        </td>
        <td> SIGNATURE</td>
      </tr>
      <tr>
        <td  colspan="4">
                   </td>
      </tr>
      <tr>
        <td>INTERPRETER NAME:</td>
        <td > </td>
        <td>        </td>
        <td> SIGNATURE</td>
      </tr>
      <tr>
        <td  colspan="4">
                   </td>
      </tr>
      <tr>
        <td colspan="2">WITNESS (1) on behalf of Member(s): </td>
        <td>        </td>
        <td> SIGNATURE</td>
      </tr>
      <tr>
        <td  colspan="4">
                   </td>
      </tr>
      <tr>
        <td colspan="2">WITNESS (2) on behalf of HGEL:</td>
        <td>        </td>
        <td> SIGNATURE</td>
      </tr>

        </tbody>
  </table>
 </div>

 <div class="section ">
  <p style="text-align:center; font-size:9px;">Note: Your Membership Request Form should be submitted and approved before you fill in your Application Form</p>
 <div class="header-bar">
  <h3 class="heading-1">`HG` Terms & Conditions
</h3>
 </div>
<table class="table  sub-content" cellspacing="0" cellpadding="6" >
       <tbody>
       <tr>
        <th  colspan="4">
1. HG TCN member must be above 18 years of age, can be a Resident Indian, NRI or a foreigner.<br/><br/>
2. HG TCN member must be a Muslim.<br/><br/>
3. Nomination facility is available; up to two nominees are permissible to every member. However can extend if needed.<br/><br/>
4. All supportive documents should be relevant to member/s.<br/><br/>
5. Copy of Residence proof and Photo ID of the member/s and the nominee/s is required. Original of the same can also be demanded for verification.<br/><br/>
6. HG will not bear any responsibility for any loss due to mistake in filling of the name and/or any detail in, any of the HG form.<br/><br/>
7. All eligible profits and gifts will be issued on the applicant name, which is filled in the enrolment form only.<br/><br/>
8. HG reserves the right to terminate the enrolment if any of the document or the information submitted by the applicant is found to be unauthentic or in any other related case.<br/><br/>
9. Member/s willing to change any details provided in enrolment form must fill the update form and consult HG for the same. Changes will be effected post two weeks from
receiving the details.<br/><br/>
10. Membership applications will be accepted on or before last working day of every month. Application will not be accepted after the specified date in any case.<br/><br/>
  11. One time registration fees will be charged on every membership of HG TCN @ 0.2% on membership amount (for eg. : 200/- INR for every 1,00,000/- INR and respectively).<br/><br/>
12. Registration fees for HG TCN are non-refundable.<br/><br/>


           </th>
      </tr>
        </tbody>
  </table>
 </div>
 <div style="page-break-after: always;"></div>
 <div class="section ">
  <p style="text-align:center; font-size:9px;">Note: Your Membership Request Form should be submitted and approved before you fill in your Application Form</p>
{{--  <div class="header-bar">
  <h3 class="heading-1">`HG` Terms & Conditions
</h3>
 </div> --}}
<table class="table  sub-content" cellspacing="0" cellpadding="6" >
       <tbody>
       <tr>
        <th  colspan="4">
13. HG strictly condemns the payment done by money earned from non-islamic/illegal source, including interest/theft/burglary/or any other related action, which is against the
constitution of the respective country. HG reserves the right to take necessary action in the respective case, and the action may be extended up to legal proceedings as per the
case may be.<br/><br/>
14. Payments are accepted only through bank, cash payments will not be accepted in any case.<br/><br/>
15. Member/s are warned, not to hand over cash to any HG office/Executive/Person/ organisation or any one, as HG restricts the acceptance of cash in any case. However,
person willing for cash payment may deposit the amount in respective HG bank account and hand over the bank pay-in-slip with enrolment form to any HG office.<br/><br/>
 16. It is the accountability of HG TCN member/s to verify with their bank, whether the membership amount has been deducted from their respective bank account. HG takes no
responsibility in case of non-remittance of money. HG reserves the right to impose penalty on the respective member up to the extent of loss.<br/><br/>
17. No buy back proceeding will be affected within the lock-in period of respective TCN under any circumstances.<br/><br/>
18. Buy back request shall be submitted one month prior from date of withdrawal on or before 1st of respective month, subject to completion of lock-in period.<br/><br/>
19. All documents issued by HG (Agreement cum Receipt & Membership Card or any other) must be returned if the member wishes to discontinue or as per the demand of HG.<br/><br/>
20. HG TCN member/s is/are deemed to be continued unless and until buyback request is submitted or else if HG terminates the membership.<br/><br/>
21. Withdrawal amount will be remitted to members account in the first week of every month along with the profit/loss of that particular TCN.<br/><br/>
22. As per Almighty`s order in the Holy Quran, ``O you who believe! Whenever you enter into deals with one another involving future obligations for a certain term, write it down.`<br/><br/>
(2:282), HG is bound to all the terms and conditions stated in the enrolment form of the respective TCN, and so is the member also eligible to terms and conditions mentioned in
it.<br/><br/>
23. HG, bound by the Islamic Law, will not pay any interest to any member under any circumstances.<br/><br/>
24. HG TCN Member/s shall attend a minimum of five meetings out of twelve in a particular year to be well informed with updates.<br/><br/>
25. HG reserves all the right to change/modify the terms and conditions without any prior notice, and the same will be effective thereafter.<br/><br/>
26. Heera will not be responsible for any bank charges that is being deducted from the amount you transfer to us.
Note:We were only concentrating on Business trades.
           </th>
      </tr>
        </tbody>
  </table>
  <br/><br/>
   <table class="table"  cellspacing="0" cellpadding="0" style=" font-size: 12px; width: 100%;border-collapse: collapse;
  border-spacing: 0;
  margin-top: 20px;">
  <tbody>
       <tr>
        <td style="text-align: center;" >NAME</td>
        <td  ></td>
        <td  ></td>
        <td style="text-align: center;" >SIGNATURE:</td>
      </tr>
        </tbody>
  </table>
 </div>
 <div style="page-break-after: always;"></div>
 <div class="section ">
 <div class="header-bar">
  <h3 class="heading-1">HGEL TCN `A` Terms & Conditions
</h3>
 </div>

 <table class="table sub-content" cellspacing="0" cellpadding="6" >
     

       <tbody>
       <tr>
        <th  colspan="4">1.Any quantity of membership can be bought but only in multiples 0f 25,000/-INR or 2,000/-AED or 500/-USD.<br/><br/>
2.Gross Profit/loss will be divided: 60% to HGEL and 40% to the member/s.<br/><br/>
3.Gross Profit/loss will be distributed every month.<br/><br/>
4.Gross Profit/loss shall be remitted to the members account by Cheque/ATM/ECS or any other mode of payment permitted by law, in the first
week of every month from the month of enrollment.<br/><br/>
5.Membership purchased between the datesof 1st to 30th will only be eligible for the profit of the forthcoming month from the month of purchase
(i.e.:1st working daytill last working day of every month, for eg.: Membership purchased between 1st Jan 2013 till 31st Jan 2013 will be eligible
for the profit of Feb 2013, and will be remitted on 1st week of march).<br/><br/>
6.Minimum Duration of membership is one year (lock-in-period), with effect from 1st January 2013.<br/><br/>
7.Cheque/DD Should be favour of "HEERA GOLD EXPORTS AND IMPORTS" TO buy HGEL TCN `A` Membership.<br/><br/>
8.HGEL is registerd under Indian Companies Act-1956(unlisted),whereby honorable Indian Constitution Permitted Muslim Community may
follow Shariat (Law derived from the Holy Quran) as per Muslim Personal Law (Shariat) Application Act,1937.<br/><br/>
9.HGEL is engaged in the trading of physical gold, hence every HGEL TCN `A` members is, obviously involved in purchase of physical gold, up
to the value of his/her membership, can demand either respective currency or gold or the same value.<br/><br/>
10.HGEL is involved in physical gold trading, so is financially dependent on economic and market conditions.However time factor has
remarkable role in the economy, which may lead to delay in the process of profit/loss distribution or any other related dues.<br/><br/>

           </th>
      </tr>
        </tbody>
  </table>
<table class="table"  cellspacing="0" cellpadding="0" style="
  font-size: 12px; 
  width: 100%;
  border-collapse: collapse;
  border-spacing: 0;
  margin-top: 20px;">
  <tbody>
       <tr>
        <td style="text-align: center;" >NAME</td>
        <td  ></td>
        <td  ></td>
        <td style="text-align: center;" >SIGNATURE:</td>
      </tr>
        </tbody>
  </table>
 </div>
<div style="page-break-after: always;"></div>
<style>
.personal_details{
  border:1px solid #bbb;
  font-size:12px;
  width:100% !important;
}
.personal_details tr td,
.personal_details tr th,
 {
   border:1px solid #bbb;
  }
</style>
  <div class="section ">
 <div class="header-bar">
  <h3 class="heading-1">Document To Be Attached
</h3>
 </div>


<table class="table sub-content personal_details" cellspacing="0" cellpadding="6" >
      
       <tbody>
        <tr>
        <th  colspan="2" style="font-weight:bold;">APPLICANTS ID PROOF</th>
        <th colspan="2" style="font-weight:bold;">APPLICANTS ID PROOF</th>
           </tr>
       <tr>
        <th >PAN CARD </th>
        <td style="text-align:center; color:#bbb;">(YES/NO)</td>
        <th>ELECTRICITY BILL</th>
        <td style="text-align:center; color:#bbb;">(YES/NO)</td>
      </tr>
       <tr>
        <th >VOTER IDENTITY CARD</th>
        <td style="text-align:center; color:#bbb;">(YES/NO)</td>
        <th>TELEPHONE BILL</th>
        <td style="text-align:center; color:#bbb;">(YES/NO)</td>
      </tr>
       <tr>
        <th >DRIVING LICENSE </th>
        <td style="text-align:center; color:#bbb;">(YES/NO)</td>
        <th>VOTER IDENTITY CARD</th>
        <td style="text-align:center; color:#bbb;">(YES/NO)</td>
      </tr>
       <tr>
        <th >BANK A/C STATEMENT / PASSBOOK </th>
        <td style="text-align:center; color:#bbb;">(YES/NO)</td>
        <th>BANK A/C STATEMENT/PASSBOOK</th>
        <td style="text-align:center; color:#bbb;">(YES/NO)</td>
      </tr>
      <tr>
        <th >PASSPORT</th>
        <td style="text-align:center; color:#bbb;">(YES/NO)</td>
        <th>DRIVING LICENSE</th>
        <td style="text-align:center; color:#bbb;">(YES/NO)</td>
      </tr>
      <tr>
        <th >ADHAAR CARD</th>
        <td style="text-align:center; color:#bbb;">(YES/NO)</td>
        <th>PASSPORT</th>
        <td style="text-align:center; color:#bbb;">(YES/NO)</td>
      </tr>
      <tr>
        <th >RATION CARD </th>
        <td style="text-align:center; color:#bbb;">(YES/NO)</td>
        <th>RATION CARD </th>
        <td style="text-align:center; color:#bbb;">(YES/NO)</td>
      </tr>
       <tr>
        <th ></th>
        <td style="text-align:center; color:#bbb;"></td>
        <th>RENT RECEIPT</th>
        <td style="text-align:center; color:#bbb;">(YES/NO)</td>
      </tr>


       <tr>
        <th  colspan="2" style="font-weight:bold;">NOMINEES ID PROOF</th>
        <th colspan="2" style="font-weight:bold;">NOMINEES ADDRESS PROOF</th>
           </tr>

       <tr>
        <th >PAN CARD </th>
        <td style="text-align:center; color:#bbb;">(YES/NO)</td>
        <th>ELECTRICITY BILL</th>
        <td style="text-align:center; color:#bbb;">(YES/NO)</td>
      </tr>
       <tr>
        <th >VOTER IDENTITY CARD </th>
        <td style="text-align:center; color:#bbb;">(YES/NO)</td>
        <th>TELEPHONE BILL</th>
        <td style="text-align:center; color:#bbb;">(YES/NO)</td>
      </tr>
       <tr>
        <th >DRIVING LICENSE </th>
        <td style="text-align:center; color:#bbb;">(YES/NO)</td>
        <th>VOTER IDENTITY CARD</th>
        <td style="text-align:center; color:#bbb;">(YES/NO)</td>
      </tr>
       <tr>
        <th >BANK A/C STATEMENT / PASSBOOK</th>
        <td style="text-align:center; color:#bbb;">(YES/NO)</td>
        <th>BANK A/C STATEMENT/PASSBOOK
</th>
        <td style="text-align:center; color:#bbb;">(YES/NO)</td>
      </tr>
      <tr>
        <th >PASSPORT</th>
        <td style="text-align:center; color:#bbb;">(YES/NO)</td>
        <th>DRIVING LICENSE</th>
        <td style="text-align:center; color:#bbb;">(YES/NO)</td>
      </tr>
      <tr>
        <th >ADHAAR CARD</th>
        <td style="text-align:center; color:#bbb;">(YES/NO)</td>
        <th>PASSPORT</th>
        <td style="text-align:center; color:#bbb;">(YES/NO)</td>
      </tr>
      <tr>
        <th >RATION CARD </th>
        <td style="text-align:center; color:#bbb;">(YES/NO)</td>
        <th>RATION CARD </th>
        <td style="text-align:center; color:#bbb;">(YES/NO)</td>
      </tr>
       <tr>
        <th ></th>
        <td style="text-align:center; color:#bbb;"></td>
        <th>RENT RECEIPT</th>
        <td style="text-align:center; color:#bbb;">(YES/NO)</td>
      </tr>
        </tbody>
  </table> 
<br/>
  <table class="table sub-content " cellspacing="0" cellpadding="6" style="width:100% !important;">
          <tbody>
       <tr>
        <td style="text-align:center; color:#000;">MARKETING EXECUTIVE </td><td ></td>
        <td style="text-align:center; color:#000;">SUB AGENT</td><td ></td>
      </tr>
        </tbody>
  </table>
  <br/>
  <h5 style="font-size:14px;">FOR OFFICE USE ONLY</h5>
  <hr/>
<table class="table sub-content " cellspacing="0" cellpadding="6" style="width:100% !important;">
        <tbody>
           <tr>
        <th style="width:70%;">RECEIVED BY :</th>
        <th >DATE :</th>
      </tr>
      <tr>
        <th >DATA ENTRY BY :</th>
        <th >DATE :</th>
      </tr>
      <tr>
        <th >AGREEMENT PRINTED ON :</th>
        <th >DATE :</th>
      </tr>
      <tr>
        <th >VERIFIED BY :</th>
        <th >DATE :</th>
      </tr>
      </tbody>
  </table>
 
 </div>
{{-- <div style="page-break-after: always;"></div> --}}
    {{-- <div class="section">
      <div class="header-bar">
        <h3 class="heading-1" style="background-color:#bcd688">Reference Details</h3>
      </div>
      <table class="table-data personal-details">
        <tbody>
          <tr>
            <td>REFEREES NAME</td><th>: {{ $dsareference->name }}</th>
            @foreach($address as $addresses)
            @if($addresses->typeOfAddress=='referance')
            <td>ADDRESS</td><th>: {{ $addresses->address }}</th>
          </tr>
          <tr><td></td></tr>
          <tr>
            <td>STATE</td><th>: {{ $addresses->state }}</th>
            @endif
            @endforeach
            <td>MOBILE NO</td><th>: {{ $dsareference->referenceMobileNumber }}</th>
          </tr>
          <tr><td></td></tr>
          <tr>
            <td>EMAIL</td><th>: {{ $dsareference->referenceEmail }}</th>
            <td>RELATIONSHIP</td><th>: {{ $dsareference->referenceRelation }}</th>
          </tr>
        </tbody>
      </table>
    </div>

    <div class="section">
      <div class="header-bar">
        <h3 class="heading-1" style="background-color:#bcd688">Proof Details</h3>
      </div>
      <table class="table-data personal-details">
        <tbody>
          <tr>
            <td><b>ID PROOF</b><br><br><img class="profile-img" src="{{ URL::asset('storage/img/proof/'.$dsaProof->file)}}" alt="" width="150" height="150"></td>
            <td><b>PAYMENT PROOF</b><br><br><img class="profile-img" src="{{ URL::asset('storage/img/payProof/'.$dsapaymentdetails->file)}}" alt="" width="150" height="150"></td>
            <td><b>ACCOUNT PROOF</b><br><br><img class="profile-img" src="{{ URL::asset('storage/img/Accproof/'.$dsabank->Accproof)}}" alt="" width="150" height="150"></td>
          </tr> 
        </tbody>
      </table>
    </div> --}}

 </div>  
</body>
</html>
