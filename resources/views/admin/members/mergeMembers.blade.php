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
<link href="{!! asset('css/sweetalert.css') !!}" media="all" rel="stylesheet" type="text/css" />
<div class="bg-light lter b-b wrapper-md">
  <h1 class="m-n font-thin h3">Merge Members</h1>
</div><br>
<form  method="post" id="form" data-parsley-validate action="{{URL::to('/') }}/admin/merge">
  {{csrf_field()}}
  @if (Session()->has('message'))
    <div class="alert alert-info fade in alert-dismissable">
      <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
      <strong>Info!</strong> {{Session()->get('message')}}
    </div>
  @endif
  <div class="wrapper-sm">
    <div class="row">
      <div class="col-sm-12">
        <div class="blog-post">                   
          <div class="col-sm-12">
            <div class="panel panel-default">
              <div class="panel-heading ">                  
               Merge Members
              </div>
              <div class="panel-body"> 
                <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
                <div class="col-sm-4">
                  <label>Original Member Code</label>
                <input type="text" class="form-control" id="original" name="original" value="{{ old('original') }}">
                @if ($errors->has('original'))
                  <span class="help-inline">{{$errors->first('original')}}</span>
                @endif
                </div>
                 <div class="col-sm-4">
                  <label>Duplicate Member Code</label>
                <input type="text" class="form-control" id="duplicate" name="duplicate" value="{{ old('duplicate') }}">
                @if ($errors->has('duplicate'))
                  <span class="help-inline">{{$errors->first('duplicate')}}</span>
                @endif
                </div>
                <div class="col-sm-4">
                 <label><br><br></label>
                  <input type="submit"  name="submit" id="submit"  value="Check"  class="btn btn-sm btn-success">
                </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>
  @if (session()->has('data'))
  @php
     $data=session()->get('data');
  @endphp
<div class="wrapper-sm">

  <div class="row">
    
    <div class="col-sm-6">
     @if($data['data']['original'])
     <div class="panel panel-default">
            <div class="panel-heading">
              <div class="clearfix">
                <a href="" class="pull-left thumb-md avatar b-3x m-r">
                  <img style="height: 64px;" src="{{ URL::asset('/storage/img/member_img/'.$data['data']['original']->photo)}}" alt="...">
                </a>
                <div class="clear">
                  <div class="h3 m-t-xs m-b-xs">
                    {{$data['data']['original']->name}}
                    <i class="fa fa-circle text-success pull-right text-xs m-t-sm"></i>
                  </div>
                  <small class="text-muted">{{$data['data']['original']->code}}</small>
                </div>
              </div>
            </div>
            <div class="hbox text-center b-b b-light text-sm" style="background: #fff;">          
          <a data-toggle="modal" href="#original_member" class="col padder-v text-muted b-r b-light">
            <i class="icon-wallet block m-b-xs fa-2x"></i>
            <span>TCN 
              @isset ($data['data']['original']->tcnmerge)
                ({{$data['data']['original']->tcnmerge->count()}})
              @endisset
            </span>
          </a>
          <a href="#original_member_profile" data-toggle="modal" class="col padder-v text-muted b-r b-light">
            <i class="icon-user block m-b-xs fa-2x"></i>
            <span>VIEW PROFILE</span>
          </a>
        </div>
          </div>
      @else
      <div class="alert alert-info fade in alert-dismissable">
        <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
        <strong>Info!</strong> 
        Not Found Member   
      </div>
      @endif
    </div>
    <div class="col-sm-6">
     @if($data['data']['duplicate'])
     <div class="panel panel-default">
            <div class="panel-heading">
              <div class="clearfix">
                <a href="" class="pull-left thumb-md avatar b-3x m-r">
                  <img style="height: 64px;" src="{{ URL::asset('/storage/img/member_img/'.$data['data']['duplicate']->photo)}}" alt="...">
                </a>
                <div class="clear">
                  <div class="h3 m-t-xs m-b-xs">
                    {{$data['data']['duplicate']->name}}
                    <i class="fa fa-circle text-success pull-right text-xs m-t-sm"></i>
                  </div>
                  <small class="text-muted">{{$data['data']['duplicate']->code}}</small>
                </div>
              </div>
            </div>
            <div class="hbox text-center b-b b-light text-sm" style="background: #fff;">          
          <a data-toggle="modal" href="#duplicate_member" class="col padder-v text-muted b-r b-light">
            <i class="icon-wallet block m-b-xs fa-2x"></i>
            <span>TCN 
              @isset ($data['data']['duplicate']->tcnmerge)
                ({{$data['data']['duplicate']->tcnmerge->count()}})
              @endisset
            </span>
          </a>
          <a href="#duplicate_member_profile" data-toggle="modal" class="col padder-v text-muted">
            <i class="icon-user block m-b-xs fa-2x"></i>
            <span>VIEW PROFILE</span>
          </a>
        </div>
          </div>
    @else
      <div class="alert alert-info fade in alert-dismissable">
        <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
        <strong>Info!</strong> 
        Not Found Member   
      </div>
    @endif

    </div>
    <div class="col-sm-4 col-sm-offset-4">
      <form id="mergeupdate" action="{{URL::to('/')}}/admin/merge/{{$data['data']['original']->userId}}" data-duplicate="{{$data['data']['duplicate']->userId}}" data-original="{{$data['data']['original']->userId}}" method="post" accept-charset="utf-8">
      <button type="submit" class="btn btn-success btn-lg btn-block" 
     @if(!$data['data']['original'])
     {{'disabled=true'}}
     @elseif(!$data['data']['duplicate'])
     {{'disabled=true'}}
     @elseif($data['data']['duplicate']->tcnmerge->count()==0)
     {{'disabled'}}
     @endif
      ><i class="fa fa-chain pull-right"></i> Merge Member</button>
      </form>
    </div>
  </div>

  </div>
  @endif
