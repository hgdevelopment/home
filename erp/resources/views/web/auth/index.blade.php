<html lang="en" data-ng-app="app" class="ng-scope">
<head>
  <meta charset="utf-8">
  <title>HEERA ERP</title>
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <link rel="stylesheet" href="{{ URL::asset('libs/assets/animate.css/animate.css') }}" type="text/css">
  <link rel="stylesheet" href="{{ URL::asset('libs/assets/font-awesome/css/font-awesome.min.css') }}" type="text/css">
  <link rel="stylesheet" href="{{ URL::asset('libs/assets/simple-line-icons/css/simple-line-icons.css') }}"" type="text/css">
  <link rel="stylesheet" href="{{ URL::asset('libs/jquery/bootstrap/dist/css/bootstrap.css') }}" type="text/css">
  
  <link rel="stylesheet" href="{{ URL::asset('css/app.min.css') }}">
<style type="text/css" media="screen">
  .m-b-lg {
   display: block;
   margin: 0 auto;
}
@media (min-width: 320px) {
    .m-b-lg {
    width: 290px;
}
}
	@media (min-width: 768px) {
    .m-b-lg {
    width: 430px;
}
}
</style>
</head>
<body>
<div class="container">
 <div class="app ng-scope app-header-fixed" id="app">
  <a href="" class="navbar-brand block m-t ng-binding">HEERA ERP</a>
  <div class="m-b-lg">
    <div class="wrapper text-center">
      <strong>Sign in to get in touch</strong>
    </div>
    <form name="form" class="form-validation ng-pristine ng-valid-email ng-invalid ng-invalid-required" method="post" action="{{ route('login') }}">
      {{ csrf_field() }}
      <div class="text-danger wrapper text-center ng-binding ng-hide" ng-show="authError" aria-hidden="true">
          
      </div>
      <div class="list-group list-group-sm">
         @if (session()->has('message'))
              <div class="alert alert-info fade in alert-dismissable">
                <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
                <strong>Info!</strong> {{session()->get('message')}}
            </div>
            @endif
        <div class="list-group-item {{ $errors->has('username') ? ' has-error' : '' }}">
          <input type="text" placeholder="Username" class="form-control no-border ng-pristine ng-valid-email ng-invalid ng-invalid-required ng-touched"  id="username" name="username"  value="{{ old('username') }}">
           @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
          @endif
        </div>
        <div class="list-group-item">
           <input type="password" placeholder="Password" class="form-control no-border"  id="password" name="password">
           @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
        </div>
         <div class="list-group-item">
          <input type="checkbox" checked="checked" name="remember" id="remember" {{ old('remember')? 'checked':'' }}> Remember me
         
        </div>
      </div>
      <button type="submit" class="btn btn-lg btn-primary btn-block" >Log in</button>
      <div class="text-center m-t m-b"><a  href="#">Forgot password?</a></div>
      <div class="line line-dashed"></div>
      <p class="text-center"><small>Do not have an account?</small></p>
      <a href="#" class="btn btn-lg btn-default btn-block" >Create an account</a>
      <a href="web/member/create" class="btn btn-lg btn-default btn-block" >Member Registration</a>
    </form>
  </div>
  <!-- ngInclude: 'tpl/blocks/page_footer.html' --><div class="text-center ng-scope" ng-include="'tpl/blocks/page_footer.html'"><p class="ng-scope">
  <small class="text-muted"><br>© 2017</small>
</p></div>

</div>

</body></html>