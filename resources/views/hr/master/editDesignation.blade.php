@extends('hr.master.designation')
@section('designationname',$editdesignation->designation_name)
@section('deptname',$editdesignation->department_id)
@section('edit_id',$editdesignation->id)
@section('edit')
{{ method_field('PUT') }}
@endsection
