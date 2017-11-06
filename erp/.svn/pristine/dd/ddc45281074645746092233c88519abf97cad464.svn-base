 <?php
  //$errors=session()->get('valiationErrors');
  ?>
  <style type="text/css" media="screen">
    #parsley-id-23{
      display: inline;
    }
  </style>
<div class="row">
@isset($nominee)
    <input type="hidden" name="nominee_id" value="{{$nominee->id}}">
@endisset
              <div class="col-sm-12">
            <div class="form-group">
              <label>Name of Nominee</label>
              <input type="text" class="form-control" placeholder="Name of Nominee"  name="name_nominee" id="name_nominee" value="{{isset($nominee->name)?$nominee->name:''}}{{old('name_nominee')}}" {{isset($nominee->name)?'readonly':''}} data-parsley-required-message="Nominee name is required" required data-parsley-pattern="/^[^-\s][a-zA-Z0-9_ ]*$/" data-parsley-trigger="blur">
               
            </div>
            </div>
             <div class="col-sm-12">
            <div class="form-group">
              <label>Date of Birth</label>
              <input type="text" class="form-control" placeholder="Date of Birth" data-date-end-date="0d"  name="dob_nominee" id="dob_nominee" value="{{isset($nominee->dob)?date('d/m/Y',strtotime($nominee->dob)):''}}{{old('dob_nominee')}}" {{isset($nominee->dob)?'readonly':''}} data-parsley-required-message="Date of Birth is required" required   data-parsley-trigger="keyup" readonly>
              
            </div>
             </div>
             </div>
             <div class="row">
              <div class="col-sm-6">
            <div class="form-group">
              <label>Relation with the Applicant</label>
              <select name="relation_applicant" id="relation_applicant" class="form-control" {{isset($nominee->relationWithApplicant)?'readonly':''}} data-parsley-required-message="Relation with the Applicant is required" data-parsley-trigger="blur" required>
                <option value="">Select</option>
                @foreach ($listTypes['relationnominee'] as $element)
                	 <option value="{{$element}}" {{(isset($nominee->relationWithApplicant) && $nominee->relationWithApplicant==$element)?'selected':''}}  {{(old('relation_applicant')==$element)?'selected':''}}>{{$element}}</option>
                @endforeach
              </select>
              
            </div>
            </div>

              <div class="col-sm-6">
            <div class="form-group">
              <label>Gender</label>
              <select name="nominee_gender" id="nominee_gender" class="form-control" {{isset($nominee->gender)?'readonly':''}} data-parsley-required-message="Gender is required" data-parsley-trigger="blur" required>
                <option value="">Select</option>
                <option value="Male" {{(isset($nominee->gender) && $nominee->gender=='Male')?'selected':''}} {{(old('nominee_gender')=='Male')?'selected':''}}>Male</option>
                <option value="Female" {{(isset($nominee->gender) && $nominee->gender=='Female')?'selected':''}} {{(old('nominee_gender')=='Female')?'selected':''}}>Female</option>
              </select>
               @if ($errors->has('nominee_gender'))
                                      <span class="help-inline">{{$errors->first('nominee_gender')}}</span>
                                    @endif
            </div>
            </div>
            </div>
            <div class="form-group">
              <label>Address</label>
              <textarea class="form-control" placeholder="Address"  name="nominee_addr" id="nominee_addr" {{isset($nominee->address->address)?'readonly':''}} data-parsley-required-message="Address is required" data-parsley-trigger="blur" required>{{isset($nominee->address->address)?$nominee->address->address:''}}{{old('nominee_addr')}}</textarea>  
              
            </div>
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
              <label>City</label>
              <input type="text" class="form-control" placeholder="City"  name="city_nominee" id="city_nominee" value="{{isset($nominee->address->city)?$nominee->address->city:''}}{{old('city_nominee')}}" {{isset($nominee->address->city)?'readonly':''}} data-parsley-required-message="City is required" data-parsley-trigger="blur" required>
              
              </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
              <label>State</label>
              <input type="text" class="form-control" placeholder="state"  name="state_nominee" id="city_nominee" value="{{isset($nominee->address->state)?$nominee->address->state:''}}{{old('state_nominee')}}" {{isset($nominee->address->state)?'readonly':''}} data-parsley-required-message="state is required" data-parsley-pattern="/^[^-\s][a-zA-Z_ ]*$/"  data-parsley-pattern-message="not a valid entry" data-parsley-trigger="blur" required>
              
              </div>
              </div>
              
            </div>

            <div class="row">
            <div class="col-sm-6">
            <div class="form-group">
              <label>Pin</label>
              <input type="text" class="form-control" placeholder="Pin"  name="pin_nominee" id="pin_nominee" value="{{isset($nominee->address->pin)?$nominee->address->pin:''}}{{old('pin_nominee')}}" {{isset($nominee->address->pin)?'readonly':''}} data-parsley-required-message="Pin is required" required data-parsley-pattern="^[1-9][0-9]{3,5}$" data-parsley-trigger="blur">
             
            </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
              <label>Mobile No.</label>
              <input type="text" class="form-control" placeholder="Mobile No."  name="mobile_nominee" id="mobile_nominee" value="{{isset($nominee->mobile)?$nominee->mobile:''}}{{old('mobile_nominee')}}" {{isset($nominee->mobile)?'readonly':''}} data-parsley-required-message="Mobile No. is required" required data-parsley-pattern="^[1-9][0-9]{1,15}$" data-parsley-trigger="blur">
              
              </div>
              </div>
              
            </div>
            <div class="row">
            <div class="col-sm-6">
            <div class="form-group">
              <label>Email</label>
              <input type="text" class="form-control" placeholder="Email"  name="email_nominee" id="email_nominee" value="{{isset($nominee->email)?$nominee->email:''}}{{old('email_nominee')}}" {{isset($nominee->email)?'readonly':''}} data-parsley-required-message="Email is required" data-parsley-trigger="blur" required data-parsley-type="email">
              
            </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
              <label>Upload Photo</label>

             
              @empty ($nominee->uploadPhoto)
				 <input type="file" class="form-control" placeholder="Mobile No."  name="nominee_photo" id="nominee_photo" data-parsley-extension="jpg,jpeg,png"  data-parsley-required-message="Upload Photo is required" data-parsley-trigger="blur" data-parsley-max-file-size="200" required>
         
			  @endempty

              @isset ($nominee->uploadPhoto)
                  <img src="{{ URL::asset('/storage/img/nominee/'.$nominee->uploadPhoto)}}" class="img-thumbnail" alt="" style="width: 150px;" />
              @endisset
              </div>
              </div>
             
              
            </div>
            <div class="row">
               <div class="col-sm-6">
            <div class="form-group">
              <label>Upload Signature</label>
             
              @empty ($nominee->signature)
          <input type="file" class="form-control" placeholder="Email"  name="nominee_signature" id="nominee_signature" data-parsley-extension="jpg,jpeg,png" data-parsley-max-file-size="200"  data-parsley-trigger="blur" data-parsley-required-message="Upload Signature is required" required>
         
        @endempty

              @isset ($nominee->signature)
                  <img src="{{ URL::asset('/storage/img/nominee/'.$nominee->signature)}}" class="img-thumbnail" alt="" style="width: 150px;" />
              @endisset
            </div>
              </div>
            </div>