<?php
/**
 * Created by PhpStorm.
 * User: Developer1
 * Date: 09-10-2017
 * Time: 12:43
 */
?>
@extends('hr.shift.index')

@section('shift_name',$edit_hr_shift->shift_name)
@section('department',$edit_hr_shift->department)
@section('description',$edit_hr_shift->description)
@section('time_in',\Carbon::parse($edit_hr_shift->time_in)->format('G:i')) 
@section('time_out',\Carbon::parse($edit_hr_shift->time_out)->format('G:i'))
@section('break_in',\Carbon::parse($edit_hr_shift->break_in)->format('G:i'))
@section('break_out',\Carbon::parse($edit_hr_shift->break_out)->format('G:i'))
@section('break_time',$edit_hr_shift->break_time)
@section('edit_id',$edit_hr_shift->id)
@section('edit')
    {{ method_field('PUT') }}
@endsection
 