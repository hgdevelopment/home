@extends('admin.dsa.updateApproveDsa')

@section('companyName',$dsaDetails->companyName)
@section('name',$dsaDetails->name)
@section('guardian',$dsaDetails->guardian)
@section('dob',$dsaDetails->dob)
@section('aboutHeera',$dsaDetails->aboutHeera)
@section('maritalStatus',$dsaDetails->maritalStatus)
@section('gender',$dsaDetails->gender)
@section('country',$dsaDetails->countryId)

@section('mobileNo',$dsaDetails->mobileNumber)
@section('mobileId',$dsaDetails->mobileId)
@section('email',$dsaDetails->email)
@section('telePhoneNo',$dsaDetails->telePhoneNo)

@foreach($dsaAddress as $dsaaddress)
@if($dsaaddress->typeOfAddress=='official')
@section('officialAddress',$dsaaddress->address)
@section('officialState',$dsaaddress->state)
@section('officialCity',$dsaaddress->city)
@section('officialPin',$dsaaddress->pin)
@endif
@endforeach

@foreach($dsaAddress as $dsaaddress)
@if($dsaaddress->typeOfAddress=='permanent')
@section('permanentAddress',$dsaaddress->address)
@section('permanentState',$dsaaddress->state)
@section('permanentCity',$dsaaddress->city)
@section('permanentPin',$dsaaddress->pin)
@endif
@endforeach

@foreach($dsaAddress as $dsaaddress)
@if($dsaaddress->typeOfAddress=='correspondance')
@section('corrsAddress',$dsaaddress->address)
@section('corrsState',$dsaaddress->state)
@section('corrsCity',$dsaaddress->city)
@section('corrsPin',$dsaaddress->pin)
@endif
@endforeach

@section('typeOfProof',$dsaProof->typeOfProof)
@section('idNumber',$dsaProof->proofNumber)


@section('paymentMode',$dsapaymentdetails->payment_mode)
@section('number',$dsapaymentdetails->transactionNumber)
@section('depositDate',$dsapaymentdetails->paymentDate)
@section('bankName',$dsapaymentdetails->bank)
@section('branch',$dsapaymentdetails->branch)
@section('accountNo',$dsapaymentdetails->accountNumber)

@section('holderName',$dsabank->accountHolderName)
@section('incaccountnumber',$dsabank->accountNumber)
@section('incbankName',$dsabank->bankName)
@section('incBranchName',$dsabank->branchName)
@section('incIfscCode',$dsabank->ifsc)

@section('refName',$dsareference->name )
@section('refaddress',$dsaaddress->address )
@section('refDistrict',$dsaaddress->city)
@section('refState',$dsaaddress->state)
@section('refPin',$dsaaddress->pin)
@section('refMobileNo',$dsareference->referenceMobileNumber)
@section('refEmail',$dsareference->referenceEmail)
@section('relationship',$dsareference->referenceRelation)
@section('edit_id',$dsaDetails->userId)
@section('edit')
{{ method_field('PUT') }}
@endsection