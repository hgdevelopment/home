@extends('hr.master.deduction')
@section('deduction',$editdeduction->type_of_deduction)
@section('amount',$editdeduction->amount)
@section('edit_id',$editdeduction->id)
@section('edit')
{{ method_field('PUT') }}
@endsection