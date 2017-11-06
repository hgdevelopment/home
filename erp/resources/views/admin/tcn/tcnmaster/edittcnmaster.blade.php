@extends('admin.tcn.tcnmaster.tcn')

@section('tcnType',$edittcnmaster->tcnType)
@section('inr',$edittcnmaster->inr)
@section('aed',$edittcnmaster->aed)
@section('usd',$edittcnmaster->usd)
@section('sar',$edittcnmaster->sar)
@section('cad',$edittcnmaster->cad)
@section('openStatus',$edittcnmaster->openStatus)
{{-- @section('openOn',$edittcnmaster->openOn)
@section('closeOn',$edittcnmaster->closeOn)
 --}}@section('lockingDuration',$edittcnmaster->lockingDuration)
@section('benefitLockingDuration',$edittcnmaster->benefitLockingDuration)
@section('profitDeclaration',$edittcnmaster->profitDeclaration)

@section('header',$edittcnmaster->header)
@section('indianCertificate',$edittcnmaster->indianCertificate)
@section('certificateDmcc',$edittcnmaster->certificateDmcc)

@section('editId',$edittcnmaster->id)

@php
$Edit['openOn']=$edittcnmaster->openOn; 
$Edit['closeOn']=$edittcnmaster->closeOn; 
@endphp

@section('edit')
{{ method_field('PUT') }}
@endsection