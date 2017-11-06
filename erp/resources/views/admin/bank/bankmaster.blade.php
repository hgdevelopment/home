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
  <div class="bg-light lter b-b wrapper-md">
    <h1 class="m-n font-thin h3">Bank Account Master</h1>
  </div>
  <div class="wrapper-md" ng-controller="FormDemoCtrl">
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading font-bold">ADD ACCOUNT</div>
          <div class="panel-body">
            @if (trim($__env->yieldContent('edit_id')))
            <form role="form" method="post" action="{{URL::to('/') }}/admin/bankmaster/@yield('edit_id')" enctype="multipart/form-data" data-parsley-validate>
            @else
            <form role="form" method="post" action="{{URL::to('/') }}/admin/bankmaster" enctype="multipart/form-data" data-parsley-validate>
             @endif
              {{ csrf_field() }}
              @section('edit')
              @show
              <div class="col-md-12">
                <div class="col-md-4">
                  <label>BANK NAME*</label>
                  <input type="text" name="bank_name" class="form-control" value="@yield('bank_name')" placeholder="Enter Bank Name" required data-parsley-required-message="Please Enter Bank Name">
                  @if ($errors->has('bank_name'))
                    <span class="help-inline">{{$errors->first('bank_name')}}</span>
                  @endif
                </div>
                <div class="col-md-4">
                  <label>ACCOUNT NUMBER*</label>
                  <input type="text" name="account_number" class="form-control" value="@yield('account_number')"  placeholder="Enter Account Number" required data-parsley-required-message="Please Enter Account Number">
                  @if ($errors->has('account_number'))
                    <span class="help-inline">{{$errors->first('account_number')}}</span>
                  @endif
                </div>
                <div class="col-md-4">
                  <label>BRANCH*</label>
                  <input type="text" name="branch" class="form-control" placeholder="Enter Branch" value="@yield('branch')" required data-parsley-required-message="Please Enter Branch">
                  @if ($errors->has('branch'))
                    <span class="help-inline">{{$errors->first('branch')}}</span>
                  @endif
                </div>
                <div class="col-md-12"><br></div>
                <div class="col-md-4">
                  <label>COUNTRY*</label>
                  <select  class="form-control" name="country" id="country" required data-parsley-required-message="Please Select Country">
                    <option value=""> SELECT COUNTRY</option>
                    @foreach ($country as $countrys)
                      <option value="{{$countrys->id}}" 
                      @if($__env->yieldContent('country')==$countrys->id) {{ 'selected' }} @endif>{{$countrys->countryName}}</option>
                    @endforeach
                  </select>
                  @if ($errors->has('country'))
                  <span class="help-inline">{{$errors->first('country')}}</span>
                  @endif
                </div>
                <div class="col-md-4">
                  <label>IFSC/Swift *</label>
                  <input type="text" value="@yield('ifsc')"  name="ifsc" class="form-control" placeholder="Enter Ifsc/swift Code" required data-parsley-required-message="Enter IFSC Code" data-parsley-type="alphanum" maxlength="11" minlength="11"  data-parsley-pattern="/^[A-Za-z]{4}\d{7}$/">
                  @if ($errors->has('ifsc'))
                    <span class="help-inline">{{$errors->first('ifsc')}}</span>
                  @endif
                </div>
                <div class="col-md-4">
                  <label>ACCOUNT HOLDER NAME*</label>
                  <input type="text" value="@yield('holderName')"  name="holderName" class="form-control" placeholder="Enter Holder Name" id="holderNmae" required data-parsley-required-message="Please Enter Name">
                  @if ($errors->has('holderName'))
                    <span class="help-inline">{{$errors->first('holderName')}}</span>
                  @endif
                </div>
                <div class="col-md-12"><br></div>
                <div class="col-md-4">
                <label>TYPE OF ACCOUNT*</label>
                <select  class="form-control" name="account_type" id="account_type" required data-parsley-required-message="Please Select Account Type">
                  <option value=""> SELECT TYPE </option>
                  <option value="Heera Account" @if(strtoupper($__env->yieldContent('account_type'))=='HEERA ACCOUNT') {{ 'selected' }} @endif>Heera Account</option>
                  <option value="TCN Benefit" @if(strtoupper($__env->yieldContent('account_type'))=='TCN BENEFIT') {{ 'selected' }} @endif>TCN Benefit Account</option>
                </select>
                @if ($errors->has('account_type'))
                  <span class="help-inline">{{$errors->first('account_type')}}</span>
                @endif
                </div>
                <div class="col-md-4">
                  <label>PLACE</label>
                  <input type="text" value="@yield('place')"  name="place" class="form-control" placeholder="Enter Place Name" id="place">
                </div>
                <div class="col-md-4">
                  <label>IBAN</label>
                  <input type="text" value="@yield('iban')"  name="iban" class="form-control" placeholder="Enter Iban Number" >
                </div>
                <div class="col-md-3 col-md-offset-5"><br>
                  <button class="btn btn-success" type="submit" value="submit" name="submit">Submit</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading font-bold">VIEW ACCOUNT</div>
            <div class="table-responsive" style="overflow-x: initial;">
            <table class="table table-striped b-t" id="dsaRequest">
            <thead>
              <tr>
                <th>Name</th>
                <th>Acc No</th>
                <th>Bank</th>
                <th>Branch</th>
                <th>Country</th>
                <th>IFSC Code</th>
                <th>IBAN No</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($bank as $banks)

                <tr data-expanded="true">
                  <td>@if(isset($banks->accountHolderName)){{ $banks->accountHolderName }} @endif</td>
                  <td>@if(isset($banks->accountNumber)){{ $banks->accountNumber }} @endif</td>
                  <td>@if(isset($banks->bankName)){{ $banks->bankName }} @endif</td>
                  <td>@if(isset($banks->branchName)){{ $banks->branchName }} @endif</td>
                  <td>@if(isset($banks->countryName)){{ $banks->countryName }} @endif</td>
                  <td>@if(isset($banks->ifsc)){{ $banks->ifsc }} @endif</td>
                  <td>@if(isset($banks->ibanNumber)){{ $banks->ibanNumber }} @endif</td>
                  <td>
                    <a href="{{ URL::to('/') }}/admin/bankmaster/{{ $banks->id }}/edit"  class="active"><i  style="color: #018001;" class="fa fa-pencil text-success text-active" aria-hidden="true"></i></a>
                    <form action="{{ URL::to('/') }}/admin/bankmaster/{{ $banks->id }}" method="POST" class="pull-right">
                      {{ method_field('DELETE') }}
                      {{ csrf_field() }}
                      <button class="active" style="border: none;"><i  style="color: #f05050;" class="fa fa-close text-danger text-active" aria-hidden="true"></i></button> 
                    </form>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table></div>
        </div>
      </div>
    </div>
    <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading font-bold">ALLOT ACCOUNT NUMBER FOR EACH TCN</div>
        <div class="panel-body">
          <form  action="{{URL::to('/') }}/admin/bankmasteradd" method="post" data-parsley-validate>
            {{ csrf_field() }}
            <div class="col-md-12">
              <div class="col-md-3">
                <label>TCN</label>
                <select name="tcn" id="tcn" class="form-control" required data-parsley-required-message="Please select TCN">
                  <option value=""> SELECT TCN</option>
                  @foreach ($tcnmaster as $tcnmasters)
                  <option value="{{$tcnmasters->tcnType}}">{{$tcnmasters->tcnType}}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-md-3">
                <label>CURRENCY</label>
                <select name="currency" id="currency" class="form-control" required data-parsley-required-message="Please select Currency">
                  <option value="">SELECT CURRENCY</option>
                  <option value="inr">INR</option>
                  <option value="aed">AED</option>
                  <option value="usd">USD</option>
                  <option value="sar">SAR</option>
                  <option value="cad">CAD</option>'
                </select>
              </div>
              <div class="col-md-3">
                <label>ACCOUNT NUMBER</label>
                <select name="account_number" id="account_number" class="form-control" required data-parsley-required-message="Please select Account No.">
                  <option value=""> SELECT ACCOUNT</option>
                  @foreach ($bank as $banks)
                  <option value="{{$banks->accountNumber}}">{{$banks->accountNumber}}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-md-3"><br>
                <button class="btn btn-success" type="submit" value="submit" name="submit">Submit</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    </div>
    <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading font-bold">VIEW ACCOUNT NUMBER OF EACH TCN</div>
        <table class="table" ui-jq="footable" ui-options='{
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
              <th>TCN</th>
              <th>CURRENCY TYPE</th>
              <th>ACCOUNT NUMBER</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($tcnallot as $tcn)

             <tr data-expanded="true">
             <td>{{ $tcn->tcnType}}</td>
             <td>{{ $tcn->currency_type }}</td>
        <td>{{ $tcn->accountNumber }}</td>
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
<script type="text/javascript">
  $(document).ready(function(){
  $('#dsaRequest').DataTable();
});
</script>

@endsection


