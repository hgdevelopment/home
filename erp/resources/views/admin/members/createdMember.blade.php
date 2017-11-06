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
  textarea.form-control { 
    height:10px;
  }
</style>
@section('body')
<div class="bg-light lter b-b wrapper-md">
  <h1 class="m-n font-thin h3">Membership Request Form</h1>
</div>
<form role="form"  method="POST" action="{{URL::to('/') }}/admin/member"  data-parsley-validate  enctype="multipart/form-data">
  {{csrf_field()}}
  @if (session()->has('message'))
    <div class="alert alert-info fade in alert-dismissable">
      <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
      <strong>Info!</strong> {{session()->get('message')}}
    </div>
  @endif
  <div class="wrapper-md">
    <div class="panel panel-default">
      <div class="panel-heading font-bold">Personal Details</div>
      <div class="panel-body">
        <div class="row">
          <div class="col-sm-4">
            <div class="form-group">
              <label>Full Name<span style="color:red;">*</span> (as per Bank Record)</label>
              <input type="text" class="form-control" placeholder="Full Name" id="fullname" name="fullname" value="{{ old('fullname') }}"  required data-parsley-required-message="Please Enter Full Name">
              @if ($errors->has('fullname'))
                <span class="help-inline">{{$errors->first('fullname')}}</span>
              @endif
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label>Father's Name/Husband's Name<span style="color:red;">*</span></label>
              <input type="text" class="form-control" placeholder="Father's Name/Husband's Name" id="guardian" name="guardian" value="{{ old('guardian')}}" required data-parsley-required-message="Please Enter Guardians Name">
              @if ($errors->has('guardian'))
                <span class="help-inline">{{$errors->first('guardian')}}</span>
              @endif
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label>Date of Birth<span style="color:red;">*</span></label>
              <input type='text' name="dateofbirth" id="dateofbirth" readonly required placeholder="MM/DD/YYYY" data-language="en" class="form-control" onchange="getAge()" value=""/>
              <div id="dateerror" style="color:red;"></div>
              @if ($errors->has('dateofbirth'))
                <span class="help-inline">{{$errors->first('dateofbirth')}}</span>
              @endif
            </div>
          </div>
          <div class="col-sm-4">
            <label>Gender<span style="color:red;">*</span></label>
            <select class="form-control" id="gender" name="gender" required data-parsley-required-message="Please Enter Gender">
              <option value="">Select</option>
              <option value="Male" {{ (old('gender')=='Male')?'selected':'' }}>Male</option>
              <option value="Female" {{ (old('gender')=='Female')?'selected':'' }}>Female</option>
            </select>
              @if ($errors->has('gender'))
                <span class="help-inline">{{$errors->first('gender')}}</span>
              @endif
          </div>
          <div class="col-sm-4">
            <label>Religion</label>
            <input type="text" name="religion" id="religion" readonly class="form-control" value="Islam">
            @if ($errors->has('religion'))
              <span class="help-inline">{{$errors->first('religion')}}</span>
            @endif
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label>Caste</label>
              <select  class="form-control" id="caste" name="caste">
                <option value="">Select</option>
                @foreach ($listTypes['caste'] as $caste)
                <option value="{{$caste}}" {{ (old('caste')==$caste)?'selected':'' }}>{{$caste}}</option>
                @endforeach
              </select>
              @if ($errors->has('caste'))
                <span class="help-inline">{{$errors->first('caste')}}</span>
              @endif
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label>Nationality<span style="color:red;">*</span></label>
              <input type="hidden" name="zip_code" id="zip_code" value="AUTO">
              <select  class="form-control" name="country" id="country" required data-parsley-required-message="Please Select Country" onchange="countryId(this.value)">
                <option value="">Select</option>
                @foreach ($listTypes['country'] as $country)
                <option value="{{$country->id}}" zip-code="{{$country->countryCode}}" phone-code="{{$country->countryId}}" {{ (old('country')==$country)?'selected':'' }}>{{$country->countryName}}</option>
                @endforeach
              </select>
              @if ($errors->has('country'))
                <span class="help-inline">{{$errors->first('country')}}</span>
              @endif
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label>Education</label>
              <select class="form-control" id="education" name="education">
                <option value="">Select</option>
                @foreach ($listTypes['education'] as $education)
                <option value="{{$education}}" {{ (old('education')==$education)?'selected':'' }}>{{$education}}</option>
                @endforeach
              </select>
              @if ($errors->has('education'))
                <span class="help-inline">{{$errors->first('education')}}</span>
              @endif
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label>Occupation</label>
              <select  class="form-control" id="occupation" name="occupation">
                <option value="">Select</option>
                @foreach ($listTypes['occupation'] as $occupation)
                <option value="{{$occupation}}" {{ (old('occupation')==$occupation)?'selected':'' }}>{{$occupation}}</option>
                @endforeach
              </select>
              @if ($errors->has('occupation'))
                <span class="help-inline">{{$errors->first('occupation')}}</span>
              @endif
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label>Income<span style="color:red;">*</span></label>  
              <div class="input-group m-b"> 
                <div class="input-group-btn dropdown">
                  <select class="btn btn-default" id="incomeid" name="incomeid" required>
                    <option value="">--Select--</option>
                    <option value="INR" {{ (old('incomeid')=='INR')?'selected':'' }}>INR</option>
                    <option value="AED" {{ (old('incomeid')=='AED')?'selected':'' }}>AED</option>
                    <option value="USD" {{ (old('incomeid')=='USD')?'selected':'' }}>USD</option>
                    <option value="SAR" {{ (old('incomeid')=='SAR')?'selected':'' }}>SAR</option>
                    <option value="CAD" {{ (old('incomeid')=='CAD')?'selected':'' }}>CAD</option>
                  </select>
                </div>
                <input type="text" placeholder="Income" id="income" name="income" value="{{ old('income') }}" class="form-control" required  data-parsley-trigger="keyup" data-parsley-type="number" data-parsley-min="1">
                @if ($errors->has('income'))
                  <span class="help-inline">{{$errors->first('income')}}</span>
                @endif
              </div>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label>Marital status<span style="color:red;">*</span></label>
              <select  class="form-control" id="marital" name="marital" required data-parsley-required-message="Please Select Marital status" >
                <option value="">Select</option>
                <option value="Single" {{ (old('marital')=='Single')?'selected':'' }}>Single</option>
                <option value="Married" {{ (old('marital')=='Married')?'selected':'' }}>Married</option>
                <option value="Divorced" {{ (old('marital')=='Divorced')?'selected':'' }}>Divorced</option>
                <option value="Widowed" {{ (old('marital')=='Widowed')?'selected':'' }}>Widowed</option>
              </select>
              @if ($errors->has('marital'))
                <span class="help-inline">{{$errors->first('marital')}}</span>
              @endif
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label>No of Children</label>
              <input type="text" class="form-control" data-parsley-type="number" data-parsley-trigger="keyup" placeholder="No of Children" id="childrens" name="childrens" value="{{ old('childrens') }}">
              @if ($errors->has('childrens'))
                <span class="help-inline">{{$errors->first('childrens')}}</span>
              @endif
            </div>
          </div>
          <div class="col-sm-12"></div>
          <div class="col-sm-4">
            <div class="form-group">
              <label id="mobile_prefix">Mobile No <span style="color:red;">*</span></label>
              <div class="input-group m-b">
                <span class="input-group-addon conId"> </span>
                <input type="hidden" id="conId1" name="conId1" class="conId1" vlaue="">
                <input type="text" class="form-control" placeholder="Mobile No" id="mobileno" name="mobileno" value="{{old('mobileno')}}" required data-parsley-maxlength="16" data-parsley-maxlength-message="Please enter valid phone no" data-parsley-type="integer" data-parsley-trigger="keyup" data-parsley-min="1" >
                @if ($errors->has('mobileno'))
                  <span class="help-inline">{{($errors->first('mobileno')=='validation.phone')?'Not a valid Mobile Number':$errors->first('mobileno')}}</span>
                @endif
              </div>
            </div>  
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label id="land_prefix">Landline No</label>
              <input type="text" class="form-control" placeholder="Landline No" data-parsley-type="integer" data-parsley-maxlength="16" data-parsley-trigger="keyup" id="landlineno" name="landlineno" value="{{old('landlineno')}}">
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label>Email<span style="color:red;">*</span></label>
              <input type="email" data-parsley-trigger="change" required class="form-control" placeholder="Email" id="email" name="email" value="{{old('email')}}" data-parsley-required-message="Please enter email" data-parsley-type="email" data-parsley-type-message="Please enter valid email">
              @if ($errors->has('email'))
                <span class="help-inline">{{$errors->first('email')}}</span>
              @endif
            </div>
          </div>
          <div class="col-sm-12"></div>
          <div class="col-sm-4">
            <div class="form-group">
              <label>How Do You Know About Heera Group?<span style="color:red;">*</span></label>
              <textarea type="text" class="form-control" placeholder="How Do You Know About Heera Group" required name="aboutheera" id="aboutheera"></textarea>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label>Upload Photo (<span style="color:red;">*</span>.jpg,.jpeg,.png)</label>
              <input type="hidden" name="MAX_FILE_SIZE" value="1048576" />
              <input type="file" class="btn btn-success btn-fil" id="profilepic" name="profilepic" accept="image/png,image/jpeg" onchange="validateFileType();photoSize(this)" required>
              <div id="msgerror" style="color:red;"></div>
              <div id="photoSize" style="color:red;"></div>
              @if ($errors->has('profilepic'))
                <span class="help-inline">{{$errors->first('profilepic')}}</span>
              @endif
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group" style="float:left;">
              <label>Upload Signature (<span style="color:red;">*</span>.jpg,.jpeg,.png)</label>
              <input type="file" class="btn btn-success btn-file" id="signature" name="signature" accept="image/png,image/jpeg" onchange="validateSig();sigSize(this)" required>
              <div id="msgerrorsignature" style="color:red;"></div>
              <div id="sigSize" style="color:red;"></div>
              @if ($errors->has('signature'))
              <span class="help-inline">{{$errors->first('signature')}}</span>
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-4">
    <div class="panel panel-default">
      <div class="panel-heading font-bold">Permanent Address</div>
      <div class="panel-body">
        <div class="form-group">
          <label>Address<span style="color:red;">*</span></label>
          <textarea type="text" class="form-control" required  data-parsley-required-message="Please enter address" data-parsley-trigger="keyup" placeholder="Address" id="permanent_addr" name="permanent_addr">{{ old('permanent_addr') }}</textarea>
          @if ($errors->has('permanent_addr'))
            <span class="help-inline">{{$errors->first('permanent_addr')}}</span>
          @endif
        </div>
        <div class="form-group">
          <label>City<span style="color:red;">*</span></label>
          <input type="text" class="form-control" placeholder="City" id="permanent_city" required data-parsley-required-message="Please enter city"  name="permanent_city" value="{{ old('permanent_city') }}">
          @if ($errors->has('permanent_city'))
            <span class="help-inline">{{$errors->first('permanent_city')}}</span>
          @endif
        </div>
        <div class="form-group">
          <label>State<span style="color:red;">*</span></label>
          <input type="text" class="form-control" placeholder="State" id="permanent_state" required data-parsley-trigger="keyup" data-parsley-required-message="Please enter state" data-parsley-pattern="^[A-Z a-z]*$" name="permanent_state" value="{{ old('permanent_state') }}">
          @if ($errors->has('permanent_state'))
            <span class="help-inline">{{$errors->first('permanent_state')}}</span>
          @endif
        </div>
        <div class="form-group">
          <label>Country<span style="color:red;">*</span></label>
          <select  class="form-control" name="permanent_country" id="permanent_country" required data-parsley-required-message="Please Select Country">
            <option value="">Select</option>
            @foreach ($listTypes['country'] as $country)
            <option value="{{$country->id}}" zip-code="{{$country->countryCode}}" phone-code="{{$country->countryId}}" {{ (old('permanent_country')==$country)?'selected':'' }}>{{$country->countryName}}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label>Pin<span style="color:red;">*</span></label>
          <input type="text" class="form-control" placeholder="Pin" data-parsley-trigger="keyup" required data-parsley-maxlength="6" data-parsley-minlength="1" data-parsley-type="integer" data-parsley-minlength-message="Please enter valid pin" id="permanent_pin" name="permanent_pin" value="{{ old('permanent_pin') }}">
          @if ($errors->has('permanent_pin'))
           <span class="help-inline">{{$errors->first('permanent_pin')}}</span>
          @endif
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-4">
    <div class="panel panel-default">
      <div class="panel-heading font-bold">Correspondence Address  
      </div>
      <div class="panel-body">
        <div class="form-group">
          <label>Address<span style="color:red;">*</span><span  class="perm_adrs">SAME AS PERMANENT ADDRESS  
        <label class="checkbox-inline i-checks">
        <input type="checkbox" name="Address" id="Address" onclick="address()"><i style="margin-top: -10px;"></i></label></span></label>
          <textarea type="text" class="form-control" required placeholder="Address" id="correspondance_addr" name="correspondance_addr">{{ old('correspondance_addr') }}</textarea>
          @if ($errors->has('correspondance_addr'))
          <span class="help-inline">{{$errors->first('correspondance_addr')}}</span>
          @endif
        </div>
        <div class="form-group">
          <label>City<span style="color:red;">*</span></label>
          <input type="text" class="form-control" placeholder="City" required id="correspondance_city" name="correspondance_city" value="{{ old('correspondance_city') }}">
          @if ($errors->has('correspondance_city'))
          <span class="help-inline">{{$errors->first('correspondance_city')}}</span>
          @endif
        </div>
        <div class="form-group">
          <label>State<span style="color:red;">*</span></label>
          <input type="text" class="form-control" placeholder="State" required data-parsley-pattern="^[A-Z a-z]*$" data-parsley-trigger="keyup" id="correspondance_state" name="correspondance_state" value="{{ old('correspondance_state') }}">
          @if ($errors->has('correspondance_state'))
            <span class="help-inline">{{$errors->first('correspondance_state')}}</span>
          @endif
        </div>
        <div class="form-group">
          <label>Country<span style="color:red;">*</span></label>
          <select  class="form-control" name="correspondance_country" id="correspondance_country" required data-parsley-required-message="Please Select Country">
            <option value="">Select</option>
            @foreach ($listTypes['country'] as $country)
            <option value="{{$country->id}}" zip-code="{{$country->countryCode}}" phone-code="{{$country->countryId}}" {{ (old('correspondance_country')==$country)?'selected':'' }}>{{$country->countryName}}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label>Pin<span style="color:red;">*</span></label>
          <input type="text" id="correspondance_pin" name="correspondance_pin" class="form-control" required data-parsley-maxlength="6" data-parsley-minlength="1" data-parsley-minlength-message="Please enter valid pin" data-parsley-trigger="keyup" placeholder="Pin" data-parsley-type="integer"  value="{{ old('correspondance_pin') }}">
          @if ($errors->has('correspondance_pin'))
            <span class="help-inline">{{$errors->first('correspondance_pin')}}</span>
          @endif
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
          <textarea  class="form-control" placeholder="Address" id="official_addr" name="official_addr">{{ old('official_addr') }}</textarea>
        </div>
        <div class="form-group">
          <label>City</label>
          <input type="text" class="form-control" placeholder="City" id="official_city" name="official_city" value="{{ old('official_city') }}">
        </div>
        <div class="form-group">
          <label>State</label>
          <input type="text" class="form-control" placeholder="State" id="official_state" data-parsley-pattern="^[A-Z a-z]*$" data-parsley-trigger="keyup" name="official_state" value="{{ old('official_state') }}">
        </div>
        <div class="form-group">
          <label>Country</label>
          <select  class="form-control" name="official_country" id="official_country">
          <option value="">Select</option>
          @foreach ($listTypes['country'] as $country)
          <option value="{{$country->id}}" zip-code="{{$country->countryCode}}" phone-code="{{$country->countryId}}" {{ (old('official_country')==$country)?'selected':'' }}>{{$country->countryName}}</option>
          @endforeach
          </select>
        </div>
        <div class="form-group">
          <label>Pin</label>
          <input type="text" class="form-control" data-parsley-maxlength="6" data-parsley-minlength="1" data-parsley-minlength-message="Please enter valid pin" data-parsley-trigger="keyup" placeholder="Pin" id="official_pin" name="official_pin" data-parsley-type="integer" value="{{ old('official_pin') }}">
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-12"></div>
    <div class="col-sm-6">
        <div class="panel panel-default">
          <div class="panel-heading font-bold">MEMBERSHIP DETAILS</div>
          <div class="panel-body">
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                <label>AMOUNT OF HOLDING(IF ANY)</label>
                <input type="text" class="form-control" name="type_amount_inr" id="type_amount_inr" placeholder="INR">
                @if ($errors->has('type_amount_inr'))
                <span class="help-inline">{{$errors->first('type_amount_inr')}}</span>
                @endif
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                <label>AMOUNT APPLYING FOR </label>
                <input type="text" class="form-control" placeholder="AMOUNT APPLYING FOR *" id="amount_inr" name="amount_inr" value="{{ old('amount_inr') }}" >
                @if ($errors->has('amount_inr'))
                <span class="help-inline">{{$errors->first('amount_inr')}}</span>
                @endif
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                <label>AMOUNT OF HOLDING(IF ANY)</label>
                <input type="text" name="type_amount_aed" class="form-control" id="type_amount_aed" placeholder="AED">
                @if ($errors->has('type_amount_aed'))
                <span class="help-inline">{{$errors->first('type_amount_aed')}}</span>
                @endif
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                <label>AMOUNT APPLYING FOR </label>
                <input type="text" class="form-control" placeholder="AMOUNT APPLYING FOR *" id="amount_aed" name="amount_aed" value="{{ old('amount_aed') }}">
                @if ($errors->has('amount_aed'))
                <span class="help-inline">{{$errors->first('amount_aed')}}</span>
                @endif
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                <label>AMOUNT OF HOLDING(IF ANY)</label>
                <input type="text" name="type_amount_usd" class="form-control"  id="type_amount_usd" placeholder="USD">
                @if ($errors->has('type_amount_usd'))
                <span class="help-inline">{{$errors->first('type_amount_usd')}}</span>
                @endif
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                <label>AMOUNT APPLYING FOR </label>
                <input type="text" class="form-control" placeholder="AMOUNT APPLYING FOR *" id="amount_usd" name="amount_usd"  value="{{ old('amount_usd') }}">
                @if ($errors->has('amount_usd'))
                <span class="help-inline">{{$errors->first('amount_usd')}}</span>
                @endif
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                <label>AMOUNT OF HOLDING(IF ANY)</label>
                <input type="text" name="type_amount_sar" class="form-control" id="type_amount_sar" placeholder="SAR">
                @if ($errors->has('type_amount_sar'))
                <span class="help-inline">{{$errors->first('type_amount_sar')}}</span>
                @endif
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                <label>AMOUNT APPLYING FOR </label>
                 <input type="text" class="form-control" placeholder="AMOUNT APPLYING FOR *" id="amount_sar" name="amount_sar"  value="{{ old('amount_sar') }}">
                @if ($errors->has('amount_sar'))
                <span class="help-inline">{{$errors->first('amount_sar')}}</span>
                @endif
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                <label>AMOUNT OF HOLDING(IF ANY)</label>
                <input type="text" name="type_amount_cad" class="form-control" id="type_amount_cad" placeholder="CAD">
                @if ($errors->has('type_amount_cad'))
                <span class="help-inline">{{$errors->first('type_amount_cad')}}</span>
                @endif
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group"> 
                <label>AMOUNT APPLYING FOR</label>
                <input type="text" class="form-control" placeholder="AMOUNT APPLYING FOR *" id="amount_cad" name="amount_cad"  value="{{ old('amount_cad') }}">
                @if ($errors->has('amount_cad'))
                <span class="help-inline">{{$errors->first('amount_cad')}}</span>
                @endif
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="panel panel-default">
          <div class="panel-heading font-bold">Proof</div>
          <div class="panel-body">
            <div class="col-sm-6">
              <div class="form-group">
                <label>Type of proof<span style="color:red;">*</span></label>
                <select  class="form-control" id="type_of_proof" name="type_of_proof" required data-parsley-required-message="Please Select Proof">
                  <option value="">Select</option>
                  @foreach ($listTypes['proof_type'] as $proof_type)
                  <option value="{{$proof_type}}" {{ (old('type_of_proof')==$proof_type)?'selected':'' }}>{{ucfirst($proof_type)}}</option>
                  @endforeach
                </select>
                @if ($errors->has('type_of_proof'))
                  <span class="help-inline">{{$errors->first('type_of_proof')}}</span>
                @endif
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label>ID Number</label>
                <input type="text" class="form-control" placeholder="ID Number" id="proof_number" name="proof_number" value="{{ old('proof_number') }}">
                @if ($errors->has('proof_number'))
                  <span class="help-inline">{{$errors->first('proof_number')}}</span>
                @endif
              </div>
            </div>
            <div class="col-sm-12"></div>
            <div class="col-sm-6">
              <div class="form-group">
                <label>Proof file (<span style="color:red;">*</span>.jpg,.jpeg,.png)</label>
                <input type="file" class="btn btn-success btn-fil" placeholder="Proof File" id="proof_file" name="proof_file" onchange="proofcheck();idSize(this)" required>
                <div id="msgerrorIdProof" style="color:red;"></div>
                <div id="idSize" style="color:red;"></div>
                @if ($errors->has('proof_file'))
                  <span class="help-inline">{{$errors->first('proof_file')}}</span>
                @endif
              </div>
            </div>
            <div class="col-sm-6">
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="panel panel-default">
          <div class="panel-heading font-bold">ADDED BY</div>
          <div class="panel-body">
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group" >
                  <label>Assign Member Under<span style="color:red;">*</span></label>
                  <select  class="form-control" id="assign_member" name="assign_member" required="please select Assigned Member">
                    <option value="">Select</option>
                    <option value="Myself" {{ (old('assign_member')=='Myself')?'selected':'' }}>Myself</option>
                    <option value="DSA" {{ (old('assign_member')=='DSA')?'selected':'' }}>DSA</option>
                    {{-- <option value="ME" {{ (old('assign_member')=='ME')?'selected':'' }}>ME</option> --}}
                  </select>
                  @if ($errors->has('assign_member'))
                  <span class="help-inline">{{$errors->first('assign_member')}}</span>
                  @endif
                </div>
              </div>
              <div class="col-sm-6" id="dsa">
                <div class="form-group">
                  <label>&nbsp;</label>
                  <select  class="form-control" id="dsaname" name="dsaname" data-parsley-required-message="Please select DSA" required>
                    <option value="">Select</option>
                    @foreach($dsa as $dsas)
                    <option value="{{$dsas->code}}">{{$dsas->name}}</option>
                    @endforeach
                  </select>
                  <div id="dsanameerror" style="color: red;"></div> 
                  @if ($errors->has('dsaname'))
                  <span class="help-inline">{{$errors->first('dsaname')}}</span>
                  @endif
                </div>
              </div>
         {{--  <div class="col-sm-6" id="me">
            <div class="form-group">
              <label>&nbsp;</label>
              <select  class="form-control" id="mename" name="mename">
              <option value="">Select</option>
              </select>
            </div>
          </div> --}}
        </div> 
      </div>
    </div>
    </div>
    <div class="col-sm-12"></div>
    <div class="row">
      <div class="col-sm-12">
        <div class="panel panel-default">
          <div class="panel-heading font-bold">DECLARATION</div>
          <div class="panel-body">
            <div class="form-horizontal">
              <div class="form-group">
                <div class="col-lg-12">
                  <p class="form-control-static">I HAVE READ THE TERMS AND CONDITIONS OF HG AND THE SAME HAVE BEEN WELL EXPLAINED TO ME BY THE HG AUTHORITIES. I AM ALSO AWARE THAT THE TERMS AND CONDITIONS OF HG ARE PRINTED OVERLEAF .I HERE BY AGREE TO ABIDE BY THEM I DECLARE THAT ALL ABOVE DETAILS PROVIDED BY ME ARE CORRECT TO THE BEST OF MY KNOWLDGE</p>
                </div>
              </div>
             {{-- {!! Recaptcha::render() !!} --}}
              <div class="col-md-5">       
               <div class="row" style="padding: 10px;">
                <div class="col-sm-6 col-xs-12">
              <input type="text" class="form-control img-bg " value="{{$captcha}}" name="captcha" id="captcha" disabled="disabled"></div>
              <div class="col-sm-6 col-xs-12">

              <input type="text"  name="captcha_confirm" class="form-control" id="captcha_confirm" data-parsley-equalto="#captcha" data-parsley-required-message="Enter the captcha" required placeholder="Enter the text as given"></div>
            </div>
          </div>
             <div id="cap" style="color: red;"></div>
              <div class="line line-dashed b-b line-lg pull-in"></div>
              <div class="form-group">
                <label class="control-label" style="text-align: left;"></label>
                <div class="col-lg-10">
                  <div class="checkbox" style="padding-right: 10px;float: left;padding-top: 14px;margin: 0;">
                    <label class="i-checks">
                      <input type="checkbox" checked="" id="iagree" name="iagree" required data-parsley-required-message="Please agree terms and conditions"><i></i> 
                    </label>
                  </div>
                  <p class="form-control-static" style="float: left;">
                    <a>Terms &amp; Conditions</a><br>I AGREE TO FULFILL ALL THE REQUISITES MENTIONED IN THE TERMS AND CONDITIONS OF HG<br/>
                    @if ($errors->has('iagree'))
                    <span class="help-inline">{{$errors->first('iagree')}}</span>
                    @endif
                  </p>
                </div>
              </div>
              <div class="line line-dashed b-b line-lg pull-in"></div>
               <div class="col-sm-5 "><br></div>
              <div class="col-sm-5">
                <button type="submit" class="btn btn-primary" name="submit">Submit</button> 
                <button type="reset" class="btn btn-default">Cancel</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</form>
