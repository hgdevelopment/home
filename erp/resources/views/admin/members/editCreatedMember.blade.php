@extends('admin.members.editCreatedMemberView')

@section('fullname',$memberedit->name)
@section('guardian',$memberedit->guardian)
@section('religion',$memberedit->religion)
@section('caste',$memberedit->caste)
@section('dateofbirth',$memberedit->dob)
@section('education',$memberedit->education)
@section('marital',$memberedit->maritalStatus)
@section('occupation',$memberedit->occupation)
@section('gender',$memberedit->gender)
@section('country',$memberedit->countryId)
@section('income',$memberedit->incomeAmount)
@section('incomeid',$memberedit->incomeCurrencytype)
@section('childrens',$memberedit->noOfChildren)
@section('mobileno',$memberedit->mobileNo)
@section('conId12',$memberedit->mobileId)
@section('landlineno',$memberedit->LandlineNo)
@section('email',$memberedit->email)
@section('aboutheera',$memberedit->aboutHeera)
@section('signature',$memberedit->singnature)
@section('amount_inr',json_decode($memberedit->membership_details)->inr->amount)
@section('amount_aed',json_decode($memberedit->membership_details)->aed->amount)
@section('amount_usd',json_decode($memberedit->membership_details)->usd->amount)
@section('amount_sar',json_decode($memberedit->membership_details)->sar->amount)
@section('amount_cad',json_decode($memberedit->membership_details)->cad->amount) 
@section('type_amount_inr',json_decode($memberedit->membership_details)->inr->type)
@section('type_amount_aed',json_decode($memberedit->membership_details)->aed->type)
@section('type_amount_usd',json_decode($memberedit->membership_details)->usd->type)
@section('type_amount_sar',json_decode($memberedit->membership_details)->sar->type)
@section('type_amount_cad',json_decode($memberedit->membership_details)->cad->type) 
@section('photo',$memberedit->photo)
@foreach($memberaddress as $address)
@if($address->typeOfAddress=='permanent')
@section('per_address',$address->address)
@section('per_city',$address->city)
@section('per_state',$address->state)
@section('per_country',$address->Country)
@section('per_pin',$address->pin)
@endif
@if($address->typeOfAddress=='correspondance')
@section('corr_address',$address->address)
@section('corr_city',$address->city)
@section('corr_state',$address->state)
@section('corr_country',$address->Country)
@section('corr_pin',$address->pin)
@endif
@if($address->typeOfAddress=='official')
@section('official_addr',$address->address)
@section('official_city',$address->city)
@section('official_state',$address->state)
@section('official_country',$address->Country)
@section('official_pin',$address->pin)
@endif
@endforeach
@section('proofId',$memberproof->typeOfProof)
@section('proof_number',$memberproof->proofNumber)
@section('proof_file',$memberproof->file)
@section('idproof',$memberproof->idproof) 
@section('edit_id',$memberedit->userId) 
@section('edit')
{{ method_field('PUT') }}
@endsection
