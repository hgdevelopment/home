<html>
<head>
    <meta charset="utf-8">
    <title>Appointment Letter</title>

    <style type="text/css" media="screen">
    html{
        padding: 5px;
    }
        @font-face {
        font-weight: normal;
        font-style: normal;
        font-variant: normal;
        src: local("GOTHIC"), url("{{URL::to('/') }}/vendor/dompdf.dompdf/lib/fonts/GOTHIC.ttf") format("truetype");
        }
        body {
            font-family: GOTHIC, sans-serif!important;
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
 <div style="opacity: 0.4; text-align: right; font-size: 11px; position: absolute; top: 150px; right: 20px;">{{date('d-m-Y')}}</div>
<div>
<img src="{{URL::to('/') }}/img/tcnmaster/appointment.png" alt="" style="width: 100%;" />
  <br>
    <br>
      <br>
    <br>
    <div class="section" style="text-align:center;padding-top: 10px; ">
        <table cellspacing="0" cellpadding="0" border="0" align="center">
        <tr >
            <td width="450px" align="center">
                <b style="font-size:23px;padding-bottom: 5px;">Appointment Letter</b><br/><br/>
            
            </td>
            
        </tr>
        </table> 
    </div><br><br>
    <div style="margin-left: 85px;padding-top: -20px;line-height: 13px;">
        <table width="100%">
           
            <tr><td >{{ucfirst($employee_details->salutation_name)}}{{ucfirst($employee_details->name)}}</td></tr>
            <tr><td >{{ucfirst($employee_details->useraddress)}},</td></tr>
            <tr><td >{{ucfirst($employee_details->usercity)}},</td></tr>
            <tr><td >{{ucfirst($employee_details->userstate)}},</td></tr>
            <tr><td >{{ucfirst($employee_details->countryName)}},</td></tr>
            <tr><td >{{ucfirst($employee_details->userzipcode)}}</td></tr>
            <tr><td >&nbsp;</td></tr>
            <tr><td></td></tr>
            <tr><td>Dear {{ucfirst($employee_details->salutation_name)}}{{ucfirst($employee_details->name)}},</td></tr>        
        </table>
    </div>

    <div >
        <table width="630px" align="center" >
            <tr>
                <td width="40px" valign="top"></td>
                <td width="590px" valign="top" style="padding-left: 60px;text-align: justify;">
                  This is with reference to your interview and your recent discussion with us, we are pleased to offer you an appointment in our company under the following terms and conditions.
                </td>
            </tr>
        </table>
    </div>
    <br>
    <br>



    <div style="margin-left: 35px;padding-top:-30px;line-height: 12px;">
        <table width="630px" align="center" >
            <tr style="padding-top: 0px;padding-bottom: 0px;" >
                <td width="40px" valign="top">1.</td>
                <td width="590px" valign="top" >
                   Your initial designation will be <b>{{ucfirst($employee_details->designation_name)}}
                </td>
            </tr>

            <tr >
                <td width="40px" valign="top">2.</td>
                <td width="590px" valign="top"  style="text-align: justify;" >
                  You will be on probation for a period of 6(Six) months from the date of your joining us,at the end of which, you will be confirmed in writing to be on the permanent rolls of the company,if your services are found satisfactory.The company may extend the probationary period if necessary
            </tr>
            <tr >
                <td width="40px" valign="top">3.</td>
                <td width="590px" valign="top"  style="text-align: justify;" >
                    You will be paid a consolidated Salary of Rs.&nbsp;<b>{{$employee_details->salary}}</b> per month. 
                </td>
            </tr>
          
        </table>
    </div>
    <div style="margin-left:100px;"> 
        <table width="630px" align="center">
              <tr>
                <td width="590px" valign="top">
                    You will draw the following compensation:<br/>
                </td>
                <td width="40px" valign="top">&nbsp;</td>
                
            </tr>
        </table>
    </div>

    <div style="padding-left:110px;">
        <table width="630px" align="center">
            @php $key = 1
            @endphp
            @foreach($salary as $salaries)

            <tr>
                <td width="10" valign="right"  ><b>{{ $key++ }}. </b></td>
                <td width="590px" valign="top" ><b>{{ $salaries->allowances }} : {{ $employee_details->salary * ($salaries->percentage / 100) }}</b></td>
               
            </tr>
            @endforeach  
        </table>
    </div>

    <div >
        <table width="630px" align="center">
            <tr>
                <td width="40px" valign="top">4.</td>
                <td width="590px" valign="top"  style="text-align: justify;">
                   During the probation period,the company may terminate your services without notice if your performance is not up to our expectations or for any other reason
                </td>
            </tr>
            <tr>
                <td width="40px" valign="top">5.</td>
                <td width="590px"  valign="top"  style="text-align: justify;">
                You will be governed by the service rules of this company as may be applicable to you from time to time.
                </td>
            </tr>
            <tr >
                <td width="40px" valign="top">6.</td>
                <td width="590px" valign="top"  style="text-align: justify;">
                 Your Date of Birth as given by you is 
                        <b>@php $date = new Carbon( $employee_details->dob ) @endphp
                        {{ $date->format('d/m/Y') }}</b>
                        and you will automatically retire on attaining the age of 60 years. An extension may however be given at the discretion of the management asper the rules of the organization.
                </td>
            </tr>
            <tr>
                <td width="40px" valign="top">7.</td>
                <td width="590px" valign="top"  style="text-align: justify;">
                    You are requested to report for duty on or before <b>@php $date = new Carbon( $employee_details->date_of_joining ) @endphp
                        {{ $date->format('d/m/Y') }}</b>, at 10am . In case you fail to report for duty on this date, the offer shall stand automatically withdrawn.
                </td>
            </tr>
            <tr>
                <td width="40px" valign="top">8.</td>
                <td width="590px" valign="top"  style="text-align: justify;">
                   Please return the copy of the letter of appointment duly signed in token of understanding andacceptance of this offer.
                </td>
            </tr>
        </table>
    </div>

     <div >
        <table width="630px" align="center" >
            <tr>
                <td width="40px" valign="top"></td>
                <td width="590px" valign="top" style="padding-left: 60px;text-align: justify;">
                 Wishing you all the best and welcome to a rewarding relationship with us.
                </td>
            </tr>
        </table>
    </div>

<br><br>
<br><br>
<br><br>
<br><br>
<!-- 
    <div style="padding-left: 85px;">
        <p style="text-align:justify;font-size:12pt;">Wishing you all the best and welcome to a rewarding relationship with us.</p>
    </div> -->

    <div style="padding-left: 80px;">
        
        <table>
         
         <tr><td valign="top">  Best Regards,</td></tr> 
        <tr><td valign="top"><b>For&nbsp;{{ucfirst($employee_details->company_name)}}</b></td></tr>
        </table>
        <table width="630px" align="center">
        <tr><td align="left"><img src="{{URL::to('/') }}/signature.jpg"></td></tr>
        <tr><td width="440px" valign="top">CEO / Managing Director</td>
        <td width="250px" valign="top" align="left" >Signature of the Employee</td>
        </tr>
        </table>
    </div>

    <div style="page-break-after: always;"></div>
    
    <div style="padding-top: 50px;">
        <table cellspacing="0" cellpadding="1" border="0">
        <tr><td colspan="3"></td></tr>
        <tr><td colspan="3"></td></tr>
        <h3 align="center"><b>OTHER TERMS & CONDITIONS FOR APPOINTMENT</b></</h3>
        </table>
    </div>

    <div>
        <table width="630px" align="center">
            <tr>
                <td width="40px" valign="top">1.</td>
                <td width="590px" valign="top"  style="text-align: justify;">
                    This appointment shall take effect from the date you report for duty
                </td>
            </tr>
            <tr>
                <td width="40px" valign="top">2.</td>
                <td width="590px" valign="top"  style="text-align: justify;">
                    <b>Probation:</b> You will be on probation for a period of 6 (six) months from the date you report for duty. After the expiry of your probationary period, it will be open to the management either to confirm you or to extend your probation.  If, however, the management does not confirm you on the expiry of the probationary period or does not extend the period of probation, your services shall automatically stand terminated on the expiry of the probationary period. The Management, however, reserves the right to terminate your services without assigning any reasons during the probationary period, or the extended probationary period.
                </td>
            </tr>
            <tr>
                <td width="40px" valign="top">3.</td>
                <td width="590px" valign="top">
                   <b>Separation</b>
                </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td width="590px" valign="top"  style="text-align: justify;">
                 <b> a)</b>.&nbsp;  After confirmation, in the event of your resignation or termination of services, either side will have to give notice of one month, or pay salary in lieu thereof .
                </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td width="590px" valign="top"  style="text-align: justify;">
                   <b>b)</b>.&nbsp;  You have been engaged on the presumption that the particulars furnished by you in your employment application are correct.  In case the said particulars are found to be incorrect or that you have concealed or withheld some other relevant facts, the Management may terminate your services without any notice.
                </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td width="590px" valign="top"  style="text-align: justify;">
                    <b>c)</b>.&nbsp;  If during the period of your service, the Management comes to the conclusion that you have committed any misconduct; the Management may dismiss you from service without giving any notice.
                </td>
            </tr>
            <tr>
                <td width="40px" valign="top">4.</td>
                <td width="590px" valign="top"  style="text-align: justify;">
                   <b>Transfer:</b>  Your services can be transferred by the Management to any place or any Department/ Section or to any other station or to any other sister or associate concern in India or abroad on the same terms and conditions.
            </tr>
            <tr>
                <td width="40px" valign="top">5. </td>
                <td width="590px" valign="top"  style="text-align: justify;">
                   <b>(a)</b>.During the period of your employment with us, you will not  engage, concern, interest yourself directly or indirectly in any other occupation, business or employment whatsoever without the previous consent in writing of the Management but you shall devote your whole time, attention and abilities exclusively to  the performance of your duties.  You shall in all respects abide & confirm to the Managements orders and regulations and will faithfully serve the Company and put in your best endeavors to promote the interest of the company.  During such time as you may be engaged in connection with the business of any other sister/associate concern of the company, you will at all times readily conform to, abide and execute all lawful instructions which may be issued to you by such other sister/associate concerns.
                </td> 
            </tr>
            <tr>
                <td width="40px" valign="top"></td>
                <td width="590px" valign="top"  style="text-align: justify;">
                  <b>b)</b>.The company will expect you to work with a high standard of initiative, efficiency and economy.
                </td> 
            </tr>

           
            <tr>
                <td width="40px" valign="top"></td>
                <td width="590px" valign="top"  style="text-align: justify;">
                  <b>c)</b>.You will not, either during the period of your service in the company or thereafter for one years, disclose, divulge or communicate to any other person or persons whatsoever any information relating to the trade or business of the company or its sister and/or associate concerns/or to the methods, process, appliances, machinery or plants used by them, or any of them, or to any experiments made by them, or any of them, or by any persons in their employ.
                </td> 
            </tr>
            <tr>
                <td width="40px" valign="top"></td>
                <td width="590px" valign="top"  style="text-align: justify;">
                 <b>d)</b>.You shall not, except as authorized or required by your duties towards the company, reveal to any person, persons or Company any of the trade secrets, secret or confidential information, operations, processes, know-how, drawings, designs, specifications or dealings concerning the organization, business finances, transactions or affairs of the Company which may come to your knowledge during your employment or which may have come to your knowledge and shall keep with complete secrecy all confidential information entrusted to you and shall not use or attempt to use any such information in any manner which may injure or cause loss either directly or indirectly to the Company or its business or may be likely so to do.
                </td> 
            </tr>
            <tr>
                <td width="40px" valign="top"></td>
                <td width="590px" valign="top"  style="text-align: justify;">
                  <b>e)</b>.You will be governed by the Service Rules and Regulations of the company which at present are in force and which may be added, modified, amended, altered, changed, or replaced from time to time by the company.
                </td> 
            </tr>
            <tr>
                <td width="40px" valign="top">6.</td>
                <td width="590px" valign="top">
                   <strong>Intellectual Property of the Company:</strong>
                </td> 
            </tr>
            <tr>
                <td width="40px" valign="top"></td>
                <td width="590px" valign="top"  style="text-align: justify;">
                   <b>(a)</b>You agree to retain the Company's Intellectual Property, secret or confidential information, business finances, transactions or affairs of the Company, as strictly confidential and a trade secret of the Company.You also agree not to use, or cause to be used, the Company's Intellectual Property, trade secrets and confidential information, except for or on behalf of the Company, not to disclose, directly or indirectly,
                    Company's Intellectual Property, trade secrets and confidential information, except as authorized on a
                    confidential basis, or to a person having a valid contract with the Company under which its nature as a
                    trade secret is respected and the recipient promises to retain it in confidence. Upon cessation of
                    employment, you agree to surrender to the Company all tangible forms of Company's Intellectual Property,
                    trade secrets and confidential information, which you may then possess or have under his control.
                </td> 
            </tr>
            <tr>
                <td width="40px" valign="top"></td>
                <td width="590px" valign="top"  style="text-align: justify;">
                   <b>(b)</b>Upon termination of your employment or upon your ceasing to be in the Company's employment for any reason whatsoever, you shall immediately give up to the Company all books, plans, formula, letters,notes, memos, reports, drawings, photographs, secret information or other documents or notes in respect
                    of any such documents relating in any way to the affairs of the Company.
                   
                </td> 
            </tr>
           
             <tr>
                <td width="40px" valign="top"></td>
                <td width="590px" valign="top"   style="text-align: justify;">
                   <b>(c)</b>You shall promptly disclose to an executive office to the Company all inventions, discoveries, improvement and enhancements devised by you while in the employment of the Company, which inventions,discoveries, improvements, and enhancements relate to processes, products, systems, programs or other developments manufactured or developed or sold by the company, or the manufacture, development or sale of which was at the time of said invention, discovery, improvements, or enhancements in contemplation by the Company. You hereby further agree to transfer and assign to the Company all the interests you may have in the right, title and interest in and to the same, including any interest in and to any domestic or foreign patent rights, trademarks, trade names and copyrights therein and any renewals thereof. on request of the Company you shall execute from time to time, during or after the termination of your employment, such further instruments, including without limitations, application for letters of patent,trademarks, trade names and copyrights or assignments thereof, as may be deemed necessary or desirable by the company to effectuate the provisions of this agreement. All expenses of filing or prosecuting any application for patents, trademarks, trade names, or copyrights shall be borne solely by the Company but you shall coordinate in filing and/or prosecuting any such applications.
                    
                </td> 
            </tr>
            <tr>
                <td width="40px" valign="top"></td>
                <td width="590px" valign="top"  style="text-align: justify;">
                 <b>(d)</b>You agree that you shall not make, have made, replicate, reproduce, use, sell, incorporate or otherwise exploit, for your own or any other purpose, any of the Intellectual Property, trade secrets or other confidential information that is or may be revealed to you by the Company unless specifically authorized to do so in writing by the Company
                    
                </td> 
            </tr>
             <tr>
                <td width="40px" valign="top">7.</td>
                <td width="590px"  style="text-align: justify;">
                    <b>Security Deposit</b> - Your salary in the first month will be held by the Company as security deposit. For each increment of salary, the amount of increment will be added to the deposit. In this way, at the event of leaving the company, you will be receiving the last drawn salary as security deposit. To claim the security deposit, at the event of leaving the company you should provide the company a notice period of 30 days,during which you have to either complete the project or work you have undertaken or hand it over
                    completely to the next appointed person.

                    <br></p>
                </td> 
            </tr>
             <tr>
                <td width="40px" valign="top">8.</td>
                <td width="590px" valign="top"  style="text-align: justify;">
                    This appointment and its continuance is subject to your being and remaining medically (physically and mentally) fit. In this regard, the opinion of the Doctor, nominated by the Company, shall be final and binding on the parties.
                   
                </td> 
            </tr>
              <tr>
                <td width="40px"  valign="top">9.</td>
                <td width="590px" valign="top"  style="text-align: justify;">
                  Any change in your residential address, marital status or other details must be communicated to us in writing.
                  
                </td> 
            </tr>
            <tr>
                <td width="40px" valign="top">10.</td>
                <td width="590px" valign="top"  style="text-align: justify;">
                  Uniform is compulsory within the organization. It has to be worn within a month after the date of joining.
  
                </td> 
            </tr>
            <tr>
                <td width="40px" valign="top">11.</td>
                <td width="590px" valign="top"  style="text-align: justify;">
                  You are not supposed to use your mobile within the organization unless you are approved by the Management to do so. Violation of this rule will lead to termination of your service without notice by the company.

                    
                </td> 
            </tr>

         
            <tr>
                <td width="40px" valign="top">12.</td>
                <td width="590px" valign="top"  style="text-align: justify;">
                     You are not allowed to bring laptop and storage devices such as CDs, DVDs, pen drives, external storage media etc. to the organization. If required to bring these items, prior approval of the Functional Head needs to be taken
                    
                </td> 
            </tr>
            <tr>
                <td width="40px" valign="top">13.</td>
                <td width="590px" valign="top">
                   <strong>Medical Examination and Documentation:</strong>
                   
                </td> 
            </tr>
            <tr>
                <td width="40px" valign="top"></td>
                <td width="590px" valign="top"  style="text-align: justify;">
                   <b>a).</b>Your appointment will be subject to your producing a Medical Report from the Company's Medical Officer testifying to your fitness for work.
                    
                </td> 
            </tr>
             <tr >
                <td width="40px" valign="top"></td>
                <td width="590px" valign="top" style="text-align: justify;">
                 <b>b).</b> Your continuation in service will also be subject to satisfactory verification of your credentials, testimonials,etc. You are required to bring the following certificates and documents in original when you report for duty:
                   
                </td> 
            </tr>
             <tr>
                <td width="40px" valign="top"></td>
                <td width="590px" valign="top" >
                          <ul>
                              <li>Documentary evidence in proof of your date of birth.</li>
                              <li>Documentary evidence in proof of your educational and other technical qualifications.</li>
                              <li>Documentary evidence in proof of your previous experience.</li>
                              <li>Documentary evidence and proof of your last drawn salary.</li>

                          </ul>
                          

                   
                </td> 
            </tr>
             
        </table>
       
    </div>
    <br>
 <div style="padding-left: 80px;">
        
        <table>
         
         <tr><td valign="top">  Best Regards,</td></tr> 
        <tr><td valign="top"><b>For&nbsp;{{ucfirst($employee_details->company_name)}}</b></td></tr>
        </table>
        <table width="630px" align="center">
        <tr><td align="left"><img src="{{URL::to('/') }}/signature.jpg"></td></tr>
        <tr><td width="440px" valign="top">CEO / Managing Director</td>
        <td width="250px" valign="top" align="left" >Signature of the Employee</td>
        </tr>
        </table>
    </div>
    </div>
</body>
</html>