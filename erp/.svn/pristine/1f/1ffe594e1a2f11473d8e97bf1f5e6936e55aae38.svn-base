 <?php
  //$errors=session()->get('valiationErrors');
  ?>
<div class="row">
@isset($nominee_two)
    <input type="hidden" name="nominee_id" value="{{$nominee_two->id}}">
@endisset
              <div class="col-sm-12">
            <div class="form-group">
              <label>Name of Nominee</label>
              <input type="text" class="form-control" placeholder="Name of Nominee"  name="name_nominee_two" id="name_nominee_two" value="{{isset($nominee_two->name)?$nominee_two->name:''}}{{old('name_nominee_two')}}" {{isset($nominee_two->name)?'readonly':''}} data-parsley-required-message="Nominee name is required" required data-parsley-pattern="/^[^-\s][a-zA-Z0-9_ ]*$/" data-parsley-trigger="blur">
               
            </div>
            </div>
             <div class="col-sm-12">
            <div class="form-group">
              <label>Date of Birth</label>
              <input type="text" class="form-control" placeholder="Date of Birth" data-date-end-date="0d"  name="dob_nominee_two" id="dob_nominee_two" value="{{isset($nominee_two->dob)?date('d/m/Y',strtotime($nominee_two->dob)):''}}{{old('dob_nominee_two')}}" {{isset($nominee_two->dob)?'readonly':''}} data-parsley-required-message="Date of Birth is required" required   data-parsley-trigger="keyup" readonly>
              
            </div>
             </div>
             </div>
             <div class="row">
              <div class="col-sm-6">
            <div class="form-group">
              <label>Relation with the Applicant</label>
              <select name="relation_applicant_two" id="relation_applicant_two" class="form-control" {{isset($nominee_two->relationWithApplicant)?'readonly':''}} data-parsley-required-message="Relation with the Applicant is required" data-parsley-trigger="blur" required>
                <option value="">Select</option>
                @foreach ($listTypes['relationnominee'] as $element)
                	 <option value="{{$element}}" {{(isset($nominee_two->relationWithApplicant) && $nominee_two->relationWithApplicant==$element)?'selected':''}}  {{(old('relation_applicant_two')==$element)?'selected':''}}>{{$element}}</option>
                @endforeach
              </select>
              
            </div>
            </div>

              <div class="col-sm-6">
            <div class="form-group">
              <label>Gender</label>
              <select name="nominee_gender_two" id="nominee_gender_two" class="form-control" {{isset($nominee_two->gender)?'readonly':''}} data-parsley-required-message="Gender is required" data-parsley-trigger="blur" required>
                <option value="">Select</option>
                <option value="Male" {{(isset($nominee_two->gender) && $nominee_two->gender=='Male')?'selected':''}} {{(old('nominee_gender')=='Male')?'selected':''}}>Male</option>
                <option value="Female" {{(isset($nominee_two->gender) && $nominee_two->gender=='Female')?'selected':''}} {{(old('nominee_gender_two')=='Female')?'selected':''}}>Female</option>
              </select>
               @if ($errors->has('nominee_gender'))
                                      <span class="help-inline">{{$errors->first('nominee_gender_two')}}</span>
                                    @endif
            </div>
            </div>
            </div>
            <div class="form-group">
              <label>Address</label>
              <textarea class="form-control" placeholder="Address"  name="nominee_addr_two" id="nominee_addr_two" {{isset($nominee_two->address->address)?'readonly':''}} data-parsley-required-message="Address is required" data-parsley-trigger="blur" required>{{isset($nominee_two->address->address)?$nominee_two->address->address:''}}{{old('nominee_addr_two')}}</textarea>  
              
            </div>
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
              <label>City</label>
              <input type="text" class="form-control" placeholder="City"  name="city_nominee_two" id="city_nominee_two" value="{{isset($nominee_two->address->city)?$nominee_two->address->city:''}}{{old('city_nominee_two')}}" {{isset($nominee_two->address->city)?'readonly':''}} data-parsley-required-message="City is required" data-parsley-trigger="blur" required>
              
              </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
              <label>State</label>
              <input type="text" class="form-control" placeholder="state"  name="state_nominee_two" id="city_nominee_two" value="{{isset($nominee_two->address->state)?$nominee_two->address->state:''}}{{old('state_nominee_two')}}" {{isset($nominee_two->address->state)?'readonly':''}} data-parsley-required-message="state is required" data-parsley-pattern="/^[^-\s][a-zA-Z_ ]*$/"  data-parsley-pattern-message="not a valid entry" data-parsley-trigger="blur" required>
              
              </div>
              </div>
              
            </div>

            <div class="row">
            <div class="col-sm-6">
            <div class="form-group">
              <label>Pin</label>
              <input type="text" class="form-control" placeholder="Pin"  name="pin_nominee_two" id="pin_nominee_two" value="{{isset($nominee_two->address->pin)?$nominee_two->address->pin:''}}{{old('pin_nominee')}}" {{isset($nominee_two->address->pin)?'readonly':''}} data-parsley-required-message="Pin is required" required data-parsley-pattern="^[1-9][0-9]{3,5}$" data-parsley-trigger="blur">
             
            </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
              <label>Mobile No.</label>
              <input type="text" class="form-control" placeholder="Mobile No."  name="mobile_nominee_two" id="mobile_nominee_two" value="{{isset($nominee_two->mobile)?$nominee_two->mobile:''}}{{old('mobile_nominee_two')}}" {{isset($nominee_two->mobile)?'readonly':''}} data-parsley-required-message="Mobile No. is required" required data-parsley-pattern="^[1-9][0-9]{1,15}$" data-parsley-trigger="blur">
              
              </div>
              </div>
              
            </div>
            <div class="row">
            <div class="col-sm-6">
            <div class="form-group">
              <label>Email</label>
              <input type="text" class="form-control" placeholder="Email"  name="email_nominee_two" id="email_nominee_two" value="{{isset($nominee_two->email)?$nominee_two->email:''}}{{old('email_nominee_two')}}" {{isset($nominee_two->email)?'readonly':''}} data-parsley-required-message="Email is required" data-parsley-trigger="blur" required data-parsley-type="email">
              
            </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
              <label>Upload Photo</label>

             
              @empty ($nominee_two->uploadPhoto)
				 <input type="file" class="form-control" placeholder="Mobile No."  name="nominee_photo_two" id="nominee_photo_two" data-parsley-extension="jpg,jpeg,png"  data-parsley-required-message="Upload Photo is required" data-parsley-trigger="blur" data-parsley-max-file-size="200" required>
         
			  @endempty

              @isset ($nominee_two->uploadPhoto)
                  <img src="{{ URL::asset('/storage/img/nominee/'.$nominee_two->uploadPhoto)}}" class="img-thumbnail" alt="" style="width: 150px;" />
              @endisset
              </div>
              </div>
             
              
            </div>
            <div class="row">
               <div class="col-sm-6">
            <div class="form-group">
              <label>Upload Signature</label>
             
              @empty ($nominee_two->signature)
          <input type="file" class="form-control" placeholder="Email"  name="nominee_signature_two" id="nominee_signature_two" data-parsley-extension="jpg,jpeg,png" data-parsley-max-file-size="200"  data-parsley-trigger="blur" data-parsley-required-message="Upload Signature is required" required>
         
        @endempty

              @isset ($nominee_two->signature)
                  <img src="{{ URL::asset('/storage/img/nominee/'.$nominee_two->signature)}}" class="img-thumbnail" alt="" style="width: 150px;" />
              @endisset
            </div>
              </div>
            </div>