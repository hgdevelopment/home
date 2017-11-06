@extends('admin.layout.erp1')
@section('banner')
  <div class="col-lg-12" align="center" style="background-color:#ffcf29">
    <img src="{{ URL::asset('new_heading.png') }}" class="img-responsive">
  </div>
@endsection
@section('sidebar')
  @include('admin.partial.header')
  @include('admin.partial.aside')
@endsection
<style type="text/css">
textarea.form-control 
{
height:10px;
}
</style>
@section('body')
<div class="bg-light lter b-b wrapper-md">
  <h1 class="m-n font-thin h3">Edit CreatedMember Request View</h1>
</div>
<div class="wrapper-md">
  <div class="row">
    <div class="col-sm-12">
      <div class="blog-post">
        <form role="form" method="POST" action="{{URL::to('/') }}/admin/Requestmember/@yield('edit_id')" data-parsley-validate enctype="multipart/form-data">
        {{csrf_field()}}                   
          <div class="col-sm-12">
            @section('edit')
            @show
            <div class="panel panel-default">
              <div class="panel-heading font-bold">Personal Details</div>
              <div class="panel-body">
                <div class="form-group col-sm-4">
                  <label>Full Name<span style="color:red;">*</span> (Same as Bank Account Name)</label>
                  <input type="text" name="fullname" id="fullname" value="@yield('fullname')" class="form-control" required data-parsley-required-message="Please Enter Full Name" >
                  @if ($errors->has('fullname'))
                  <span class="help-inline">{{$errors->first('fullname')}}</span>
                  @endif
                </div>
                <div class="form-group col-sm-4">
                  <label>Father's Name/Husband's Name<span style="color:red;">*</span></label>
                  <input type="text" name="guardian" id="guardian" value="@yield('guardian')" required data-parsley-required-message="Please Enter Guardian Name"  class="form-control" >
                  @if ($errors->has('guardian'))
                  <span class="help-inline">{{$errors->first('guardian')}}</span>
                  @endif
                </div>
                <div class="form-group col-sm-4">
                  <label>Date of Birth<span style="color:red;">*</span></label>
                  <input type='text' name="dateofbirth" id="dateofbirth" readonly required placeholder="MM/DD/YYYY" data-language="en" class="form-control" value="@yield('dateofbirth')" onchange="getAge()" />
                  <div id="dateerror" style="color:red;"></div>
                  @if ($errors->has('dateofbirth'))
                  <span class="help-inline">{{$errors->first('dateofbirth')}}</span>
                  @endif                  
                </div>
                <div class="form-group col-sm-4">
                  <label>Gender<span style="color:red;">*</span></label><br>
                  <select class="form-control" id="gender" name="gender" required data-parsley-required-message="Please Select Gender">
                  <option value="">--Select--</option>
                  <option value="Male" @if($__env->yieldContent('gender')=='Male') {{ 'selected' }}@endif>Male</option>
                  <option value="Female" @if($__env->yieldContent('gender')=='Female') {{ 'selected' }}@endif>Female</option>
                  </select>
                  @if ($errors->has('gender'))
                  <span class="help-inline">{{$errors->first('gender')}}</span>
                  @endif
                </div>
                <div class="form-group col-sm-4">
                  <label>Religion</label>
                  <input type="text"  class="form-control" readonly id="religion" name="religion"
                  value="Islam"@yield('religion')=='Islam') {{ 'selected' }}>
                </div>
                <div class="form-group col-sm-4">
                  <label>Caste</label>
                  <select  class="form-control" id="caste" name="caste">
                    <option value="">--Select--</option>
                    <option value="General"@if($__env->yieldContent('caste')=='General') {{ 'selected' }}@endif>General</option>
                    <option value="OBC"@if($__env->yieldContent('caste')=='OBC') {{ 'selected' }}@endif>OBC</option>
                    <option value="BC"@if($__env->yieldContent('caste')=='BC') {{ 'selected' }}@endif>BC</option>
                    <option value="OC"@if($__env->yieldContent('caste')=='OC') {{ 'selected' }}@endif>OC</option>
                    <option value="SC"@if($__env->yieldContent('caste')=='SC') {{ 'selected' }}@endif>SC</option>
                    <option value="ST"@if($__env->yieldContent('caste')=='ST') {{ 'selected' }}@endif>ST</option>
                  </select>
                </div>
                <div class="form-group col-sm-4">
                  <label>Nationality<span style="color:red;">*</span></label>
                  <select  class="form-control" id="country" name="country" required data-parsley-required-message="Please Select Country" onchange="countryId(this.value)">
                    <option value="">Select</option>
                    @foreach ($country as $countrys)
                    <option value="{{$countrys->id}}" @if($__env->yieldContent('country')==$countrys->id) {{ 'selected'}} @endif>{{$countrys->countryName}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group col-sm-4">
                  <label>Education</label>
                  <select  class="form-control" id="education" name="education">
                    <option value="">--Select--</option>
                    <option value="NON-SSC"@if($__env->yieldContent('education')=='NON-SSC') {{ 'selected' }}@endif>NON_SSC</option>
                    <option value="SSC-HSC"@if($__env->yieldContent('education')=='SSC-HSC') {{ 'selected' }}@endif>SSC_HSC</option>
                    <option value="Graduate"@if($__env->yieldContent('education')=='Graduate') {{ 'selected' }}@endif>GRADUATE</option>
                    <option value="Postgraduate"@if($__env->yieldContent('education')=='Postgraduate') {{ 'selected' }}@endif>POSTGRADUATE</option>
                  </select>  
                </div>
                <div class="form-group col-sm-4">
                  <label>Occupation</label>
                  <select  class="form-control" id="occupation" name="occupation">
                    <option value="">--Select--</option>
                    <option value="Business"@if($__env->yieldContent('occupation')=='Business') {{ 'selected' }}@endif>BUSINESS</option>
                    <option value="Salaried"@if($__env->yieldContent('occupation')=='Salaried') {{ 'selected' }}@endif>SALARIED</option>
                    <option value="Student"@if($__env->yieldContent('occupation')=='Student') {{ 'selected' }}@endif>STUDENT</option>
                    <option value="Housewife"@if($__env->yieldContent('occupation')=='Housewife') {{ 'selected' }}@endif>HOUSEWIFE</option>
                    <option value="SelfEmployed/Professional"@if($__env->yieldContent('occupation')=='SelfEmployed/Professional') {{ 'selected' }}@endif>SELFEMPLOYED / PROFESSIONAL</option>
                    <option value="Retired"@if($__env->yieldContent('occupation')=='Retired') {{ 'selected'}} @endif>RETIRED</option>
                  </select>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Income<span style="color:red;">*</span></label>  
                    <div class="input-group m-b"> 
                      <div class="input-group-btn dropdown">
                        <select class="btn btn-default" id="incomeid" name="incomeid"  required>
                        <option value="">--Select--</option>
                        <option value="INR" @if($__env->yieldContent('incomeid')=='INR') {{ 'selected' }}@endif>INR</option>
                        <option value="AED" @if($__env->yieldContent('incomeid')=='AED') {{ 'selected' }}@endif>AED</option>
                        <option value="USD" @if($__env->yieldContent('incomeid')=='USD') {{ 'selected' }}@endif>USD</option>
                        <option value="SAR" @if($__env->yieldContent('incomeid')=='SAR') {{ 'selected' }}@endif>SAR</option>
                        <option value="CAD" @if($__env->yieldContent('incomeid')=='CAD') {{ 'selected' }}@endif>CAD</option>
                        </select>
                      </div>
                      <input type="text" placeholder="Income" id="income" name="income" value="@yield('income')" class="form-control" required  data-parsley-trigger="keyup" data-parsley-type="number" data-parsley-min="1">
                      @if ($errors->has('income'))
                      <span class="help-inline">{{$errors->first('income')}}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="form-group col-sm-4">
                  <label>Marital status<span style="color:red;">*</span></label>
                  <select  class="form-control" id="marital" name="marital" required data-parsley-required-message="Please Select Marital status">
                    <option value="">--Select--</option>
                    <option value="Single" @if($__env->yieldContent('marital')=='Single') {{ 'selected' }}@endif>Single</option>
                    <option value="Married" @if($__env->yieldContent('marital')=='Married') {{ 'selected' }}@endif>Married</option>
                    <option value="Divorced" @if($__env->yieldContent('marital')=='Divorced') {{ 'selected' }}@endif>Divorced</option>
                    <option value="Widowed" @if($__env->yieldContent('marital')=='Widowed') {{ 'selected' }}@endif>Widowed</option>
                  </select>
                </div>
                <div class="form-group col-sm-4">
                  <label>No of Children</label>
                  <input type="text" name="childrens" id="childrens" data-parsley-type="integer" data-parsley-trigger="keyup" value="@yield('childrens')" class="form-control">
                </div>
                <div class="col-sm-12"></div>
                <div class="form-group col-sm-4">
                  <label>Mobile No<span style="color:red;">*</span></label>
                  <div class="input-group m-b">
                    <span class="input-group-addon conId"> @yield('conId12')</span>
                    <input type="hidden" id="conId1" name="conId1" value="@yield('conId12')">
                    <input type="text" name="mobileno" id="mobileno" value="@yield('mobileno')" required data-parsley-required-message="Please Enter Mobile Number" data-parsley-trigger="keyup" data-parsley-maxlength="16" data-parsley-type="integer" class="form-control">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label id="land_prefix">Landline No</label>
                    <input type="text" class="form-control" placeholder="Landline No" data-parsley-type="integer" data-parsley-maxlength="16" data-parsley-trigger="keyup" value="@yield('landlineno')" id="landlineno" name="landlineno" >
                    @if ($errors->has('landlineno'))
                    <span class="help-inline">{{($errors->first('landlineno')=='validation.phone')?'Not a valid Mobile Number':$errors->first('landlineno')}}</span>
                    @endif
                  </div>
                </div>
                <div class="form-group col-sm-4">
                  <label>Email<span style="color:red;">*</span></label>
                  <input type="text" name="email" id="email" value="@yield('email')" required data-parsley-required-message="Please Enter Correct Email" data-parsley-trigger="change" data-parsley-type="email" class="form-control" >
                </div>
                <div class="col-sm-12"></div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>How Do You Know About Heera Group?<span style="color:red;">*</span></label>
                    <textarea type="text" class="form-control" placeholder="How Do You Know About Heera Group" name="aboutheera" id="aboutheera" required >@yield('aboutheera')</textarea>
                  </div>
                </div>
                <div class="form-group col-sm-4" >
                  <label>Upload Photo<span style="color:red;">*</span></label><br>
                  <input type="hidden" name="MAX_FILE_SIZE" value="1048576" />
                  <input type="file" name="photo" id="photo"  class="form-control" accept="image/png,image/jpeg" onchange="validateFileType();photoSize(this)" >
                  <div id="msgerror" style="color:red;"></div>
                  <div id="photoSize" style="color:red;"></div>
                  <img src="{{ URL::asset('storage/img/member_img/'.$memberedit->photo)}}" style="width:100px;height:100px;">
                  <input type="hidden" name="photo_update" value="{{$memberedit->photo}}">
                </div>
                <div class="form-group col-sm-4">
                  <label>Upload Signature<span style="color:red;">*</span></label><br>
                  <input type="file" name="signature" id="signature"  class="form-control" accept="image/png,image/jpeg" onchange="validateSig();sigSize(this)" >
                  <div id="msgerrorsignature" style="color:red;"></div>
                  <div id="sigSize" style="color:red;"></div>
                  <img src="{{ URL::asset('storage/img/member_img/'.$memberedit->singnature)}}" style="width:100px;height:100px;">
                  <input type="hidden" name="sign_update" value="{{$memberedit->singnature}}">
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="blog-post">
              <div class="col-sm-4">
                <div class="panel panel-default">
                 <div class="panel-heading font-bold">Permanent Address
                  </div>
                    <div class="panel-body">
                      <div class="form-group col-sm-12">
                        <label>Address<span style="color:red;">*</span></label>
                        <textarea row="1" column="1" type="text" name="per_address"  id="per_address" required data-parsley-required-message="Please Enter Address " data-parsley-trigger="keyup"  class="form-control" style="height:5%">@yield('per_address')</textarea>
                      </div>
                      <div class="form-group col-sm-12">
                        <label>City<span style="color:red;">*</span></label>
                        <input type="text" name="per_city" id="per_city" value="@yield('per_city')" required data-parsley-required-message="Please Enter City" class="form-control" >
                      </div>
                      <div class="form-group col-sm-12">
                        <label>State<span style="color:red;">*</span></label>
                        <input type="text" name="per_state" id="per_state" value="@yield('per_state')" required data-parsley-required-message="Please Enter State" data-parsley-pattern="^[A-Z a-z]*$" data-parsley-trigger="keyup" class="form-control" >
                      </div>
                      <div class="form-group col-sm-12">
                        <label>Country<span style="color:red;">*</span></label>
                        <select  class="form-control" id="per_country" name="per_country" required data-parsley-required-message="Please Select Country">
                        <option value="">Select</option>
                        @foreach ($country as $countrys)
                        <option value="{{$countrys->id}}" @if($__env->yieldContent('per_country')==$countrys->id) {{ 'selected'}} @endif>{{$countrys->countryName}}</option>
                        @endforeach
                        </select>
                      </div>
                      <div class="form-group col-sm-12">
                        <label>Pin<span style="color:red;">*</span></label>
                        <input type="text" name="per_pin" id="per_pin" value="@yield('per_pin')" data-parsley-minlength="4" data-parsley-type="integer" required data-parsley-required-message="Please Enter Pin Number" data-parsley-trigger="keyup"  data-parsley-maxlength="6" class="form-control" >
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="panel panel-default">
                  <div class="panel-heading font-bold"> Correspondence Address </div>
                  <div class="panel-body">
                    <div class="form-group col-sm-12">
                      <label>Address<span style="color:red;">*</span><span style="font-size: 8px;"  class="perm_adrs">SAME AS PERMANENT ADDRESS  
                     <label class="checkbox-inline i-checks">
                      <input type="checkbox" name="Address" id="Address" onclick="address()"><i style="margin-top: -10px;"></i></label></span></label>
                      <textarea row="1" column="1" type="text" name="corr_address"  id="corr_address"  required data-parsley-required-message="Please Enter Address " data-parsley-trigger="keyup" class="form-control" style="height:5%">@yield('corr_address')</textarea>
                    </div>
                    <div class="form-group col-sm-12">
                      <label>City<span style="color:red;">*</span></label>
                      <input type="text" name="corr_city" id="corr_city" value="@yield('corr_city')" required data-parsley-required-message="Please Enter City" class="form-control" >
                    </div>
                    <div class="form-group col-sm-12">
                      <label>State<span style="color:red;">*</span></label>
                      <input type="text" name="corr_state" id="corr_state" value="@yield('corr_state')" required data-parsley-required-message="Please Enter State" data-parsley-pattern="^[A-Z a-z]*$" data-parsley-trigger="keyup" class="form-control" >
                    </div>
                    <div class="form-group col-sm-12">
                      <label>Country<span style="color:red;">*</span></label>
                      <select  class="form-control" id="corr_country" name="corr_country" required data-parsley-required-message="Please Select Country">
                      <option value="">Select</option>
                      @foreach ($country as $countrys)
                      <option value="{{$countrys->id}}" @if($__env->yieldContent('corr_country')==$countrys->id) {{ 'selected'}} @endif>{{$countrys->countryName}}</option>
                      @endforeach
                      </select>
                    </div>
                    <div class="form-group col-sm-12">
                      <label>Pin<span style="color:red;">*</span></label>
                      <input type="text" name="corr_pin" id="corr_pin" data-parsley-type="integer" value="@yield('corr_pin')" required data-parsley-required-message="Please Enter Pin Number" data-parsley-trigger="keyup" data-parsley-minlength="4" data-parsley-maxlength="6" class="form-control" >
                    </div>
                  </div>
                </div>
              </div>
              <div class="blog-post">
                <div class="col-sm-4">
                  <div class="panel panel-default">
                    <div class="panel-heading font-bold"> Official Address</div>
                    <div class="panel-body">
                      <div class="form-group col-sm-12">
                        <label>Address</label>
                        <textarea row="1" column="1" type="text" name="official_addr" id="official_addr" class="form-control" style="height:5%">@yield('official_addr')</textarea>
                      </div>
                      <div class="form-group col-sm-12">
                        <label>City</label>
                        <input type="text" name="official_city" id="official_city" value="@yield('official_city')" class="form-control" >
                      </div>
                      <div class="form-group col-sm-12">
                        <label>State</label>
                        <input type="text" name="official_state" id="official_state" value="@yield('official_state')" data-parsley-pattern="^[A-Z a-z]*$" class="form-control" data-parsley-trigger="keyup" >
                      </div>
                      <div class="form-group col-sm-12">
                        <label>Country</label>
                        <select  class="form-control" id="official_country" name="official_country">
                        <option value="">Select</option>
                        @foreach ($country as $countrys)
                        <option value="{{$countrys->id}}" @if($__env->yieldContent('official_country')==$countrys->id) {{ 'selected'}} @endif>{{$countrys->countryName}}</option>
                        @endforeach
                        </select>
                      </div>
                      <div class="form-group col-sm-12">
                        <label>Pin</label>
                        <input type="text" name="official_pin" id="official_pin" data-parsley-minlength="4" data-parsley-type="integer" data-parsley-maxlength="6" value="@yield('official_pin')" class="form-control" >
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
                            <input type="text" name="type_amount_inr" id="type_amount_inr" placeholder="INR" value="@yield('type_amount_inr')" class="form-control" >
                            @if ($errors->has('type_amount_inr'))
                            <span class="help-inline">{{$errors->first('type_amount_inr')}}</span>
                            @endif
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                          <label>AMOUNT APPLYING FOR </label>
                          <input type="text" class="form-control" placeholder="AMOUNT APPLYING FOR *" id="amount_inr" name="amount_inr" value="@yield('amount_inr')" >
                          @if ($errors->has('amount_inr'))
                          <span class="help-inline">{{$errors->first('amount_inr')}}</span>
                          @endif
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                          <label>AMOUNT OF HOLDING(IF ANY)</label>
                          <input type="text" name="type_amount_aed" id="type_amount_aed" placeholder="AED" value="@yield('type_amount_aed')" class="form-control" >
                          @if ($errors->has('type_amount_aed'))
                          <span class="help-inline">{{$errors->first('type_amount_aed')}}</span>
                          @endif
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                          <label>AMOUNT APPLYING FOR </label>
                          <input type="text" class="form-control" placeholder="AMOUNT APPLYING FOR *" id="amount_aed" name="amount_aed" value="@yield('amount_aed')">
                          @if ($errors->has('amount_aed'))
                          <span class="help-inline">{{$errors->first('amount_aed')}}</span>
                          @endif
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                          <label>AMOUNT OF HOLDING(IF ANY)</label>
                          <input type="text" name="type_amount_usd"  id="type_amount_usd" placeholder="USD" value="@yield('type_amount_usd')" class="form-control" >
                          @if ($errors->has('type_amount_usd'))
                          <span class="help-inline">{{$errors->first('type_amount_usd')}}</span>
                          @endif
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                          <label>AMOUNT APPLYING FOR </label>
                          <input type="text" class="form-control" placeholder="AMOUNT APPLYING FOR *" id="amount_usd" name="amount_usd"  value="@yield('amount_usd')">
                          @if ($errors->has('amount_usd'))
                          <span class="help-inline">{{$errors->first('amount_usd')}}</span>
                          @endif
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                          <label>AMOUNT OF HOLDING(IF ANY)</label>
                          <input type="text" name="type_amount_sar" id="type_amount_sar" placeholder="SAR" value="@yield('type_amount_sar')" class="form-control" >
                          @if ($errors->has('type_amount_sar'))
                          <span class="help-inline">{{$errors->first('type_amount_sar')}}</span>
                          @endif
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                          <label>AMOUNT APPLYING FOR </label>
                          <input type="text" class="form-control" placeholder="AMOUNT APPLYING FOR *" id="amount_sar" name="amount_sar"  value="@yield('amount_sar')">
                          @if ($errors->has('amount_sar'))
                          <span class="help-inline">{{$errors->first('amount_sar')}}</span>
                          @endif
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                          <label>AMOUNT OF HOLDING(IF ANY)</label>
                          <input type="text" name="type_amount_cad"  id="type_amount_cad" placeholder="CAD" value="@yield('type_amount_cad')" class="form-control" >
                          @if ($errors->has('type_amount_cad'))
                          <span class="help-inline">{{$errors->first('type_amount_cad')}}</span>
                          @endif
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group"> 
                          <label>AMOUNT APPLYING FOR </label>
                          <input type="text" class="form-control" placeholder="AMOUNT APPLYING FOR *" id="amount_cad" name="amount_cad"  value="@yield('amount_cad')">
                          @if ($errors->has('amount_cad'))
                          <span class="help-inline">{{$errors->first('amount_cad')}}</span>
                          @endif
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>{{-- <div class="col-sm-12"></div> --}}
                <div class="blog-post">
                  <div class="col-sm-6">
                    <div class="panel panel-default">
                      <div class="panel-heading font-bold">Proof</div>
                      <div class="panel-body">
                        <div class="form-group col-sm-6">
                          <label>Type of proof<span style="color:red;">*</span></label>
                          <select class="form-control" name="proofId" id="proofId" required data-parsley-required-message="Please Select Type Of Proof" >
                          <option value="">--select--</option>
                          <option value="aadhar"@if($__env->yieldContent('proofId')=='aadhar') {{ 'selected' }}@endif>AADHAR</option>
                          <option value="license"@if($__env->yieldContent('proofId')=='license') {{ 'selected' }}@endif>LICENSE</option>
                          <option value="pancard"@if($__env->yieldContent('proofId')=='pancard') {{ 'selected' }}@endif>PAN CARD</option>
                          <option value="passport"@if($__env->yieldContent('proofId')=='passport') {{ 'selected' }}@endif>PASSPORT</option>
                          <option value="VoterId"@if($__env->yieldContent('proofId')=='VoterId') {{ 'selected' }}@endif>VOTERID CARD</option>
                          </select>
                        </div>
                        <div class="form-group col-sm-6">
                          <label>ID Number</label>
                          <input type="text" name="proof_number" id="proof_number" value="@yield('proof_number')" placeholder="Please Enter ID Number" class="form-control" >
                        </div>
                        <div class="form-group col-sm-6">
                          <label>Upload Proof<span style="color:red;">*</span></label>
                          <input type="file" name="idproof" id="idproof"  class="form-control" accept="image/png,image/jpeg" onchange="proofcheck();idSize(this)" >
                          <div id="msgerrorIdProof" style="color:red;"></div>
                          <div id="idSize" style="color:red;"></div>
                          <img src="{{ URL::asset('storage/img/proof/'.$memberproof->file)}}" style="width:100px;">
                          <input type="hidden" name="proof_update" value="{{$memberproof->file}}">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12"></div>
                  <div class="blog-post">
                    <div class="col-sm-12">
                      <div class="panel panel-default">
                        <div class="panel-body">
                          <button name="submit" type="submit" class="btn btn-primary col-md-offset-5" id="submit" >Submit</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
@endsection
@section('jquery')
<script type="text/javascript" src="{{ URL::asset('js/parsley.min.js') }}"></script>
<script src="{{ URL::asset('js/bootstrap-datepicker.js') }}"></script>
<link rel="stylesheet" href="{{ URL::asset('css/bootstrap-datepicker.min.css') }}" type="text/css" />
<script type="text/javascript">
function address() //for address check box
{
var value = document.getElementById("Address").checked==true;
if(value==true)
{
$('#corr_address').val($('#per_address').val());
$('#corr_city').val($('#per_city').val());
$('#corr_state').val($('#per_state').val());
$('#corr_pin').val($('#per_pin').val());
$('#corr_country').val($('#per_country').val());
}
else
{
$('#corr_address').val("");
$('#corr_city').val("");
$('#corr_state').val("");
$('#corr_pin').val("");
$('#corr_country').val("");
}
}
</script>

<script> //date picker
function getAge() {
var dateString = document.getElementById("dateofbirth").value;
if(dateString !="")
{
var today = new Date();
var birthDate = new Date(dateString);
var age = today.getFullYear() - birthDate.getFullYear();
var m = today.getMonth() - birthDate.getMonth();
var da = today.getDate() - birthDate.getDate();
$("#dateerror").html("");
if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
age--;
}
if(m<0){
m +=12;
}
if(da<0){
da +=30;
}
if(age < 18 )
{
$("#dateerror").html("You must be 18 Years Old");
return false;
} 
}
}
</script>

