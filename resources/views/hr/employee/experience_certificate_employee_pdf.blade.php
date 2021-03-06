<html>
<head>
    <meta charset="utf-8">
    <title>Experience Certificate</title>

    <style type="text/css" media="screen">
    html{

    }
        @font-face {
        font-weight: normal;
        font-style: normal;
        font-variant: normal;
        src: local("GOTHIC"), url("{{URL::to('/') }}/vendor/dompdf.dompdf/lib/fonts/GOTHIC.ttf") format("truetype");
        }
        body {
            font-family: GOTHIC, sans-serif!important;
            background: url("{{URL::to('/') }}/img/tcnmaster/water_mark.png") no-repeat;
            background-size:fit;
            background-position:center;
             
        }
       
figure {
  position: relative
}
figcaption.main_head {
  position: absolute;
  width: 400px;
  max-width: 600px;
 margin-left:200px;
 font-size: 18px;
  line-height: 70px;
  text-align: center;
  left: 0;
  top: 0;
  text-shadow: 0 0 1px white;
  font-weight:bold;
}
figcaption.sub_head {
  position: absolute;
  width: 450px;
  max-width: 600px;
 margin-left: 200px;
 font-size: 11px;
  line-height: 80px;
  padding-top: 20px;
  text-align: center;
  left: 0;
  top: 0;
  text-shadow: 0 0 1px white;
  font-weight:bold;
}

table{
    line-height: 14px;
    font-size: 12px;
}

    </style>
</head>
<body>
<!-- <header id="header" style="text-align:center;/*padding-top: -30px;*/ ">
 
  
  <figcaption class="main_head">{{ucfirst($employee_details->company_name)}}</figcaption>
  <figcaption class="sub_head"> {{ucfirst($employee_details->branch_name)}}
                {{ucfirst($employee_details->address1)}},
                  {{ucfirst($employee_details->city)}},
                {{ucfirst($employee_details->state)}}, {{ucfirst($employee_details->countryName)}}, {{ucfirst($employee_details->pinNo)}}</figcaption>
</figure>
    <hr style="color:#dbdbdb">
</header> -->

<div>
<img src="{{URL::to('/') }}/img/tcnmaster/appointment.png" alt="" style="width: 100%; opacity: 1; position: relative; z-index: 999;" />
  
<br>
   <br>
  <div class="section" style="text-align:left;padding-top: 10px; font-size: 14px; ">
        <table cellspacing="0" cellpadding="0" border="0" align="left">
        <tr >
            <td><b>{{date('F, d-Y')}}</b></td>
        </tr>
        <tr >
            <td>&nbsp;<br>
   <br>
</td>
        </tr>
        <tr >
           <td><b>{{$employee_details->name}}</b></td>
        </tr>
        <tr >
          <td><b>Employee Code: {{$employee_details->code}}</b></td>
        </tr>
        </table> 
    </div>

<br>
   <br>
<br>
   <br>
<br>
   <br>
   <br>
        <div class="section" style="text-align:center;padding-top: 10px; ">
        <table cellspacing="0" cellpadding="0" border="0" align="center">
        <tr >
            <td width="450px" align="center">
                <b style="font-size:20px;padding-bottom: 5px; "><u>Experience Certificate</u></b><br/><br/>
            
            </td>
            
        </tr>
        </table> 
    </div><br><br>
   <br>
    


    <div >
        <table width="730px" align="center" >
            <tr>
                <td width="40px" valign="top"></td>
                <td width="590px" valign="top" style="padding:0 30px;text-align: justify; font-size: 15px;     line-height: 20px;">
                  Dear {{ucfirst($employee_details->salutation_name)}} {{ucfirst($employee_details->name)}},
                  <br/><br/>
                  With Reference to  your resignation letter dated ‘{{date('F',strtotime($employee_details->resign_date))}} {{date('d',strtotime($employee_details->resign_date))}}th {{date('Y',strtotime($employee_details->resign_date))}}’ we hereby accept your 
                  resignation from the  services of the company,
                  <br/><br/><br/><br/>
                  Your Service record is as follow:
                  <br/><br/>
                  <table width="50%" style=" font-size: 14px;" >
                    <tbody>
                      <tr>
                        <td>Name</td>
                         <td>: &nbsp;&nbsp;&nbsp;{{ucfirst($employee_details->name)}}</td>
                      </tr>
                       <tr>
                        <td>Designation</td>
                         <td>: &nbsp;&nbsp;&nbsp;{{ucfirst($employee_details->designation_name)}}</td>
                      </tr>
                      <tr>
                        <td>Date Of Joining</td>
                         <td>: &nbsp;&nbsp;&nbsp;{{date('F d,Y',strtotime($employee_details->date_of_joining))}}</td>
                      </tr>
                      <tr>
                        <td>Date Of Leaving</td>
                         <td>: &nbsp;&nbsp;&nbsp;{{date('F d,Y')}}</td>
                      </tr>
                    </tbody>
                  </table>
                  <br/>
                   You are relieved effective ‘{{date('F d,Y')}}’ as per the terms of our organization. 
                    <br/>
                    Your accounts if any will be setteled by our Accounts Department.
                     <br/>
                     We wish you all the best in your future endeavours.

            
                </td>
            </tr>
        </table>
    </div>
    <br>
    <br>
    <br>


    

    
<!-- 
    <div style="padding-left: 85px;">
        <p style="text-align:justify;font-size:12pt;">Wishing you all the best and welcome to a rewarding relationship with us.</p>
    </div> -->

    <div style="padding:0 30px;">
        
        <table> 
        <tr><td valign="top">Your Sincerely,</td></tr>
        <tr><td valign="top">For, {{ucfirst($employee_details->company_name)}}</td></tr>
        </table>
        <table width="630px" align="center">
        <tr><td align="left"><img src="{{URL::to('/') }}/img/tcnmaster/signature.jpg"></td></tr>
        <tr><td width="440px" valign="top">CEO / Managing Director</td>
        <td width="250px" valign="top" align="center" style="opacity: 0.4;" >(Company Seal)</td>
        </tr>
        </table>
    </div>

    
</body>
</html>