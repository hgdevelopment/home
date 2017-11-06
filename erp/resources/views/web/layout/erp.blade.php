<!DOCTYPE html>
<html lang="en" class="">
<head>
  <meta charset="utf-8" />
  <title>@yield('title') | HEERA ERP</title>
  <meta name="description" content="app, web app, responsive, responsive layout, admin, admin panel, admin dashboard, flat, flat ui, ui kit, AngularJS, ui route, charts, widgets, components" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <link rel="stylesheet" href="{{ URL::asset('libs/assets/animate.css/animate.css') }}" type="text/css" />
  <link rel="stylesheet" href="{{ URL::asset('libs/assets/font-awesome/css/font-awesome.min.css') }}" type="text/css" />
  <link rel="stylesheet" href="{{ URL::asset('libs/assets/simple-line-icons/css/simple-line-icons.css') }}" type="text/css" />
  <link rel="stylesheet" href="{{ URL::asset('css/bootstrap-datepicker.min.css') }}" type="text/css" />
  <link rel="stylesheet" href="{{ URL::asset('libs/jquery/bootstrap/dist/css/bootstrap.css') }}" type="text/css" />
   <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="{{ URL::asset('css/sweetalert.css') }}" type="text/css" />
  <link rel="stylesheet" href="{{ URL::asset('css/chosen.css') }}" type="text/css" />
  <link rel="stylesheet" href="{{ URL::asset('css/font.css') }}" type="text/css" />
  <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}" type="text/css" />
  <script src="{{ URL::asset('libs/jquery/jquery/dist/jquery.js') }}"></script>
 {{--  <link rel="stylesheet" href="{{ URL::asset('css/datatables.css') }}" type="text/css" /> --}}
  {{-- <script src="{{ URL::asset('js/datatables.js') }}"></script> --}}
</head>
<body>
<div class="app app-header-fixed container">
  

  <!-- header -->
  @section('sidebar')
  @show
  
  <!-- / aside -->


  <!-- content -->
  <div id="content" class="app-content" role="main">

  @section('banner')
  @show

  <div class="app-content-body ">


  @section('body')
  @show
      


  </div>
  </div>
  <!-- /content -->
  
  <!-- footer -->
    @include('partial.footer')
  <!-- / footer -->



</div>


<script src="{{ URL::asset('libs/jquery/bootstrap/dist/js/bootstrap.js') }}"></script>
<script src="{{ URL::asset('js/ui-load.js') }}"></script>
<script src="{{ URL::asset('js/ui-jp.config.js') }}"></script>
<script src="{{ URL::asset('js/ui-jp.js') }}"></script>
<script src="{{ URL::asset('js/ui-nav.js') }}"></script>
<script src="{{ URL::asset('js/ui-toggle.js') }}"></script>
<script src="{{ URL::asset('js/ui-client.js') }}"></script>
<script src="{{ URL::asset('js/sweetalert.min.js') }}"></script>
<script src="{{ URL::asset('js/parsley.min.js') }}"></script>
<script src="{{ URL::asset('js/chosen.jquery.js') }}"></script>
<script src="{{ URL::asset('js/bootstrap-datepicker.min.js') }}"></script>
 <script src="{{ URL::asset('js/jquery.dataTables.min.js') }}"></script>
  <script src="{{ URL::asset('js/dataTables.bootstrap.js') }}"></script>


@section('jquery')
@show

</body>
</html>
