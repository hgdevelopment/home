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
@section('body')



        <div class="col-md-3 tiles" align="center"> 
            <h4>Report by id</h4>
            <form action="{{URL::to('admin/attendance/staff')}}" id='form' method="post" data-parsley-validate>
            	{{csrf_field()}}
            	<input type="text" name="staffid" class="form-control" placeholder="staff id" required=""><br>
            	<select class="form-control" name="month" required>
                    <option value="">Select</option>
                    <option value="01">January</option>
                    <option value="02">February</option>
                    <option value="03">March</option>
                    <option value="04">April</option>
                    <option value="05">May</option>
                    <option value="06">June</option>
                    <option value="07">July</option>
                    <option value="08">August</option>
                    <option value="09">September</option>
                    <option value="10">October</option>
                    <option value="11">November</option>
                    <option value="12">December </option>
                </select><br>

                <select class="form-control" name="year" required>
                    <option value="">Select</option>
                    <option value="2017">2017</option>
                    <option value="2018">2018</option>
                    <option value="2019">2019</option>
                </select><br>
            	<button type="submit" class="btn btn-block btn-success" >Download</button><br>

            </form>
           
        </div>


        <div class="col-md-3 tiles" align="center" style="background-color: rgba(255,255,255,0.6);margin-left: 10px;"> 
            <h4>Report by Department</h4>
            <form action="{{URL::to('admin/attendance/department')}}"  id='form1' method="post">
                {{csrf_field()}}
            	<select class="form-control" name="dept" required>
            		<option value="">Select</option>
                    @foreach($departments as $department)
                    <option value="{{$department->id}}">{{$department->department_name}}</option>
                    @endforeach
            	</select><br>

            	<select class="form-control" name="month" required="">
                    <option value="">Select</option>
                    <option value="01">January</option>
                    <option value="02">February</option>
                    <option value="03">March</option>
                    <option value="04">April</option>
                    <option value="05">May</option>
                    <option value="06">June</option>
                    <option value="07">July</option>
                    <option value="08">August</option>
                    <option value="09">September</option>
                    <option value="10">October</option>
                    <option value="11">November</option>
                    <option value="12">December </option>
                </select><br> 

            	<select class="form-control" name="year" required>
                    <option value="">Select</option>
                    <option value="2017">2017</option>
                    <option value="2018">2018</option>
                    <option value="2019">2019</option>
                </select><br>

            	<button type="submit" class="btn btn-block btn-success" >Download</button><br>

            </form>
           
        </div>

@endsection

@section('jquery')
<script>
  $('#form').parsley();
  $('#form1').parsley();
</script>			
@endsection