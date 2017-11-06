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
        <div class="panel-heading">HEERA PAYMENT DETAILS {{-- <a href="#" class="pull-right" data-toggle="modal" data-target="#profile_details"><i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i> Edit</a> --}}</div>
         
        <table class="table table-striped m-b-none" style="background: #f3f3f3;">
          <tbody>
            <tr>   
            <td>HEERA's ACCOUNT NO/IBAN No</td>
              <th>
               {{$tcnDetails->heeraaccount->accountNumber}}
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
               {{$tcnDetails->country->countryName}}
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
        <div class="panel-heading">BENEFIT REMITTANCE {{-- <a href="#" class="pull-right" data-toggle="modal" data-target="#profile_details"><i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i> Edit</a> --}}</div>
         
        <table class="table table-striped m-b-none" style="background: #f3f3f3;">
          <tbody>
            <tr>  
           
              <td>Name of Bank</td>
              <th>
                {{$tcnDetails->benefit->bankName}}
              </th>
              <td>Bank Account No.</td>
              <th>
                 {{$tcnDetails->benefit->accountNumber}}
              </th>
            </tr>
            <tr>   
            <td>Branch</td>
              <th>
                 {{$tcnDetails->benefit->branchName}}
              </th> 
              <td>IFSC</td>
              <th>
                {{$tcnDetails->benefit->ifsc}}
              </th>
            </tr>
            <tr>   
            <td>Account Holder Name</td>
              <th>
                {{$tcnDetails->benefit->accountHolderName}}
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
      <div class="panel panel-warning">
        <div class="panel-heading">NOMINEE DETAILS(1) {{-- <a href="#" class="pull-right" data-toggle="modal" data-target="#profile_details"><i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i> Edit</a> --}}</div>
         
        <table class="table table-striped m-b-none" style="background: #f3f3f3;">
          <tbody>
          <tr> 

              <th colspan="4">
                  <img src="{{ URL::asset('/storage/img/nominee/'.$tcnDetails->nominee_one->uploadPhoto)}}" class="img-thumbnail" alt="" style="width: 150px;" /> &nbsp;
                     <img src="{{ URL::asset('/storage/img/nominee/'.$tcnDetails->nominee_one->signature)}}" class="img-thumbnail" alt="" style="width: 120px;" />
                 
              </th>


              {{-- <th colspan="2">
                 <img src="{{ URL::asset('/img/nominee/'.$tcnDetails->nominee->signature)}}" class="img-thumbnail" alt="" style="width: 120px;" />
              </th> --}} 
            </tr>

            <tr>  
           
              <td>Name of Nominee</td>
              <th>
                {{$tcnDetails->nominee_one->name}}
              </th>
              <td>Date of Birth</td>
              <th>
                 {{$tcnDetails->nominee_one->dob}}
              </th>
            </tr>
            <tr>   
            <td>Relation with the Applicant</td>
              <th>
                 {{$tcnDetails->nominee_one->relationWithApplicant}}
              </th> 
              <td>Gender</td>
              <th>
                {{$tcnDetails->nominee_one->gender}}
              </th>
            </tr>
            <tr>   
            <td>Address</td>
              <th>
                {{$tcnDetails->nominee_one->address->address}}
              </th> 
              <td>City</td>
              <th>
                {{$tcnDetails->nominee_one->address->city}}
              </th> 
            </tr>
            <tr> 
            <td>State</td>
              <th>
                 {{$tcnDetails->nominee_one->address->state}}
              </th>   
            <td>Pin</td>
              <th>
                {{$tcnDetails->nominee_one->address->pin}}
              </th> 
              
            </tr>
            <tr>   
            <td>Mobile No.</td>
              <th>
                {{$tcnDetails->nominee_one->mobile}}
              </th> 
            <td>Email</td>
              <th>
                {{$tcnDetails->nominee_one->email}}
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
        <div class="panel-heading">NOMINEE PROOF(1) {{-- <a href="#" class="pull-right" data-toggle="modal" data-target="#profile_details"><i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i> Edit</a> --}}</div>
         <table class="table table-striped m-b-none" style="background: #f3f3f3;">
          <tbody>
            <tr>  
           
              <td>Type of proof</td>
              <th>
                {{$tcnDetails->nominee_one->proof->typeOfProof}}
              </th>
              <td>ID Number</td>
              <th>
                 {{$tcnDetails->nominee_one->proof->proofNumber}}
              </th>
            </tr>
            <tr>   
          
              <td>Proof</td>
              <th>
              <img src="{{ URL::asset('/storage/img/proof/'.$tcnDetails->nominee_one->proof->file)}}" class="img-thumbnail" alt="" style="width: 120px;" />
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
      <div class="panel panel-warning">
        <div class="panel-heading">NOMINEE DETAILS(2) {{-- <a href="#" class="pull-right" data-toggle="modal" data-target="#profile_details"><i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i> Edit</a> --}}</div>
         
        <table class="table table-striped m-b-none" style="background: #f3f3f3;">
          <tbody>
          <tr> 

              <th colspan="4"> 
                  <img src="{{ URL::asset('/storage/img/nominee/'.$tcnDetails->nominee_two->uploadPhoto)}}" class="img-thumbnail" alt="" style="width: 150px;" /> &nbsp;
                     <img src="{{ URL::asset('/storage/img/nominee/'.$tcnDetails->nominee_two->signature)}}" class="img-thumbnail" alt="" style="width: 120px;" />
                 
              </th>


              {{-- <th colspan="2">
                 <img src="{{ URL::asset('/img/nominee/'.$tcnDetails->nominee->signature)}}" class="img-thumbnail" alt="" style="width: 120px;" />
              </th> --}}
            </tr>

            <tr>  
           
              <td>Name of Nominee</td>
              <th>
                {{$tcnDetails->nominee_two->name}}
              </th>
              <td>Date of Birth</td>
              <th>
                 {{$tcnDetails->nominee_two->dob}}
              </th>
            </tr>
            <tr>   
            <td>Relation with the Applicant</td>
              <th>
                 {{$tcnDetails->nominee_two->relationWithApplicant}}
              </th> 
              <td>Gender</td>
              <th>
                {{$tcnDetails->nominee_two->gender}}
              </th>
            </tr>
            <tr>   
            <td>Address</td>
              <th>
                {{$tcnDetails->nominee_two->address->address}}
              </th> 
              <td>City</td>
              <th>
                {{$tcnDetails->nominee_two->address->city}}
              </th> 
            </tr>
            <tr> 
            <td>State</td>
              <th>
                 {{$tcnDetails->nominee_two->address->state}}
              </th>   
            <td>Pin</td>
              <th>
                {{$tcnDetails->nominee_two->address->pin}}
              </th> 
              
            </tr>
            <tr>   
            <td>Mobile No.</td>
              <th>
                {{$tcnDetails->nominee_two->mobile}}
              </th> 
            <td>Email</td>
              <th>
                {{$tcnDetails->nominee_two->email}}
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
        <div class="panel-heading">NOMINEE PROOF(2) {{-- <a href="#" class="pull-right" data-toggle="modal" data-target="#profile_details"><i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i> Edit</a> --}}</div>
         <table class="table table-striped m-b-none" style="background: #f3f3f3;">
          <tbody>
            <tr>  
           
              <td>Type of proof</td>
              <th>
                {{$tcnDetails->nominee_two->proof->typeOfProof}}
              </th>
              <td>ID Number</td>
              <th>
                 {{$tcnDetails->nominee_two->proof->proofNumber}}
              </th>
            </tr>
            <tr>   
          
              <td>Proof</td>
              <th>
              <img src="{{ URL::asset('/storage/img/proof/'.$tcnDetails->nominee_two->proof->file)}}" class="img-thumbnail" alt="" style="width: 120px;" />
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
      <div class="panel panel-warning">
        <div class="panel-heading">SUPPORTING DOCUMENTS {{-- <a href="#" class="pull-right" data-toggle="modal" data-target="#profile_details"><i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i> Edit</a> --}}</div>
         
        <table class="table table-striped m-b-none" style="background: #f3f3f3;">
          <tbody>
            <tr>   
              <th>
              <img src="{{ URL::asset('/storage/img/tcndocs/'.$tcnDetails->doc1)}}" class="img-thumbnail" alt="" style="width: 150px;" />
             <br/>  <span class="help-block m-b-none">(Upload passbook/cancelled cheque/bank statement.)</span>
              </th>
            <th>
              <img src="{{ URL::asset('/storage/img/tcndocs/'.$tcnDetails->doc2)}}" class="img-thumbnail" alt="" style="width: 150px;" /><br/>
              (Upload Transfer statement proof.)
              </th>
              <th>
              <img src="{{ URL::asset('/storage/img/tcndocs/'.$tcnDetails->doc3)}}" class="img-thumbnail" alt="" style="width: 150px;" /><br/>
              (Upload Transaction proof/cheque proof/online transfer screenshot.)
              </th>
            </tr>
          </tbody>
        </table>
          
      </div>
    </div>
    </div>
@include('web.partial.profilefooter')

             





@endsection

@section('jquery')

@endsection