</div>



<!-- Modal original -->
<div id="original_member" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">TCN @isset ($data['data']['original']->tcnmerge)
                ({{$data['data']['original']->tcnmerge->count()}}) - {{$data['data']['original']->code}}
              @endisset</h4>
      </div>
      @isset ($data['data']['original']->tcnmerge)
      <table class="table">
    <thead>
      <tr>
        <th>#</th>
        <th>TCN Code</th>
        <th>TCN</th>
        <th>Unit</th>
        <th>Amount</th>
        <th>Currency Type</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($data['data']['original']->tcnmerge as $key => $element)
      <tr>
        <td>{{$key+1}}</td>
        <td>{{$element->tcnCode}}</td>
        <td>{{$element->tcn->tcnType}}</td>
        <td>{{$element->unit}}</td>
        <td>{{$element->amount}}</td>
        <td>{{$element->currencyType}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
      @endisset
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!-- End Modal original -->

<!-- Modal duplicate -->
<div id="duplicate_member" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">TCN @isset ($data['data']['duplicate']->tcnmerge)
                ({{$data['data']['duplicate']->tcnmerge->count()}}) - {{$data['data']['duplicate']->code}}
              @endisset</h4>
      </div>
      @isset ($data['data']['duplicate']->tcnmerge)
      <table class="table">
    <thead>
      <tr>
        <th>#</th>
        <th>TCN Code</th>
        <th>TCN</th>
        <th>Unit</th>
        <th>Amount</th>
        <th>Currency Type</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($data['data']['duplicate']->tcnmerge as $key => $element)
      <tr>
        <td>{{$key+1}}</td>
        <td>{{$element->tcnCode}}</td>
        <td>{{$element->tcn->tcnType}}</td>
        <td>{{$element->unit}}</td>
        <td>{{$element->amount}}</td>
        <td>{{$element->currencyType}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
      @endisset
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!-- End Modal duplicate -->

<!-- Modal duplicate -->
<div id="original_member_profile" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">@isset ($data['data']['original']) {{$data['data']['original']->name}} - {{$data['data']['original']->code}}
              @endisset</h4>
      </div>
       @isset ($data['data']['original'])

      <table class="table">
    <tbody>
      <tr>
        {{-- <td>Application No</td>
        <th>{{$data['data']['original']->app_no}}</th> --}}
        <td>Father's Name/Husband's Name</td>
        <th>{{$data['data']['original']->guardian}}</th>
      </tr>
      <tr>
        <td>Gender</td>
        <th>{{$data['data']['original']->gender}}</th>
        <td>Date of Birth</td>
        <th>{{$data['data']['original']->dob}}</th>
      </tr>
      <tr>
        <td>Religion</td>
        <th>{{$data['data']['original']->religion}}</th>
        <td>Caste</td>
        <th>{{$data['data']['original']->caste}}</th>
      </tr>
      <tr>
        <td>Education</td>
        <th>{{$data['data']['original']->education}}</th>
        <td>Occupation</td>
        <th>{{$data['data']['original']->occupation}}</th>
      </tr>
      <tr>
        <td>Country</td>
        <th>{{$data['data']['original']->country->countryName}}</th>
        <td>Mobile No</td>
        <th>{{$data['data']['original']->mobileId}} {{$data['data']['original']->mobileNo}}</th>
      </tr>
      <tr>
        <td>Email</td>
        <th>{{$data['data']['original']->email}}</th>
        <td>Marital Status</td>
        <th>{{$data['data']['original']->maritalStatus}}</th>
      </tr>
    </tbody>
  </table>
   @endisset
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!-- End Modal duplicate -->

<!-- Modal duplicate -->
<div id="duplicate_member_profile" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">  @isset ($data['data']['duplicate']) {{$data['data']['duplicate']->name}} - {{$data['data']['duplicate']->code}}
              @endisset</h4>
      </div>
       @isset ($data['data']['duplicate'])
      <table class="table">
    <tbody>
      <tr>
        <td>Father's Name/Husband's Name</td>
        <th>{{$data['data']['duplicate']->guardian}}</th>
        <td>Gender</td>
        <th>{{$data['data']['duplicate']->gender}}</th>
      </tr>
      <tr>
        <td>Date of Birth</td>
        <th>{{$data['data']['duplicate']->dob}}</th>
        <td>Religion</td>
        <th>{{$data['data']['duplicate']->religion}}</th>
      </tr>
      <tr>
        <td>Caste</td>
        <th>{{$data['data']['duplicate']->caste}}</th>
        <td>Education</td>
        <th>{{$data['data']['duplicate']->education}}</th>
      </tr>
      <tr>
        <td>Occupation</td>
        <th>{{$data['data']['duplicate']->occupation}}</th>
        <td>Country</td>
        <th>{{$data['data']['duplicate']->country->countryName}}</th>
      </tr>
      <tr>
        <td>Mobile No</td>
        <th>{{$data['data']['duplicate']->mobileId}} {{$data['data']['duplicate']->mobileNo}}</th>
        <td>Email</td>
        <th>{{$data['data']['duplicate']->email}}</th>
      </tr>
      <tr>
        <td>Marital Status</td>
        <th>{{$data['data']['duplicate']->maritalStatus}}</th>
        <td></td>
        <th></th>
      </tr>
    </tbody>
  </table>
  @endisset
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!-- End Modal duplicate -->

{{-- 
@if (session()->has('data'))
      <div class="alert alert-info fade in alert-dismissable">
        <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
        <strong>Info!</strong> 
         
         @isset ($data['data']['original']->tcnmerge)

         @foreach ($data['data']['original']->tcnmerge as $element)
          {{$element->tcnCode}}
         @endforeach

         @endisset
         
      </div>
    @endif --}}
   @endsection
   @section('jquery')
   <script>
    $(function () {
      $('#mergeupdate').submit(function(e){
        e.preventDefault();
        $.post($(this).attr('action'),{
          _method:'PUT',
          _token:'{{csrf_token()}}',
          original:$(this).attr('data-original'),
          duplicate:$(this).attr('data-duplicate')
        },function(o){
          if(o.result){
            swal("Good job!", o.message, "success");
          }else{
            swal("Warning!", o.message, "danger");
          }

        },'json');
        
      })
    })
   </script>
   @endsection