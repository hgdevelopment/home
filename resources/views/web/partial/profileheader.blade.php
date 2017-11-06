<div  class="fade-in-down ng-scope"><div class="hbox hbox-auto-xs hbox-auto-sm ng-scope">
  <div class="col">
    <div style="background:url({{ URL::asset('img/bannerheera.jpg') }}) center center; background-size:cover">
      <div class="wrapper-lg bg-white-opacity">
        <div class="row m-t">
        <form class="form-horizontal" id="upload" enctype="multipart/form-data" method="post" action="{{ URL::asset('/')}}web/changeimg" autocomplete="off">
         {{ csrf_field() }}
          <div class="col-sm-6">
            <a href="#" class="thumb-lg pull-left m-r" id="click_img_container">
              <img src="{{ URL::asset('/storage/img/member_img/'.$userProfile->photo)}}" class="img-circle img-circle-hover" width="96" height="96" style="width:96px;height: 96px;">
             {{--  <input type="file" name="avatar_img" id="avatar_img" /> --}}
              <style type="text/css" media="screen">
              #click_img_container{
                position:relative;
              }
                #avatar_img{
                          opacity:0;
                          position:absolute;
                          top:0;
                          left:0;
                          width:100%;
                          height:100%;
                }
                #change_img{
                  position: absolute;
                  top: 0px;
                  background: rgba(0, 0, 0, 0.4);
                  width:100%;
                  height:100%;
                  border-radius: 50%;
                  padding-top: 45%;
                  text-align: center;
                  color: #fff;
                }
                
              </style>
            </a>
            <div class="clear m-b">
              <div class="m-b m-t-sm">
                <span class="h3 text-black">{{$userProfile->name}}</span>
                <small class="m-l" style="font-size: 14px;
                                          font-weight: 600;">{{$userProfile->code}}</small>
              </div>
              {{-- <p class="m-b">
                <a href="" class="btn btn-sm btn-bg btn-rounded btn-default btn-icon"><i class="fa fa-twitter"></i></a>
                <a href="" class="btn btn-sm btn-bg btn-rounded btn-default btn-icon"><i class="fa fa-facebook"></i></a>
                <a href="" class="btn btn-sm btn-bg btn-rounded btn-default btn-icon"><i class="fa fa-google-plus"></i></a>
              </p>
              <a href="" class="btn btn-sm btn-success btn-rounded">Follow</a> --}}
            </div>


          </div>
          </form>
          <div class="col-sm-6">
            <div class="pull-right pull-none-xs text-center">
              <a href="" class="m-b-md inline m warning">
                <span class="h3 block font-bold">{{isset($tcnStatus['Pending'])?count($tcnStatus['Pending']):'0'}}</span>
                <small>Pending TCN</small>
              </a>
              <a href="" class="m-b-md inline m success">
                <span class="h3 block font-bold">{{isset($tcnStatus['Approved'])?count($tcnStatus['Approved']):'0'}}</span>
                <small>Active TCN</small>
              </a>
              <a href="" class="m-b-md inline m danger">
                <span class="h3 block font-bold">{{isset($tcnStatus['Denied'])?count($tcnStatus['Denied']):'0'}}</span>
                <small>Denied TCN</small>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="wrapper bg-white b-b">
      <ul class="nav nav-pills nav-sm">
        <li  {{ (Request::is('web/dashboard')==true) ? 'class=active' : '' }} ><a href="{{ route('web.dashboard') }}">Dashboard</a></li>
        <li {{ (Request::is('web/profile')==true) ? 'class=active' : '' }}><a href="{{ route('web.profile') }}">Profile</a></li>
        
        <li {{ (Request::is('web/tcn')==true || preg_split("/\//", Request::url())[4]=='tcndetails') ? 'class=active' : '' }}><a href="{{ route('web.tcninfo') }}">TCN Status</a></li>
      </ul>
    </div>
 <div class="padder" style="padding-top: 15px;">  
<script src="{{ URL::asset('js/jquery.form.js') }}"></script>
<script >
  $(function(){

     var options = { 
                beforeSubmit:  showRequest,
    success:showResponse,
    dataType: 'json' 
        }; 

     $('#avatar_img').hover(function(){
        $(this).before('<div id="change_img">Change Image</div>');
         
     },function(){   
      $('#change_img').remove();  
     });
     $('#avatar_img').change(function(){
      $('#change_img').remove();  
      $('#avatar_img').before('<div id="change_img">Change Image</div>');
      $('#change_img').html('<i class="fa fa-spinner fa-spin fa-2x fa-fw"></i>');

      $('#upload').ajaxForm(options).submit(); 
     

       // /$('#change_img').remove();   
     });
  });

  function showRequest(formData, jqForm, options) { 
  $("#validation-errors").hide().empty();
  $("#output").css('display','none');
    return true; 
} 
function showResponse(response, statusText, xhr, $form)  { 
  if(response.success == false)
  {
    var arr = response.errors;
     setTimeout(function(){
        $('#change_img').remove();   
      },500);
  } else {
    var file='{{ URL::asset('/img/member_img/')}}/'+response.file;
    $('.img-circle-hover').attr('src',file);
      setTimeout(function(){
        $('#change_img').remove();   
      },500);
  }
}
 
</script>

