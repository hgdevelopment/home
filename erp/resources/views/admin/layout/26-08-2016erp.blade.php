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
  <link rel="stylesheet" href="{{ URL::asset('libs/jquery/bootstrap/dist/css/bootstrap.css') }}" type="text/css" />
  <link rel="stylesheet" href="{{ URL::asset('css/datatables.css') }}" type="text/css" />

  <link rel="stylesheet" href="{{ URL::asset('css/font.css') }}" type="text/css" />



  <link rel="stylesheet" media='screen and (min-width: 0px) and (max-width: 600px)' href="{{ URL::asset('css/mobileapp.css') }}" type="text/css" />
  <link rel="stylesheet" media='screen and (min-width: 600px)' href="{{ URL::asset('css/app.css') }}" type="text/css" />

  <link rel="stylesheet" href="{{ URL::asset('css/iziToast.min.css') }}" type="text/css" />

  <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="{{ URL::asset('css/bootstrap-select.min.css') }}">
  <script src="{{ URL::asset('libs/jquery/jquery/dist/jquery.js') }}"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="{{ URL::asset('js/bootstrap-select.min.js') }}"></script>
<script src="{{ URL::asset('js/defaults-en_US.min.js') }}"></script>
<!-- (Optional) Latest compiled and minified JavaScript translation files -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/i18n/defaults-*.min.js"></script>



  <script src="{{ URL::asset('js/datatables.js') }}"></script>
  <script src="{{ URL::asset('js/notify.js') }}"></script>
  
  <style type="text/css">
    .errorg{
     background: #d8fdd8;
    }
    .errorr{
     background: #ffd9d9;
    }
  </style>


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
      
{{-- <select class="selectpicker" data-live-search="true">
  <option data-tokens="ketchup mustard">Hot Dog, Fries and a Soda</option>
  <option data-tokens="mustard">Burger, Shake and a Smile</option>
  <option data-tokens="frosting">Sugar, Spice and all things nice</option>
</select> --}}


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
<script src="{{ URL::asset('js/iziToast.min.js') }}"></script>
<script src="{{ URL::asset('js/parsley.min.js') }}"></script>

<script type="text/javascript">
$.notify("I'm to the right of this box", { position:"bottom right" });
$.notify("I'm to the right of this box", { position:"bottom right" });

$('.selectpicker').selectpicker({
  style: 'btn-info',
  size: 4
});


</script>
@section('jquery')
@show

</body>
</html>
