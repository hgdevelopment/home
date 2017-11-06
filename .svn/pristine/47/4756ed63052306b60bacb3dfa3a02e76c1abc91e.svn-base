@extends('admin.layout.erp')

{{-- @section('banner')
<div class="col-lg-12" align="center" style="background-color:#ffcf29">
            <img src="{{ URL::asset('new_heading.png') }}" class="img-responsive">
         </div>
@endsection --}}

@section('sidebar')

@include('admin.partial.header')

@include('admin.partial.aside')

@endsection

@section('body')

            <div class="bg-light lter b-b wrapper-md">
               <h1 class="m-n font-thin h3">Notification</h1>
            </div> 
			<div class="wrapper-md" ng-controller="FormDemoCtrl">


            <div ui-view="" class="ng-scope">
<div ng-controller="MailListCtrl" class="ng-scope">
  <!-- header -->
  <style type="text/css">
    .wrapper .btn-group .pagination {
          margin: 0px;
    }
  </style>
  <div class="wrapper bg-light lter b-b">
    <div class="btn-group pull-right">
    {{auth('admin')->user()->notifications()->paginate(10)->links()}}
     
    </div>
    <div class="btn-toolbar">
      {{-- <div class="btn-group dropdown">
        <button class="btn btn-default btn-sm btn-bg dropdown-toggle" data-toggle="dropdown">
          <span class="dropdown-label">Filter</span>                    
          <span class="caret"></span>
        </button>
        <ul class="dropdown-menu text-left text-sm">
          <li><a ui-sref="app.mail.list({fold:'unread'})" href="#/app/mail/inbox/unread">Unread</a></li>
          <li><a ui-sref="app.mail.list({fold:'starred'})" href="#/app/mail/inbox/starred">Starred</a></li>
        </ul>
      </div>
      <div class="btn-group">
        <button class="btn btn-sm btn-bg btn-default" data-toggle="tooltip" data-placement="bottom" data-title="Refresh" data-original-title="" title=""><i class="fa fa-refresh"></i></button>
      </div> --}}
    </div>
  </div>
  <!-- / header -->

  <!-- list -->
  <ul class="list-group list-group-lg no-radius m-b-none m-t-n-xxs">
   @foreach(auth('admin')->user()->notifications()->paginate(10) as $note)
    <li ng-repeat="mail in mails | filter:fold" ng-class="labelClass(mail.label)" class="list-group-item clearfix b-l-3x ng-scope b-l-info" style="background: {{ $note->read_at == null ? '#efefef' : '#fff' }}">
      <a ui-sref="app.page.profile" class="avatar thumb pull-left m-r" href="#/app/page/profile">
        <img  src="{{ URL::to('/') }}/public/img/notification.jpg">
      </a>
      <div class="pull-right text-sm text-muted">
        <span class="hidden-xs ng-binding">{{$note->created_at->diffForHumans()}}</span>
        
      </div>
      <div class="clear">
        <div><a class="text-md ng-binding" href="{{ URL::to('/').$note->data['url'] }}">{!! $note->data['message'] !!}</a><span class="label  {{ $note->read_at == null ? 'bg-info' : 'bg-success' }}  m-l-sm ng-binding">{{ $note->read_at == null ? 'Unread' : 'Read' }}</span></div>
        {{-- <div class="text-ellipsis m-t-xs ng-binding">{!! $note->data['message'] !!}</div> --}}
      </div>      
    </li>
  @endforeach
  </ul>
  <!-- / list -->
</div></div>



			</div>



@endsection

@section('jquery')

@endsection