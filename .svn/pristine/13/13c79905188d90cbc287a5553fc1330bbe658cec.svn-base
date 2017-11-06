@extends('admin.tcn.tcnapplication.tcnApplicationForm')
@section('')
@section('edits',$tcnrequests->id)
@section('editId','1')
@php
$Edit['code']=$memberregistrations->code; 

$Edit['tcnType']=$tcnrequests->tcn_id; 
$Edit['tcnCode']=$tcnrequests->tcnCode; 
$Edit['currencyType']=$tcnrequests->currencyType; 
$Edit['paymentMode']=$tcnrequests->paymentMode; 
$Edit['unit']=$tcnrequests->unit; 
$Edit['transactionNumber']=$tcnrequests->transactionNumber; 
$Edit['depositeDate']=$tcnrequests->depositeDate; 
$Edit['heeraAccountId']=$tcnrequests->heeraAccountId; 
$Edit['doc1']=$tcnrequests->doc1; 
$Edit['doc2']=$tcnrequests->doc2; 
$Edit['doc3']=$tcnrequests->doc3; 
$Edit['nominee1']=$tcnrequests->nominee1_id; 
$Edit['nominee2']=$tcnrequests->nominee2_id; 
$Edit['relationWithApplicant']=$nominees->relationWithApplicant; 
$Edit['dob']=$nominees->dob; 
$Edit['gender']=$nominees->gender; 

$Edit['proofId']=$proofs->id;


$Edit['addressId']=$address2->id; 

$Edit['selectAccountNumber']=$banks->id;

$Edit['country']=$countrys->id;

$Edit['editId']=$tcnrequests->id; 
@endphp

@section('edit')
{{ method_field('PUT') }}
@endsection