@endsection
@section('jquery')
{{-- <script type="text/javascript" src="{{ URL::asset('js/parsley.min.js') }}"></script> --}}
{{-- <script src="{{ URL::asset('js/bootstrap-datepicker.js') }}"></script>
<link rel="stylesheet" href="{{ URL::asset('css/bootstrap-datepicker.min.css') }}" type="text/css" />
<script src="{{ URL::asset('js/i18n/datepicker.en.js') }}"></script> --}}
<script type="text/javascript">
//recaptcha validation
$("form").submit(function(event) {

   var recaptcha = $("#g-recaptcha-response").val();
   $('#cap').html("");
   if (recaptcha === "") {
      event.preventDefault();
      $('#cap').html("Please check the recaptcha");
   }
});




//hide and show applied by
 $(document).ready(function()
  {
  $("#me").hide();
  $("#dsa").hide();
  if(this.value == 'Myself')
  {
   $("#dsaname").attr('required',false);
   // $("#mename").attr('required',false);
   $("#dsa").hide();
   $("#me").hide();  
  }
  else
  {
   $("#dsaname").attr('required',true);
   // $("#mename").attr('required',true);
  }

    $('#assign_member').on('change', function() 
  {
  if ( this.value == 'DSA')
  {
  $("#dsa").show();
  $("#me").hide();
  var dsaname = document.getElementById("dsaname").value;
  $('#dsanameerror').html("");
  if(dsaname==""){
  $('#dsanameerror').html('Select this field');
  return false;
  }
  else{
  $("#dsanameerror").hide();
  }
  }

  if(this.value == 'Myself')
  {

   $("#dsaname").attr('required',false);
   // $("#mename").attr('required',false);
   $("#dsa").hide();
   $("#me").hide();  
  }
  else
  {
   $("#dsaname").attr('required',true);
   // $("#mename").attr('required',true);
  } 
                                                                                                   
  });

  $('#dsaname').on('click', function() 
  {
  var dsaname = document.getElementById("dsaname").value;
  if(dsaname!='')
  $("#dsanameerror").html('');
  else
  $('#dsanameerror').html('Select this field');
  }
  );
  });
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

