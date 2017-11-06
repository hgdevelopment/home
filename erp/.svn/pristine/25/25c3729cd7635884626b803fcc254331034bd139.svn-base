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
      <div class="col-sm-12">
      <div class="panel panel-warning">
        <div class="panel-heading">Personal Details {{-- <a href="#" class="pull-right" data-toggle="modal" data-target="#profile_details"><i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i> Edit</a> --}}</div>
        <table class="table table-striped m-b-none" style="background: #f3f3f3;">
          <tbody>
            <tr>   
            <td>Name</td>
              <th>
                {{$userProfile->name}}
              </th> 
              <td>Father's Name/ Husband's Name</td>
              <th>
                {{$userProfile->guardian}}
              </th>
            </tr>
            <tr>   
            <td>Religion</td>
              <th>
                {{$userProfile->religion}}
              </th> 
              <td>Caste</td>
              <th>
                {{$userProfile->caste}}
              </th>
            </tr>
            <tr>   
            <td>Date of Birth</td>
              <th>
                {{date('d-m-Y',strtotime($userProfile->dob))}}
              </th> 
              <td>Education</td>
              <th>
                {{$userProfile->education}}
              </th>
            </tr>
            <tr>   
            <td>Marital status</td>
              <th>
                {{$userProfile->maritalStatus}}
              </th> 
              <td>Occupation</td>
              <th>
               {{$userProfile->occupation}}
              </th>
            </tr>
             <tr>   
            <td>Gender</td>
              <th>
               {{$userProfile->gender}}
              </th> 
              <td>Income</td>
              <th>
                {{$userProfile->incomeCurrencytype}} - {{$userProfile->incomeAmount}}
              </th>
            </tr>
            <tr>   
            <td>No of Children</td>
              <th>
                {{$userProfile->noOfChildren}}
              </th> 
              <td>Country</td>
              <th>
                {{$userProfile->country->countryName}}
              </th>
            </tr>
            <tr>   
            <td>Mobile No</td>
              <th>
              {{$userProfile->mobileId}} {{$userProfile->mobileNo}}
              </th> 
              <td>Email</td>
              <th>
               {{$userProfile->email}}
              </th>
            </tr>
            <tr>  
            <td>Landline No</td>
            <th>{{$userProfile->LandlineNo}}</th> 
            <td>Signature</td>
              <th >
               <img src="{{ URL::asset('/storage/img/member_img/'.$userProfile->singnature)}}" class="img-thumbnail" alt="" style="width: 100px;" />
              </th> 
            </tr>
          </tbody>
        </table>
          
      </div>
    </div>
    </div>
  @foreach ($userProfile->address as $address)
  @if (in_array($address->typeOfAddress,array('official','correspondance','permanent')))
    {{-- expr --}}
  
     <div class="row">
      <div class="col-sm-12">
      <div class="panel panel-warning">
        <div class="panel-heading">
        @if ($address->typeOfAddress=='official')
         Official Address
        @elseif ($address->typeOfAddress=='permanent')
         Permanent Address
        @elseif ($address->typeOfAddress=='correspondance')
         Correspondence Address
        @endif
        {{-- <a href="#" class="pull-right"><i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i> Edit</a> --}}</div>
        <table class="table table-striped m-b-none" style="background: #f3f3f3;">
          
          <tbody>
            <tr>   
            <td>Address</td>
              <th>
               {{$address->address}}
              </th> 
              <td>City</td>
              <th>
                {{$address->city}}
              </th>
            </tr>
            <tr>   
            <td>State</td>
              <th>
                 {{$address->state}}
              </th> 
              <td>Pin</td>
              <th>
                {{$address->pin}}
              </th>
            </tr>
            <tr>   
            <td>Country</td>
              <th>
                 {{$address->country->countryName}}
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
    @endif
  @endforeach
  


    <div class="row">
      <div class="col-sm-12">
      <div class="panel panel-warning">
        <div class="panel-heading">Proof {{-- <a href="#" class="pull-right"><i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i> Edit</a> --}}</div>
        <table class="table table-striped m-b-none" style="    background: #f3f3f3;">
          
          <tbody>
            <tr>   
            <td>Type of proof</td>
              <th>
              {{ ucfirst($userProfile->proof->typeOfProof)}}
              
              </th> 
              <td>ID Number</td>
              <th>
                {{ $userProfile->proof->proofNumber}}
              </th>
            </tr>
           
            <tr>   
            
              <td>Proof Image</td>
              <th>
               <img src="{{ URL::asset('/storage/img/proof/'.$userProfile->proof->file)}}" class="img-thumbnail" alt="" style="width: 100px;" />
               
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
        <div class="panel-heading">How do you know about heera group? {{-- <a href="#" class="pull-right"><i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i> Edit</a> --}}</div>
        <table class="table table-striped m-b-none" style="    background: #f3f3f3;">
          
          <tbody>

            <tr>   
              <th>
              {{$userProfile->aboutHeera}}
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