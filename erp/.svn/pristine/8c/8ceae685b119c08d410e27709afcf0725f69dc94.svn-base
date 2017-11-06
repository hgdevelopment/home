@extends('web.layout.erp')
{{-- @section('banner')
<div class="col-lg-12" align="center" style="background-color:#ffcf29">
            <img src="{{ URL::asset('new_heading.png') }}" class="img-responsive">
         </div>
@endsection --}}

@section('sidebar')

@include('web.partial.header')
@include('web.partial.aside')

@endsection

@section('body')
{{-- 
            <div class="bg-light lter b-b wrapper-md">
               <h1 class="m-n font-thin h3">Profile</h1>
            </div> --}}
@include('web.partial.profileheader')
  <form role="form" method="post" action="{{URL::to('/') }}/web/tcnwithDrawal">
  {{ csrf_field() }}
  <div class="row">
    <div class="col-md-12">
      <div class="row row-sm text-center">
        <div class="col-xs-6">
          <a href="#" class="block panel padder-v bg-primary item">
            <span class="text-white font-thin h1 block">{{$tcnDetails->tcn->tcnType}}</span>
            <span class="text-muted text-xs">TCN</span>
            <span class="bottom text-right w-full">
              <i class="fa fa-cloud-upload text-muted m-r-sm"></i>
            </span>
          </a>
        </div>
        <div class="col-xs-6">
          <a href="#" class="block panel padder-v bg-info item">
            <span class="text-white font-thin h1 block">{{$tcnDetails->status}}</span>
            <span class="text-muted text-xs">Status</span>
            <span class="top">
              <i class="fa fa-caret-up text-warning m-l-sm m-r-sm"></i>
            </span>
          </a>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
      <div class="col-sm-12">
      <div class="panel panel-warning">
        <div class="panel-heading">TCN DETAILS</div>
         
        <table class="table table-striped m-b-none" style="background: #f3f3f3;">
          <tbody>
            <tr>   
            <td>Member Code</td>
              <th>
               {{$userProfile->code}}
              </th>
           
              <td>Currency</td>
              <th>
                {{$tcnDetails->currencyType}}
              </th>
            </tr>
            <tr>   
            <td>No of Units</td>
              <th>
                 {{$tcnDetails->unit}}
              </th> 
              <td>Amount</td>
              <th>
                {{$tcnDetails->amount}}
              </th>
            </tr>
            <tr>   
            <td>Pay Mode</td>
              <th>
                {{$tcnDetails->paymentMode}}
              </th> 
              <td>Deposit Date</td>
              <th>
                {{$tcnDetails->depositeDate}}
              </th>
            </tr>
            <tr>   
            <td>DD/Cheque/UTR/Ref.</td>
              <th>
                {{$tcnDetails->transactionNumber}}
              </th> 
              <td>Applying From</td>
              <th>
               {{$country->countryName}}
              </th>
            </tr>
          </tbody>
        </table>
          
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-12">
      <div class="panel panel-warning">
        <div class="panel-heading">ACCOUNT DETAILS FOR PAYMENT </div>
         
        <table class="table table-striped m-b-none" style="background: #f3f3f3;">
          <tbody>
            <tr>  
           
              <td>Name of Bank</td>
              <th>
                {{$bank->bankName}}
              </th>
              <td>Bank Account No.</td>
              <th>
                 {{$bank->accountNumber}}
              </th>
            </tr>
            <tr>   
            <td>Branch</td>
              <th>
                 {{$bank->branchName}}
              </th> 
              <td>IFSC</td>
              <th>
                {{$bank->ifsc}}
              </th>
            </tr>
            <tr>   
            <td>Account Holder Name</td>
              <th>
                {{$bank->accountHolderName}}
              </th> 
              <td></td>
              <th>
                
              </th> 
            </tr>
          </tbody>
        </table>      
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-12">
      <div class="panel panel-danger text-center">
        <div class="panel-heading">
        <input type="hidden" name="tcnId" value="{{$tcnDetails->id}}">
        <input type="hidden" name="userId" value="{{$tcnDetails->userId}}">
        <input type="hidden" name="unit" value="{{$tcnDetails->unit}}">
        <input type="hidden" name="amount" value="{{$tcnDetails->amount}}">

        <input type="submit" value="Send With Draw Request" class="btn btn-primary">
        </div>
      </div>
    </div>
  </div>

</form>
@include('web.partial.profilefooter')

             





@endsection

@section('jquery')

@endsection