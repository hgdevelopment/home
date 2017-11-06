@extends('admin.incentive.incentivemaster')
@section('employeeType',$editincentive->employeeType)
@section('salary',$editincentive->salary)
@section('fromAmount',$editincentive->fromAmount)
@section('toAmount',$editincentive->toAmount)
@section('target',$editincentive->target)
@section('incentivePercentage',$editincentive->incentivePercentage)

@section('edit_id',$editincentive->id)


@section('edit')
{{ method_field('PUT') }}
@endsection







