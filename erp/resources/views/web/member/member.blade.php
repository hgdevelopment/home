@extends('layout.erp')

@section('banner')
<div class="col-lg-12" align="center" style="background-color:#ffcf29">
            <img src="{{ URL::asset('new_heading.png') }}" class="img-responsive">
         </div>
@endsection

@section('sidebar')
{{-- @include('partial.header')
 @include('partial.aside') --}}
@endsection

@section('body')
  <link rel="stylesheet" href="{{ URL::asset('css/bootstrap-datepicker.min.css') }}" type="text/css" />
<style type="text/css">
	.app-content{
		margin-left: 0px;
	}
	.app-header-fixed {
    padding-top: 0px;
}
.navbar-collapse, .app-content, .app-footer {
    margin-left: 0px;
}
</style>
            <div class="bg-light lter b-b wrapper-md">
               <h1 class="m-n font-thin h3">Membership Request Form</h1>
            </div>
 <form id="member_register" action="/member" method="post" enctype="multipart/form-data">
            <div class="wrapper-md">

               <div class="row">

                  <div class="col-sm-12">
                     <div class="panel panel-default">
                        <div class="panel-heading font-bold">Personal Details</div>
                        <div class="panel-body">
                           <div class="row">
                              <div class="col-sm-4">
                                 <div class="form-group">
                                    <label>Full Name</label>
                                    <input type="text" class="form-control" placeholder="Full Name" id="fullname" name="fullname">
                                 </div>
                                 <div class="form-group">
                                    <label>Father's Name/Husband's Name</label>
                                    <input type="text" class="form-control" placeholder="Father's Name/Husband's Name" id="guardian" name="guardian">
                                 </div>
                                 <div class="form-group">
                                    <label>Date of Birth</label>
                                    <input type="text" class="form-control" placeholder="Date of Birth" id="dateofbirth" name="dateofbirth">
                                 </div>
                                 <div class="form-group">
                                    <label>Marital status</label>
                                    <select  class="form-control" id="marital" name="marital">
                                    <option value="">Select</option>
                                    <option value="Single">Single</option>
                                    <option value="Married">Married</option>
                                    </select>
                                 </div>
                                 <div class="form-group">
                                    <label>Gender</label>
                                    <select  class="form-control" >
                                    <option value="">Select</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    </select>
                                 </div>
                              </div>
                              <div class="col-sm-4">
                                 <div class="form-group">
                                    <label>Religion</label>
                                    <input type="text" name="religion" id="religion" readonly class="form-control" value="Islam">
                                 </div>
                                 <div class="form-group">
                                    <label>Caste</label>
                                    <select  class="form-control" id="caste" name="caste">
                                    <option value="">Select</option>
                                    @foreach ($listTypes['caste'] as $caste)
                                    <option value="{{$caste}}">{{$caste}}</option>
                                    @endforeach
                                    </select>
                                 </div>
                                 <div class="form-group">
                                    <label>Education</label>
                                    <select  class="form-control" id="education" name="education">
                                    <option value="">Select</option>
                                    @foreach ($listTypes['education'] as $education)
                                    <option value="{{$education}}">{{$education}}</option>
                                    @endforeach
                                    </select>
                                 </div>
                                 <div class="form-group">
                                    <label>Occupation</label>
                                    <select  class="form-control" id="ocuupation" name="ocuupation">
                                    <option value="">Select</option>
                                    @foreach ($listTypes['occupation'] as $occupation)
                                    <option value="{{$occupation}}">{{$occupation}}</option>
                                    @endforeach
                                    </select>
                                 </div>
                                 <div class="form-group">
                                    <label>Income</label>
                                    <input type="text" class="form-control" placeholder="Income" id="income" name="income">
                                 </div>
                              </div>
                              <div class="col-sm-4">
                                 <div class="form-group">
                                    <label>No of Children</label>
                                    <input type="text" class="form-control" placeholder="No of Children" id="childrens" name="childrens">
                                 </div>
                                 <div class="form-group">
                                    <label>Country</label>
                                    <select  class="form-control" name="country" id="country">
                                    <option value="">Select</option>
                                    @foreach ($listTypes['country'] as $country)
                                    <option value="{{$country->id}}">{{$country->countryName}}</option>
                                       {{-- expr --}}
                                    @endforeach
                                    </select>
                                 </div>
                                 <div class="form-group">
                                    <label>Mobile No</label>
                                    <input type="text" class="form-control" placeholder="Mobile No"  id="mobileno" name="mobileno">
                                 </div>
                                 <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" class="form-control" placeholder="Email" id="email" name="email">
                                 </div>
                                 <div class="form-group">
                                    <label>Upload Photo</label>
                                    <input type="file" class="form-control" id="profilepic" name="profilepic">
                                 </div>
                                 <div class="form-group">
                                    <label>Upload Signature</label>
                                    <input type="file" class="form-control" id="signature" name="signature">
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  
                  <div class="col-sm-4">
                     <div class="panel panel-default">
                        <div class="panel-heading font-bold">Official Address</div>
                        <div class="panel-body">
                           <div class="form-group">
                              <label>Address</label>
                              <textarea type="email" class="form-control" placeholder="Address" id="official_addr" name="official_addr"></textarea>
                           </div>
                           <div class="form-group">
                              <label>City</label>
                              <input type="text" class="form-control" placeholder="City" id="official_city" name="official_city">
                           </div>
                           <div class="form-group">
                              <label>State</label>
                              <input type="text" class="form-control" placeholder="State" id="official_state" name="official_state">
                           </div>
                           <div class="form-group">
                              <label>Pin</label>
                              <input type="text" class="form-control" placeholder="Pin" id="official_pin" name="official_pin">
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-sm-4">
                     <div class="panel panel-default">
                        <div class="panel-heading font-bold">Permanent Address</div>
                        <div class="panel-body">
                           <div class="form-group">
                              <label>Address</label>
                              <textarea type="email" class="form-control" placeholder="Address" id="official_addr" name="permanent_addr"></textarea>
                           </div>
                           <div class="form-group">
                              <label>City</label>
                              <input type="text" class="form-control" placeholder="City" id="official_city" name="permanent_city">
                           </div>
                           <div class="form-group">
                              <label>State</label>
                              <input type="text" class="form-control" placeholder="State" id="official_state" name="permanent_state">
                           </div>
                           <div class="form-group">
                              <label>Pin</label>
                              <input type="text" class="form-control" placeholder="Pin" id="official_pin" name="permanent_pin">
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-sm-4">
                     <div class="panel panel-default">
                        <div class="panel-heading font-bold">ADDRESS FOR CORRESPONDENCE</div>
                        <div class="panel-body">
                           <div class="form-group">
                              <label>Address</label>
                              <textarea type="email" class="form-control" placeholder="Address" id="corresondence_addr" name="corresondence_addr"></textarea>
                           </div>
                           <div class="form-group">
                              <label>City</label>
                              <input type="text" class="form-control" placeholder="City" id="corresondence_city" name="corresondence_city">
                           </div>
                           <div class="form-group">
                              <label>State</label>
                              <input type="text" class="form-control" placeholder="State" id="corresondence_state" name="corresondence_state">
                           </div>
                           <div class="form-group">
                              <label>Pin</label>
                              <input type="text" class="form-control" placeholder="Pin" id="corresondence_pin" name="corresondence_pin">
                           </div>
                        </div>
                  </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="panel panel-default">
                        <div class="panel-heading font-bold">Proof</div>
                        <div class="panel-body">
                           <div class="form-group">
                              <label>Type of proof</label>
                              <select  class="form-control" id="type_of_proof" name="type_of_proof">
                              <option value="">Select</option>
                                    @foreach ($listTypes['proof_type'] as $proof_type)
                                    <option value="{{$proof_type}}">{{ucfirst($proof_type)}}</option>
                                       {{-- expr --}}
                                    @endforeach
                              </select>
                           </div>
                           <div class="form-group">
                              <label>ID Number</label>
                              <input type="text" class="form-control" placeholder="ID Number" id="proof_number" name="proof_number">
                           </div>
                           <div class="form-group">
                              <label>Issued At</label>
                              <input type="text" class="form-control" placeholder="Issued At" id="issued_at" name="issued_at">
                           </div>
                           <div class="form-group">
                              <label>Issued Date</label>
                              <input type="text" class="form-control" placeholder="Issued Date" id="issued_date" name="issued_date">
                           </div>
                           <div class="form-group">
                              <label>Expiry Date</label>
                              <input type="text" class="form-control" placeholder="Expiry Date" id="expiry_date" name="expiry_date">
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="panel panel-default">
                        <div class="panel-heading font-bold">MEMBERSHIP DETAILS</div>
                        <div class="panel-body">
                           <div class="row">
                              <div class="col-sm-6">
                                 <div class="form-group">
                                    <label>AMOUNT OF HOLDING(IF ANY)</label>
                                    <select  class="form-control" id="type_amount_inr" name="type_amount_inr">
                                    <option>INR</option>
                                    </select>
                                 </div>
                              </div>
                              <div class="col-sm-6">
                                 <div class="form-group">
                                    <label>AMOUNT APPLYING FOR *</label>
                                    <input type="text" class="form-control" placeholder="AMOUNT APPLYING FOR *" id="amount_inr" name="amount_inr">
                                 </div>
                              </div>
                              <div class="col-sm-6">
                                 <div class="form-group">
                                    <label>AMOUNT OF HOLDING(IF ANY)</label>
                                    <select  class="form-control" id="type_amount_aed" name="type_amount_aed">
                                     <option>AED</option>
                                    </select>
                                 </div>
                              </div>
                              <div class="col-sm-6">
                                 <div class="form-group">
                                    <label>AMOUNT APPLYING FOR *</label>
                                    <input type="text" class="form-control" placeholder="AMOUNT APPLYING FOR *" id="amount_aed" name="amount_aed">
                                 </div>
                              </div>
                              <div class="col-sm-6">
                                 <div class="form-group">
                                    <label>AMOUNT OF HOLDING(IF ANY)</label>
                                    <select  class="form-control" id="type_amount_usd" name="type_amount_usd">
                                    <option>USD</option>
                                    </select>
                                 </div>
                              </div>
                              <div class="col-sm-6">
                                 <div class="form-group">
                                    <label>AMOUNT APPLYING FOR *</label>
                                    <input type="text" class="form-control" placeholder="AMOUNT APPLYING FOR *" id="amount_usd" name="amount_usd">
                                 </div>
                              </div>
                              <div class="col-sm-6">
                                 <div class="form-group">
                                    <label>AMOUNT OF HOLDING(IF ANY)</label>
                                    <select  class="form-control" id="type_amount_sar" name="type_amount_sar">
                                    <option>SAR</option>
                                    </select>
                                 </div>
                              </div>
                              <div class="col-sm-6">
                                 <div class="form-group">
                                    <label>AMOUNT APPLYING FOR *</label>
                                    <input type="text" class="form-control" placeholder="AMOUNT APPLYING FOR *" id="amount_sar" name="amount_sar">
                                 </div>
                              </div>
                              <div class="col-sm-6">
                                 <div class="form-group">
                                    <label>AMOUNT OF HOLDING(IF ANY)</label>
                                    <select  class="form-control" id="type_amount_cad" name="type_amount_cad">
                                    <option>CAD</option>
                                    </select>
                                 </div>
                              </div>
                              <div class="col-sm-6">
                                 <div class="form-group">
                                    <label>AMOUNT APPLYING FOR *</label>
                                    <input type="text" class="form-control" placeholder="AMOUNT APPLYING FOR *" id="amount_cad" name="amount_cad">
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-sm-12">
                     <div class="panel panel-default">
                        <div class="panel-heading font-bold">DECLARATION</div>
                        <div class="panel-body">
                           <div class="form-horizontal">
                              <div class="form-group">
                                 <!-- <label class="col-lg-2 control-label"></label> -->
                                 <div class="col-lg-12">
                                    <p class="form-control-static">I HAVE READ THE TERMS AND CONDITIONS OF HG AND THE SAME HAVE BEEN WELL EXPLAINED TO ME BY THE HG AUTHORITIES. I AM ALSO AWARE THAT THE TERMS AND CONDITIONS OF HG ARE PRINTED OVERLEAF .I HERE BY AGREE TO ABIDE BY THEM I DECLARE THAT ALL ABOVE DETAILS PROVIDED BY ME ARE CORRECT TO THE BEST OF MY KNOWLDGE</p>
                                 </div>
                              </div>
                              <div class="line line-dashed b-b line-lg pull-in"></div>
                              <div class="form-group">
                                 <label class="control-label" style="
                                    text-align: left;
                                    "></label>
                                 <div class="col-lg-10">
                                    <div class="checkbox" style="
                                       padding-right: 10px;
                                       float: left;
                                       padding-top: 14px;
                                       margin: 0;
                                       ">
                                       <label class="i-checks">
                                       <input type="checkbox" checked="" id="iagree" name="iagree"><i></i> 
                                       </label>
                                    </div>
                                    <p class="form-control-static" style="
                                       float: left;
                                       "><a>Terms &amp; Cond</a><br>I AGREE TO FULFILL ALL THE REQUISITES MENTIONED IN THE TERMS AND CONDITIONS OF HG</p>
                                 </div>
                              </div>
                              <div class="line line-dashed b-b line-lg pull-in"></div>
                              <div class="col-sm-4 ">
                                 <button type="submit" class="btn btn-primary">Submit</button>
                                 <button type="reset" class="btn btn-default">Cancel</button>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
</div>
</form>
@endsection

@section('jquery')
<script src="{{ URL::asset('js/bootstrap-datepicker.min.js') }}"></script>
<script type="text/javascript">
	$(function(){
      $('#dateofbirth').datepicker({'autoclose':true,format: 'dd/mm/yyyy'})
   })
</script>
@endsection