<script>
$(function()
{
$('#dateofbirth').datepicker({
orientation:'bottom auto',
autoclose:true
});

});
</script>

<script type="text/javascript">  //for photo validation
function validateFileType(){
//$maxsize=2097152;
var fileName = document.getElementById("photo").value;
var idxDot = fileName.lastIndexOf(".") + 1;
var extFile = fileName.substr(idxDot, fileName.length).toLowerCase();
$("#msgerror").html("");
if (extFile=="jpg" || extFile=="jpeg" || extFile=="png")
{
//alert('ok'); 
}
else
{
$("#msgerror").html("Only jpg/jpeg and png files are allowed!");
return false;
//alert('notok'); 
} 
}
</script>

<script type="text/javascript">//for signature validation
function validateSig(){
var fileName = document.getElementById("signature").value;
var idxDot = fileName.lastIndexOf(".") + 1;
var extFile = fileName.substr(idxDot, fileName.length).toLowerCase();
$("#msgerrorsignature").html("");
if (extFile=="jpg" || extFile=="jpeg" || extFile=="png"){
}else
{
$("#msgerrorsignature").html("Only jpg/jpeg and png files are allowed!");
return false;
} 
}
</script>

<script type="text/javascript">//for proof validation
function proofcheck(){
var fileName = document.getElementById("idproof").value;
var idxDot = fileName.lastIndexOf(".") + 1;
var extFile = fileName.substr(idxDot, fileName.length).toLowerCase();
$("#msgerrorIdProof").html("");
if (extFile=="jpg" || extFile=="jpeg" || extFile=="png"){
}
else
{
$("#msgerrorIdProof").html("Only jpg/jpeg and png files are allowed!");
return false;
}   
}
</script>

