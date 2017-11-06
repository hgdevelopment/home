@extends('web.layout.erp')

@section('banner')
{{--   <div class="col-lg-12" align="center" style="background-color:#ffcf29">
    <img src="new_heading.png" class="img-responsive">
  </div> --}}
@endsection

@section('sidebar')
  @include('web.partial.header')
  @include('web.partial.aside')
@endsection

@section('body')

<div class="bg-light lter b-b wrapper-md">
  <h1 class="m-n font-thin h3">Add Nominee</h1>
</div>
<div class="wrapper-md">
  <div class="row">
    <div class="col-sm-12">
      <div class="blog-post">                   
        <div class="col-sm-12">
          <div class="panel panel-default">
            <div class="panel-heading font-bold"> Add Nominee Details</div>
              <div class="panel-body">
              @if (trim($__env->yieldContent('edit_id')))
              <form role="form" method="post" action="{{URL::to('/') }}/web/nominee/@yield('edit_id')" enctype="multipart/form-data">
              @else
              <form role="form" method="post" action="{{URL::to('/') }}/web/nominee" enctype="multipart/form-data">
               @endif

                  {{csrf_field()}}
                  @section('edit')
                  @show
                  <div class="col-sm-4">
                    <label>NAME OF FIRST NOMINEE*</label>
                    <input name="nominee_name" type="text" id="nominee_name" class="form-control"  value="@yield('nominee_name')" placeholder="Enter your Name">
                    @if ($errors->has('nominee_name'))
                   <span class="help-inline">{{$errors->first('nominee_name')}}</span>
                    @endif
                  </div>
                  <div class="form-group col-sm-4">
                    <label>DATE OF BIRTH*</label>
                    <input name="dateofbirth" type="text" id="dateofbirth" class="form-control" value="@yield('dateofbirth')" placeholder="Date of Birth" >
                    @if ($errors->has('dateofbirth'))
                      <span class="help-inline">{{$errors->first('dateofbirth')}}</span>
                    @endif
                  </div>

                  <div class="form-group col-sm-4">
                    <label> GENDER*</label><br>
                    <label class="checkbox-inline i-checks">
                     <input name="gender" type="radio" id="gender" value="male" {{ (isset($editnominee->gender) && $editnominee->gender=='Male')? 'checked':''}} class="form-control"><i></i> MALE
                    </label>
                    <label class="checkbox-inline i-checks">
                      <input name="gender" type="radio" id="gender" value="female"  class="form-control" {{  (isset($editnominee->gender) && $editnominee->gender=='Female')? 'checked':''}}><i></i> FEMALE 
                    </label>
                    @if ($errors->has('gender'))
                      <span class="help-inline">{{$errors->first('gender')}}</span>
                    @endif
                  </div>

                  <div class="col-sm-12">
                    <label>RESIDENTIAL ADDRESS*</label>
                    <textarea  class="form-control" name="res_address" id="res_address"  value="@yield('res_address')" placeholder="Enter Your Address" >@yield('address')</textarea><br>  
                    @if ($errors->has('res_address'))
                      <span class="help-inline">{{$errors->first('res_address')}}</span>
                    @endif
                  </div>

                  <div class="form-group col-sm-4">
                    <label>CITY</label>
                    <input class="form-control" name="city" id="city" value="@yield('city')" placeholder="Enter Your City"><br>
                    @if ($errors->has('city'))
                      <span class="help-inline">{{$errors->first('city')}}</span>
                    @endif
                  </div>

                  <div class="form-group col-sm-4">
                    <label>PIN</label><br>
                    <input name="pin" type="number" id="pin" value="@yield('pin')" class="form-control"  placeholder="Enter Your Pin Number"><br>
                    @if ($errors->has('pin'))
                      <span class="help-inline">{{$errors->first('pin')}}</span>
                    @endif
                  </div>

                    <div class="form-group col-sm-4">
                      <label>MOBILE</label>
                      <input name="mobile" type="text" id="mobile" value="@yield('mobile')" class="form-control" placeholder="Enter Your Moblile Number" ><br>
                      @if ($errors->has('mobile'))
                        <span class="help-inline">{{$errors->first('mobile')}}</span>
                      @endif
                    </div>

                    <div class="form-group col-sm-4">
                      <label>EMAIL</label>
                      <input name="email" type="email" id="email" value="@yield('email')" class="form-control" placeholder="Enter Your Email Id" ><br>
                      @if ($errors->has('email'))
                        <span class="help-inline">{{$errors->first('email')}}</span>
                      @endif
                    </div>

                    <div class="form-group col-sm-4">
                      <label> RELATION WITH THE APPLICANT*</label>
                     <input name="relation_name" type="text" id="relation_name" value="@yield('relation_name')" class="form-control" placeholder="Enter Name">
                      @if ($errors->has('relation_name'))
                        <span class="help-inline">{{$errors->first('relation_name')}}</span>
                      @endif
                    </div>

                    <div class="col-sm-4">
                    <label>TYPE OF PROOF*</label>
                     <select class="form-control" name="proofId" id="proofId">
                       <option>--SELECT--</option> 
                       <option value="aadhar">AADHAR</option> 
                       <option value="license">LICENSE</option>
                       <option value="pancard">PANCARD</option>
                       <option value="passport">PASSPORT</option>
                       <option value="other">OTHER</option>
                     </select>
                    @if ($errors->has('proofId'))
                      <span class="help-inline">{{$errors->first('proofId')}}</span>
                    @endif
                  </div>

                    <div class="col-sm-12"></div>
                    <div class="form-group col-sm-3">
                      <label>UPLOAD PHOTO*</label>
                      @if(isset($editnominee->id))
                        <input type="file" name="photo" id="photo" class="form-control" accept="image/png,image/jpeg" >
                        <img src="{{ URL::to('/') }}/img/nominee/{{$editnominee->uploadPhoto}}" style="width:100px;height:100px;">
                        @else
                        <input type="file" name="photo" id="photo" class="form-control" accept="image/png,image/jpeg" >
                        @if ($errors->has('photo'))
                         <span class="help-inline">{{$errors->first('photo')}}</span>
                        @endif
                      @endif
                    </div>

                    <div class="form-group col-sm-3">
                    <label>UPLOAD SIGNATURE*</label>
                     @if(isset($editnominee->id))
                      <input type="file" name="signature" id="signature" class="form-control" accept="image/png,image/jpeg" >
                      <img src="{{ URL::to('/') }}/img/nominee/{{$editnominee->signature}}" style="width:100px;height:100px;">
                      @else
                      <input type="file" name="signature" id="signature" class="form-control" accept="image/png,image/jpeg" >
                      @if ($errors->has('signature'))
                        <span class="help-inline">{{$errors->first('signature')}}</span>
                      @endif
                    @endif
                    </div>

                    <div class="form-group col-sm-3">
                      <label>UPLOAD IDPROOF*</label>
                       @if(isset($editnominee->id))
                        <input type="file" name="idproof" id="idproof" class="form-control" accept="image/png,image/jpeg" >
                        <img src="{{ URL::to('/') }}/img/nominee/{{$editnominee->proofId}}" style="width:100px;height:100px;">
                       @else
                        <input type="file" name="idproof" id="idproof" class="form-control" accept="image/png,image/jpeg" >
                        @if ($errors->has('idproof'))
                         <span class="help-inline">{{$errors->first('idproof')}}</span>
                        @endif
                      @endif
                    </div>

                    <div class="col-sm-12" ><br></div>
                      <div class="form-group"><div class="col-sm-9 "><br></div>
                        <div class="col-sm-3 ">
                          <button name="submit" type="submit" class="btn btn-sm btn-success btn-block" id="submit">Submit</button>                  
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
       </div>
      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading font-bold">VIEW ACCOUNT</div>
          <div class="table-responsive">
          <table class="table" style="overflow-x: initial;" ui-jq="footable" ui-options='{
            "paging": {
            "enabled": true
            },
            "filtering": {
            "enabled": true
            },
            "sorting": {
            "enabled": true
            }}'>
            <thead>
             <tr>
                <th>Name</th>
                <th>Relationship</th>
                <th>Mobile</th>
                <th>Email</th>
                <th>Edit/Delete</th>
              </tr>
           </thead>
            <tbody>
              @foreach ($nominee as $nominees) 
                <tr data-expanded="true">
                  <td>{{ $nominees->name }}</td>
                  <td>{{ $nominees->relationWithApplicant }}</td>
                  <td>{{ $nominees->mobile }}</td>
                  <td>{{ $nominees->email }}</td>
                  <td>
                    <a href="{{ URL::to('/') }}/web/nominee/{{ $nominees->id }}/edit"  class="active"><i style="color: #018001;" class="fa fa-pencil text-success text-active" aria-hidden="true"></i></a>
                    <form action="{{ URL::to('/') }}/web/nominee/{{ $nominees->id }}" method="POST" class="pull-right">
                      {{ method_field('DELETE') }}
                      {{ csrf_field() }}
                      <button class="active" style="border: none;"><i  style="color: #f05050;" class="fa fa-close text-danger text-active" aria-hidden="true"></i></button> 
                    </form>
                  </td>
                </tr>
              @endforeach 
           </tbody>
        </table>
        </div>
      </div>
    </div>   
  </div>  
@endsection
@section('jquery')
  <script src="{{ URL::asset('js/bootstrap-datepicker.min.js') }}"></script>
  <script type="text/javascript">
    $(function(){
    $('#dateofbirth').datepicker({'autoclose':true,format: 'dd/mm/yyyy'})
    })
  </script>
@endsection