<script type="text/javascript"> // for addresscheckbox
  function address()
  {
  var value = document.getElementById("Address").checked==true;
  if(value==true)
  {
  $('#correspondance_addr').val($('#permanent_addr').val());
  $('#correspondance_city').val($('#permanent_city').val());
  $('#correspondance_state').val($('#permanent_state').val());
  $('#correspondance_pin').val($('#permanent_pin').val());
  $('#correspondance_country').val($('#permanent_country').val());
  }
  else
  {
  $('#correspondance_addr').val("");
  $('#correspondance_city').val("");
  $('#correspondance_state').val("");
  $('#correspondance_pin').val("");
  $('#correspondance_country').val("");
  }
  }
</script>

<script type="text/javascript">  //for photo validation
  function validateFileType(){
  //$maxsize=2097152;
  var fileName = document.getElementById("profilepic").value;
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
  }else{
  $("#msgerrorsignature").html("Only jpg/jpeg and png files are allowed!");
  return false;
  } 
  }
</script>

<script type="text/javascript">//for proof validation
  function proofcheck(){
  var fileName = document.getElementById("proof_file").value;
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

<script> // for date
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
  document.getElementById('profilepic').value="";
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
  document.getElementById('proof_file').value="";
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
  $(".conId1").val("+"+data);
  }
  });
  }
</script>



@endsection