<script type="text/javascript">

function photoSize(fieldObj)
{
var FileName  = fieldObj.value;
var FileExt = FileName.substr(FileName.lastIndexOf('.')+1);
var FileSize = fieldObj.files[0].size;
$("#photoSize").html("");
if(FileSize>102400)
{
$("#photoSize").html("Upload File size allowed is 100 Kb.");
document.getElementById('photo').value="";
}
}

function sigSize(fieldObj)
{
var FileName  = fieldObj.value;
var FileExt = FileName.substr(FileName.lastIndexOf('.')+1);
var FileSize = fieldObj.files[0].size;
$("#sigSize").html("");
if(FileSize>102400)
{
$("#sigSize").html("Upload File size allowed is 100 Kb.");
document.getElementById('signature').value="";
}
}
function idSize(fieldObj)
{
var FileName  = fieldObj.value;
var FileExt = FileName.substr(FileName.lastIndexOf('.')+1);
var FileSize = fieldObj.files[0].size;
$("#idSize").html("");
if(FileSize>102400)
{
$("#idSize").html("Upload File size allowed is 100 Kb.");
document.getElementById('idproof').value="";
}
}

</script>

<script type="text/javascript">

function countryId(countryName)
{

$.ajax(
{
type: "get",
url: "{{URL::to('/') }}/admin/countryId",
data:{countryName:countryName},
success: function (data) 
{
$(".conId").html("+"+data);
$("#conId1").val("+"+data);

}
});
}
</script>


@endsection