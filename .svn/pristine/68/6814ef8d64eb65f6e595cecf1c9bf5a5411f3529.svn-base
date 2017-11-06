@extends('admin.layout.erp1')
@section('banner')
  <div class="col-lg-12" align="center" style="background-color:#ffcf29">
  <img src="{{ URL::asset('img/new_heading.png') }}" class="img-responsive">
  </div>
@endsection
@section('sidebar')
@include('admin.partial.header')
@include('admin.partial.aside')
@endsection
@section('body')
<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/jquery.timepicker.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/daterangepicker.css') }}" />
<link rel="stylesheet" href="{{ URL::asset('css/sweetalert.css') }}" type="text/css" />
<style type="text/css">
#installationForm .tab-content {
    margin-top: 20px;
}
 #installationForm  .form-group {
    margin-right: 0px !important;
    margin-left: 0px !important;
}
</style>
<div class="bg-light lter b-b wrapper-md">
    <h1 class="m-n font-thin h3">Add Employee</h1>
  </div>
 <div class="wrapper-md" >
    <div class="row">
      <div class="col-md-12">
      	<div class="panel panel-default">
     
          <div class="panel-body">
          	<form id="installationForm" class="form-horizontal">
    <ul class="nav nav-pills">
        <li class="active"><a href="#basic-tab" data-toggle="tab">Personal Details</a></li>
        <li><a href="#database-tab" data-toggle="tab">Employment Qualifications</a></li>
        <li><a href="#work-history" data-toggle="tab">Work History</a></li>
    </ul>

    <div class="tab-content">
        <!-- First tab -->
        <div class="tab-pane active" id="basic-tab">
          <div class="row">
            <div class="col-sm-12">
           <h4>Personal Information</h4>
           <div class="row">
           <div class="col-sm-3">
              <div class="form-group">
              <label for="name">Employee ID:</label>
              <input type="text" class="form-control" id="emplyee_id" name="emplyee_id" placeholder="">
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
              <label for="name">Name:</label>
              <input type="text" class="form-control" id="name" name="name">
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
              <label for="name">Guardian's Name:</label>
              <input type="text" class="form-control" id="gname" name="gname">
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
              <label for="name">Gender:</label>
              <select type="text" class="form-control" id="gender" name="gender">
                <option value="">Select</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
              </select>
              </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3">
              <div class="form-group">
              <label for="name">Date of Birth:</label>
              <input type="text" class="form-control" id="dob" name="dob">
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
              <label for="name">Marital Status:</label>
              <select type="text" class="form-control" id="gender" name="gender">
                <option value="">Select</option>
                <option value="Married">Married</option>
                <option value="Single">Single</option>
              </select>
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
              <label for="name">Religion:</label>
              <input type="text" class="form-control" id="religion" name="religion">
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
              <label for="name">Caste:</label>
              <input type="text" class="form-control" id="caste" name="caste">
              </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3">
              <div class="form-group">
              <label for="name">Blood Group:</label>
              <select type="text" class="form-control" id="gender" name="gender">
                <option value="">Select</option>
                <option value="A+">A+</option>
                <option value="A-">A-</option>
                <option value="B+">B+</option>
                <option value="B-">B-</option>
                <option value="AB+">AB+</option>
                <option value="AB-">AB-</option>
                <option value="O+">O+</option>
                <option value="O-">O-</option>
              </select>
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
              <label for="name">Nationality:</label>
              <select class="form-control" id="nationality" name="nationality">
              	<option value="">Select</option>
              	@foreach ($listTypes['country'] as $element)
              		<option value="{{$element->id}}">{{$element->countryName}}</option>
              	@endforeach
              </select>
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
              <label for="name">Mobile Number:</label>
              <input type="text" class="form-control" id="mobile" name="mobile">
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
              <label for="name">Email:</label>
              <input type="text" class="form-control" id="email" name="email">
              </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3">
              <div class="form-group">
              <label for="name">Upload Photo:</label>
              <input type="file" class="form-control" id="photo" name="photo">
              </div>
            </div>
        </div>
            
            </div>
            <hr/>
            <br/>
          </div>
          <div class="row">
            <div class="col-sm-12">
           <h4>Address</h4>
            <div class="row">
              <div class="col-sm-6">
                <h5>Correspondence</h5>
                <div class="row">
                <div class="col-sm-12">
                  <div class="form-group">
                  <label for="name">Address:</label>
                  <textarea class="form-control" id="c_address" name="c_address"></textarea> 
                  </div>
                </div>
             </div>
             <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                  <label for="name">city:</label>
                   <input type="text" class="form-control" id="c_city" name="c_city">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                  <label for="name">State:</label>
                   <input type="text" class="form-control" id="c_state" name="c_state">
                  </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                  <label for="name">Country:</label>
                   <input type="text" class="form-control" id="c_country" name="c_country">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                  <label for="name">Zip Code:</label>
                   <input type="text" class="form-control" id="c_zip" name="c_zip">
                  </div>
                </div>
                </div>
            </div>
                <div class="col-sm-6">
                  <h5>Permanent <input type="checkbox" name="same_correspondence" id="same_correspondence"></h5>
                  <div class="row">
                  <div class="col-sm-12">
                  <div class="form-group">
                  <label for="name">Address:</label>
                  <textarea class="form-control" id="p_address" name="p_address"></textarea> 
                  </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                  <label for="name">city:</label>
                   <input type="text" class="form-control" id="p_city" name="p_city">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                  <label for="name">State:</label>
                   <input type="text" class="form-control" id="p_state" name="p_state">
                  </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                  <label for="name">Country:</label>
                   <input type="text" class="form-control" id="p_country" name="p_country">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                  <label for="name">Zip Code:</label>
                   <input type="text" class="form-control" id="p_zip" name="p_zip">
                  </div>
                </div>
            </div>
                </div>
              
            </div>
         </div>
       </div>
          <div class="row">
            <div class="col-sm-12">
           <h4>Company Information</h4>
           <div class="row">
           <div class="col-sm-3">
              <div class="form-group">
              <label for="name">Company:</label>
              <select type="text" class="form-control" id="company" name="company">
                <option value="">Select</option>
                @foreach ($listTypes['company'] as $element)
              		<option value="{{$element->id}}">{{$element->company_name}}</option>
              	@endforeach
              </select>
              </div>
            </div>
           <div class="col-sm-3">
              <div class="form-group">
              <label for="name">Branch:</label>
              <select type="text" class="form-control" id="branch" name="branch">
                <option value="">Select</option>
              </select>
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
              <label for="name">Department:</label>
              <select type="text" class="form-control" id="department" name="department">
                <option value="">Select</option>
                @foreach ($listTypes['department'] as $element)
              		<option value="{{$element->id}}">{{$element->department_name}}</option>
              	@endforeach
              </select>
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
              <label for="name">Designation:</label>
              <select type="text" class="form-control" id="designation" name="designation">
                <option value="">Select</option>
              </select>
              </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3">
              <div class="form-group">
              <label for="name">Date of Joining:</label>
              <input type="text" class="form-control" id="dateofjoing" name="dateofjoing">
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
              <label for="name">Work Shift:</label>
             <!--  <input type="text" class="form-control" id="workshift" name="workshift"> -->
              <p id="workshift">
               <input type="text" class="workshift-time start form-control " style="width: 49%; float: left;"  />  
               <input type="text" class="workshift-time end form-control " style="width: 48%; margin-left: 5px; float: left;" />
               </p>
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
              <label for="name">Monthly Gross Salary:</label>
              <input type="text" class="form-control" id="monthly_sal" name="monthly_sal">
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
              <label for="name">Job Type:</label>
              <select type="text" class="form-control" id="jobtype" name="jobtype">
                <option value="">Select</option>
                <option>Full Time</option>
                <option>Part Time</option>
                <option>Permanent</option>
                <option>Temporary</option>
              </select>
              </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3">
              <div class="form-group">
              <label for="name">Employee Status:</label>
              <select type="text" class="form-control" id="status" name="status">
                <option>Active</option>
                <option>Resigned</option>
                <option>Terminated</option>
              </select>
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
              <label for="name">Scheme Role:</label>
              <select type="text" class="form-control" id="scheeme" name="scheeme">
                  <option value="OI">Office Incharge</option>
                  <option value="EMP">Employee</option>
                  <option value="ME">Marketing Executive</option>
              </select>
              </div>
            </div>
        </div>
         </div>
         <hr/>
            <br/>
       </div>
       <div class="row">
         <div class="col-sm-12">
           <h4>Family Details </h4>
           <div class="row" id="family_details">

           </div>
         </div>
       </div>
       
        <div class="row" >
            <div class="col-sm-12">
               <button type="button" class="add-more-family btn btn-sucess btn-sm">Add More(Family Details)</button>
            </div>
       </div>

        
 

        </div>

        <!-- Second tab -->
        <div class="tab-pane" id="database-tab">
            <div class="row">
         <div class="col-sm-12">
           <h4>Acadamic Qualification</h4>
           <div class="row" id="acadamic_details">

           </div>
           <button type="button" class="add-more-acadamic btn btn-sucess btn-sm">Add More(Acadamic Qualification)</button>
         </div>
       </div>

        <div class="row">
         <div class="col-sm-12">
           <h4>Certificate (if any)</h4>
           <div class="row" id="certification_details">

           </div>
           <button type="button" class="add-more-certificate btn btn-sucess btn-sm">Add More(Certificate)</button>
         </div>
       </div>

        </div>
        <!-- third tab -->
        <div class="tab-pane" id="work-history">
          <div class="row">
         <div class="col-sm-12">
           <h4>Work Experience</h4>
           <div class="row" id="work_experience_details">

           </div>
           <button type="button" class="add-more-experience btn btn-sucess btn-sm">Add More(Work Experience)</button>
         </div>
       </div>
       <div class="row">
         <div class="col-sm-12">
           <h4>Your Skills </h4>
           <div class="row">
           <div class="col-sm-3">
              <div class="form-group">
              <label for="name">Computer:</label>
              <input type="text" class="form-control" id="computer_skill" name="computer_skill">
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
              <label for="name">Typing Speed on Computer:</label>
              <input type="text" class="form-control" id="typing_speed" name="typing_speed">
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
              <label for="name">Skill or Knowldge:</label>
              <input type="text" class="form-control" id="knowldge" name="knowldge">
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
              <label for="name">Hobbies:</label>
              <input type="text" class="form-control" id="hobbies" name="hobbies[]">
              </div>
            </div>
        </div>
         </div>
       </div>
       <div class="row">
         <div class="col-sm-12">
           <h4>References (Professional/Work Related)</h4>
           <div class="row" id="references_details">

           </div>
           <button type="button" class="add-more-references btn btn-sucess btn-sm">Add More(References)</button>
         </div>
       </div>
        </div>

        <!-- Previous/Next buttons -->
        <ul class="pager wizard">
            <li class="previous"><a href="javascript: void(0);">Previous</a></li>
            <li class="next"><a href="javascript: void(0);">Next</a></li>
        </ul>
    </div>
