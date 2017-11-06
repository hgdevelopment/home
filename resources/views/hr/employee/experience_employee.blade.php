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
.btn-link,.btn-link:hover {
    color: #796b20;
}
.modal-header .btn-link,.modal-header .btn-link:hover{
  color: #000;
}
</style>
<div class="app-content-body fade-in-up ng-scope" ui-view="" style=""><div  class="fade-in-down ng-scope"><div class="hbox hbox-auto-xs hbox-auto-sm ng-scope">
  <div class="col">
    @include('hr.employee.partial.header')
    <div class="padder">      
    	<br/>
    	
 

	{{-- expr --}}

  <div class="row" style="margin-top:15px;">
      <div class="col-sm-12">
      <div class="panel-warning">
      	<div class="panel-heading">
      		Experience <span class="pull-right"><a data-toggle="modal" data-target="#experienceModal" href="#" class="btn  btn-link "><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a></span>
      	</div>
        <table class="table">
          <thead>
            <tr>
              <th>Organisation</th>
               <th>Designation</th>
               <th>Responsibilities</th>
               <th>Annual Income</th>
               <th>Time Period</th>
            </tr>
          </thead>
          <tbody>
             @foreach ($experience as $element)
            <tr>
              <td>{{$element->organisation}}</td>
              <td>{{$element->designation}}</td>
              <td>{{$element->responsibilities}}</td>
              <td>{{$element->income}}</td>
              <td>{{$element->timeperiod}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      	 
       
         </div>
      </div>
      </div>
  </div>


 {{-- modal start --}}
   <div id="experienceModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
       <form id="form_experience" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <input type="hidden" name="_id" id="_id" value="{{$id}}">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Experience Details <span class="pull-right"><a  href="#" class="btn add-new-row btn-link"><i class="fa fa-plus" aria-hidden="true"></i> Add New</a></span></h4>

        
      </div>
      <div class="modal-body" >
         @foreach ($experience as $element)
       <div class="experience_modal row " >
           
           <div class="col-sm-2">
              <div class="form-group">
              <label for="name">Organisation:</label>
              <input type="text" class="form-control" id="exp_organisation" name="exp_organisation[]" value="{{$element->organisation}}">
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
              <label for="name">Designation:</label>
              <input type="text" class="form-control" id="exp_designation" name="exp_designation[]" value="{{$element->designation}}">
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
              <label for="name">Responsibilities:</label>
              <input type="text" class="form-control" id="exp_responsibilities" name="exp_responsibilities[]" value="{{$element->responsibilities}}">
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
              <label for="name">Annual Income:</label>
              <input type="text" class="form-control" id="exp_income" name="exp_income[]" value="{{$element->income}}">
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
              <label for="name">Time Period:</label>
              <br/>
              @php
                $experience_per=explode('-',$element->timeperiod);
              @endphp
              <div style="float: left; width: 48%; margin-right:2px;">
                <input type="text" class="form-control" id="exp_period" name="exp_period[]" value="{{$experience_per[0]}}">
              </div>
              <div style="float: left; width: 48%;">
                <input type="text" class="form-control" id="exp_period" name="exp_period_2[]" value="{{$experience_per[1]}}">
              </div>
              
              </div>
            </div>
            <div class="col-sm-1">
              <div class="form-group">
                <label for="name">&nbsp;</label>
              <br/>
             <button type="button" class="btn btn-sm remove-row" ><i class="fa fa-times" aria-hidden="true"></i></button>
           </div>
            </div>
         </div>
        @endforeach
        <div class="experience_modal row hide" id="experience_modal">
           
           <div class="col-sm-2">
              <div class="form-group">
              <label for="name">Organisation:</label>
              <input type="text" class="form-control" id="exp_organisation" name="exp_organisation[]">
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
              <label for="name">Designation:</label>
              <input type="text" class="form-control" id="exp_designation" name="exp_designation[]">
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
              <label for="name">Responsibilities:</label>
              <input type="text" class="form-control" id="exp_responsibilities" name="exp_responsibilities[]">
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
              <label for="name">Annual Income:</label>
              <input type="text" class="form-control" id="exp_income" name="exp_income[]">
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
              <label for="name">Time Period:</label>
              <br/>
              <div style="float: left; width: 48%; margin-right:2px;">
                <input type="text" class="form-control" id="exp_period" name="exp_period[]">
              </div>
              <div style="float: left; width: 48%;">
                <input type="text" class="form-control" id="exp_period" name="exp_period_2[]">
              </div>
              
              </div>
            </div>
            <div class="col-sm-1">
              <div class="form-group">
                <label for="name">&nbsp;</label>
              <br/>
             <button type="button" class="btn btn-sm remove-row" ><i class="fa fa-times" aria-hidden="true"></i></button>
           </div>
            </div>
         </div>
      </div>
      <div class="modal-footer">

        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-info" >Update</button>
      </div>
      </form>
    </div>

  </div>
</div>
   {{-- end modal --}}
    </div>
  </div>
  </div></div>

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
<script>
	$(function(){
    $('input[name="exp_period[]"], input[name="exp_period_2[]"]').datepicker({     autoclose: true
                  });
    $('.form_experience:first-child').find('.remove-row').hide();
		$('.add-new-row').click(function(e){
       e.preventDefault();
       var $template = $('#experience_modal'),
                $clone    = $template
                                .clone()
                                .removeAttr('id')
                                .removeClass('hide')
                                .insertBefore($template);

                                $clone.find('.remove-row')
                                .show();
                                $clone.find('.form-control').val('');

                                $clone.find('input[name="exp_period[]"], input[name="exp_period_2[]"]').datepicker({     autoclose: true
                                 });

                                
    });
    $('body').on('click','.remove-row',function(e){
      e.preventDefault();
      $(this).parents('.experience_modal').remove();
    });
    $('#form_experience').submit(function(e){
      e.preventDefault();
      $.post('{{URL::to('/') }}/hr/employee/experience/update',$(this).serialize(),function(data){
                if(data.result){
                               sweetAlert("Experience Updated!",'' , "success");
                                 location.reload();
                              }else{
                                sweetAlert("Oops...",data.msg , "error");
                              }
      },'json');
    });
	})
</script>
@endsection