@extends('hr.master.religionmaster')
@section('religion_name',$editreligion->religion_name)
@section('edit_id',$editreligion->id)
@section('edit')
{{ method_field('PUT') }}
@endsection