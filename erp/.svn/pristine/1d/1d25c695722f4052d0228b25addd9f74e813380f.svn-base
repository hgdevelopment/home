<div id="profile_details" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
    <form action="profile_submit" method="post" >
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Personal Details</h4>
      </div>
      <div class="modal-body">
        <div class="row">
                              <div class="col-sm-6">
                                 <div class="form-group">
                                    <label>Full Name</label>
                                    <input type="text" class="form-control" placeholder="Full Name" id="fullname" name="fullname" value="{{ old('fullname') }}">
                                    @if ($errors->has('fullname'))
                                      <span class="help-inline">{{$errors->first('fullname')}}</span>
                                    @endif
                                    
                                 </div>
                                 <div class="form-group">
                                    <label>Father's Name/Husband's Name</label>
                                    <input type="text" class="form-control" placeholder="Father's Name/Husband's Name" id="guardian" name="guardian" value="{{ old('guardian') }}">
                                    @if ($errors->has('guardian'))
                                      <span class="help-inline">{{$errors->first('guardian')}}</span>
                                    @endif
                                 </div>
                                 <div class="form-group">
                                    <label>Date of Birth</label>
                                    <input type="text" class="form-control" placeholder="Date of Birth" id="dateofbirth" name="dateofbirth" value="{{ old('dateofbirth') }}">
                                    @if ($errors->has('dateofbirth'))
                                      <span class="help-inline">{{$errors->first('dateofbirth')}}</span>
                                    @endif
                                 </div>
                                 <div class="form-group">
                                    <label>Marital status</label>
                                    <select  class="form-control" id="marital" name="marital">
                                    <option value="">Select</option>
                                    <option value="Single" {{ (old('marital')=='Single')?'selected':'' }}>Single</option>
                                    <option value="Married" {{ (old('marital')=='Married')?'selected':'' }}>Married</option>
                                    </select>
                                    @if ($errors->has('marital'))
                                      <span class="help-inline">{{$errors->first('marital')}}</span>
                                    @endif
                                 </div>
                                 <div class="form-group">
                                    <label>Gender</label>
                                    <select  class="form-control" id="gender" name="gender">
                                    <option value="">Select</option>
                                    <option value="Male" {{ (old('gender')=='Male')?'selected':'' }}>Male</option>
                                    <option value="Female" {{ (old('gender')=='Female')?'selected':'' }}>Female</option>
                                    </select>
                                    @if ($errors->has('gender'))
                                      <span class="help-inline">{{$errors->first('gender')}}</span>
                                    @endif
                                 </div>
                                 <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" class="form-control" placeholder="Email" id="email" name="email" value="{{old('email')}}">
                                    @if ($errors->has('email'))
                                      <span class="help-inline">{{$errors->first('email')}}</span>
                                    @endif
                                 </div>
                                 <div class="form-group">
                                    <label>Upload Photo (*.jpg,.jpeg,.png)</label>
                                    <input type="file" class="form-control" id="profilepic" name="profilepic" >
                                    @if ($errors->has('profilepic'))
                                      <span class="help-inline">{{$errors->first('profilepic')}}</span>
                                    @endif
                                 </div>
                                 <div class="form-group">
                                    <label>Upload Signature (*.jpg,.jpeg,.png)</label>
                                    <input type="file" class="form-control" id="signature" name="signature">
                                    @if ($errors->has('signature'))
                                      <span class="help-inline">{{$errors->first('signature')}}</span>
                                    @endif
                                 </div>
                              </div>
                              <div class="col-sm-6">
                                 <div class="form-group">
                                    <label>Religion</label>
                                    <select  class="form-control" readonly id="religion" name="religion">
                                    <option value="Islam">Islam</option>
                                    </select>
                                     @if ($errors->has('religion'))
                                      <span class="help-inline">{{$errors->first('religion')}}</span>
                                    @endif
                                 </div>
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
                                 <div class="form-group">
                                    <label>Education</label>
                                    <select  class="form-control" id="education" name="education">
                                    <option value="">Select</option>
                                    @foreach ($listTypes['education'] as $education)
                                    <option value="{{$education}}" {{ (old('education')==$education)?'selected':'' }}>{{$education}}</option>
                                    @endforeach
                                    </select>
                                     @if ($errors->has('education'))
                                      <span class="help-inline">{{$errors->first('education')}}</span>
                                    @endif
                                 </div>
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
                                 <div class="form-group">
                                    <label>Income</label>
                                    <input type="text" class="form-control" placeholder="Income" id="income" name="income" value="{{ old('income') }}">
                                    @if ($errors->has('income'))
                                      <span class="help-inline">{{$errors->first('income')}}</span>
                                    @endif
                                 </div>
                              </div>
                              <div class="col-sm-6">
                                 <div class="form-group">
                                    <label>No of Children</label>
                                    <input type="text" class="form-control" placeholder="No of Children" id="childrens" name="childrens" value="{{ old('childrens') }}">
                                    @if ($errors->has('childrens'))
                                      <span class="help-inline">{{$errors->first('childrens')}}</span>
                                    @endif
                                 </div>
                                 <div class="form-group">
                                    <label>Country</label>
                                    <input type="hidden" name="zip_code" id="zip_code" value="AUTO">
                                    <select  class="form-control" name="country" id="country">
                                    <option value="">Select</option>
                                    @foreach ($listTypes['country'] as $country)
                                    <option value="{{$country->id}}" zip-code="{{$country->countryCode}}" phone-code="{{$country->countryId}}" {{ (old('country')==$country)?'selected':'' }}>{{$country->countryName}}</option>
                                       {{-- expr --}}
                                    @endforeach
                                    </select>
                                     @if ($errors->has('country'))
                                      <span class="help-inline">{{$errors->first('country')}}</span>
                                    @endif
                                 </div>
                                 <div class="form-group">
                                    <label id="mobile_prefix">Mobile No </label>
                                    <input type="text" class="form-control" placeholder="Mobile No"  id="mobileno" name="mobileno" value="{{old('country')}}">
                                     @if ($errors->has('mobileno'))
                                      <span class="help-inline">{{($errors->first('mobileno')=='validation.phone')?'Not a valid Mobile Number':$errors->first('mobileno')}}</span>
                                    @endif
                                 </div>
                                 
                              </div>
                           </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
       </form>
    </div>
    
  </div>
</div>