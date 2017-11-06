@extends('admin.bank.bankmaster')

@section('bank_name',$editbank->bankName)
@section('account_number',$editbank->accountNumber)
@section('branch',$editbank->branchName)
@section('place',$editbank->place)
@section('holderName',$editbank->accountHolderName)
@section('ifsc',$editbank->ifsc)
@section('iban',$editbank->ibanNumber)
@section('edit_id',$editbank->id)
@section('account_type',$editbank->typeOfAccount)
@section('country',$editbank->country)
@section('edit')
{{ method_field('PUT') }}
@endsection