</form>
          </div>
      </div>
      </div>
  </div>
</div>
@endsection
@section('jquery')
<script src="{{ URL::asset('js/moment.min.js') }}"></script>
<script src="{{ URL::asset('js/wizard/jquery.bootstrap.wizard.min.js') }}"></script>
<script src="{{ URL::asset('js/wizard/form_wizard.js') }}"></script>
<script src="{{ URL::asset('js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ URL::asset('js/jquery.timepicker.js') }}"></script>
<script src="{{ URL::asset('js/timerange/datepair.js') }}"></script>
<script src="{{ URL::asset('js/timerange/jquery.datepair.js') }}"></script>
<script src="{{ URL::asset('js/daterangepicker.js') }}"></script>
<script src="{{ URL::asset('js/sweetalert.min.js') }}"></script>
<script type="text/javascript">
$(function(){
  
  $('#dob, #dateofjoing').datepicker({
          autoclose: true
      });
             $('#workshift .workshift-time').timepicker({
                    'showDuration': true,
                    'timeFormat': 'g:ia'
                });

                // $('#defaultDeltaExample .date').datepicker({
                //     'format': 'm/d/yyyy',
                //     'autoclose': true
                // });

                var defaultDeltaExampleEl = document.getElementById('workshift');
                var defaultDeltaDatepair = new Datepair(defaultDeltaExampleEl, {
                    'defaultDateDelta': 1,
                    'defaultTimeDelta': 7200000
                });



    var family_details=function(){
      
      $.get('{{URL::to('/') }}/hr/employee/ajax/family_details',function(o){
         $('#family_details').append(o);

    });
    }
    //get acadamic_details
    var acadamic_details=function(){
      
      $.get('{{URL::to('/') }}/hr/employee/ajax/acadamic_details',function(o){
         $('#acadamic_details').append(o);

    });
    }
    //get certification_details
    var certification_details=function(){
      
      $.get('{{URL::to('/') }}/hr/employee/ajax/certification_details',function(o){
         $('#certification_details').append(o);

    });
    }
    //get work_experience_details
    var work_experience_details=function(){
      
      $.get('{{URL::to('/') }}/hr/employee/ajax/work_experience_details',function(o){
         $('#work_experience_details').append(o);
          $('input[name="exp_period[]"]').daterangepicker();

    });
    }
    //get references_details
    var references_details=function(){
      
      $.get('{{URL::to('/') }}/hr/employee/ajax/references_details',function(o){
         $('#references_details').append(o);

    });
    }
    family_details();
    acadamic_details();
    certification_details();
    work_experience_details();
    references_details();
    //add-more-family
    $('.add-more-family').click(function(){
      if($('#family_details > .col-sm-12').length>1){
        return;
      }
      family_details();
    })
    //add-more-acadamic
   $('.add-more-acadamic').click(function(){
      if($('#acadamic_details > .col-sm-12').length>3){
        return;
      }
      acadamic_details();
    })
   //add-more-certificate
   $('.add-more-certificate').click(function(){
      if($('#certification_details > .col-sm-12').length>3){
        return;
      }
      certification_details();
    })
   //add-more-experience
   $('.add-more-experience').click(function(){
      if($('#work_experience_details > .col-sm-12').length>3){
        return;
      }
      work_experience_details();
    })
   //add-more-references
   $('.add-more-references').click(function(){
      if($('#references_details > .col-sm-12').length>3){
        return;
      }
      references_details();
    })
    //delete family_details
    $('#family_details').on('click','.delete',function(){

       $(this).parent('.col-sm-12').remove();
    });
    //delete acadamic_details
    $('#acadamic_details').on('click','.delete',function(){

       $(this).parent('.col-sm-12').remove();
    });
    //delete certification_details
    $('#certification_details').on('click','.delete',function(){

       $(this).parent('.col-sm-12').remove();
    });
     //delete work_experience_details
    $('#work_experience_details').on('click','.delete',function(){

       $(this).parent('.col-sm-12').remove();
    });
     //delete references_details
    $('#references_details').on('click','.delete',function(){

       $(this).parent('.col-sm-12').remove();
    });

    //get branch
    var _getBranch=function(_id){
      
      $.post('{{URL::to('/') }}/hr/employee/ajax/branch',
      	{
      		_id:_id,
      		_token:"{{ csrf_token() }}"
      	},
      	function(o){
      		var _html='<option value="">Select</option>';
      		for (var i in o){
      		  _html+='<option value="'+o[i].id+'">'+o[i].branch_name+'</option>';
      		}
         $('#branch').html(_html);
    },'json');
    }
    //get designation
    var _getDesignation=function(_id){
      
      $.post('{{URL::to('/') }}/hr/employee/ajax/designation',
      	{
      		_id:_id,
      		_token:"{{ csrf_token() }}"
      	},
      	function(o){
      		var _html='<option value="">Select</option>';
      		for (var i in o){
      		  _html+='<option value="'+o[i].id+'">'+o[i].designation_name+'</option>';
      		}
         $('#designation').html(_html);
    },'json');
    }
    //
    $('body').on('change','#company',function(){
      _getBranch($(this).val());
    });
    $('body').on('change','#department',function(){
      _getDesignation($(this).val());
    });



 function adjustIframeHeight() {
        var $body   = $('body'),
                $iframe = $body.data('iframe.fv');
        if ($iframe) {
            // Adjust the height of iframe
            $iframe.height($body.height());
        }
    }

    $('#installationForm')
        .formValidation({
            framework: 'bootstrap',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            // This option will not ignore invisible fields which belong to inactive panels
            excluded: ':disabled',
            fields: {
                emplyee_id: {
                    validators: {
                        notEmpty: {
                            message: 'Employee ID is required'
                        }
                    }
                },
                f_name: {
                    validators: {
                        notEmpty: {
                            message: 'Name is required'
                        }
                    }
                },
                // email: {
                //     validators: {
                //         notEmpty: {
                //             message: 'The email address is required'
                //         },
                //         emailAddress: {
                //             message: 'The email address is not valid'
                //         }
                //     }
                // },
                // dbServer: {
                //     validators: {
                //         notEmpty: {
                //             message: 'The server IP is required'
                //         },
                //         ip: {
                //             message: 'The server IP is not valid'
                //         }
                //     }
                // },
                // dbName: {
                //     validators: {
                //         notEmpty: {
                //             message: 'The database name is required'
                //         }
                //     }
                // },
                // dbUser: {
                //     validators: {
                //         notEmpty: {
                //             message: 'The database user is required'
                //         }
                //     }
                // }
            }
        })
        .bootstrapWizard({
            tabClass: 'nav nav-pills',
            onTabClick: function(tab, navigation, index) {
                return validateTab(index);
            },
            onNext: function(tab, navigation, index) {
                var numTabs    = $('#installationForm').find('.tab-pane').length,
                    isValidTab = validateTab(index - 1);
                if (!isValidTab) {
                    return false;
                }

                if (index === numTabs) {
                    // We are at the last tab

                    // Uncomment the following line to submit the form using the defaultSubmit() method
                    // $('#installationForm').formValidation('defaultSubmit');

                    // For testing purpose
                     sweetAlert("Oops...",'' , "error");
                }

                return true;
            },
            onPrevious: function(tab, navigation, index) {
                return validateTab(index + 1);
            },
            onTabShow: function(tab, navigation, index) {
                // Update the label of Next button when we are at the last tab
                var numTabs = $('#installationForm').find('.tab-pane').length;
                $('#installationForm')
                    .find('.next')
                        .removeClass('disabled')    // Enable the Next button
                        .find('a')
                        .html(index === numTabs - 1 ? 'Finish' : 'Next');

                // You don't need to care about it
                // It is for the specific demo
                adjustIframeHeight();
            }
        });

    function validateTab(index) {
        var fv   = $('#installationForm').data('formValidation'), // FormValidation instance
            // The current tab
            $tab = $('#installationForm').find('.tab-pane').eq(index);

        // Validate the container
        fv.validateContainer($tab);

        var isValidStep = fv.isValidContainer($tab);
        if (isValidStep === false || isValidStep === null) {
            // Do not jump to the target tab
            return false;
        }

        return true;
    }
});

</script>
@endsection