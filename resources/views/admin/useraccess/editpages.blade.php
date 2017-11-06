@extends('admin.useraccess.pages')
@section('main_id',$editpages->main_id)
@section('parent_id',$editpages->parent_id)
@section('url',$editpages->url)
@section('menu_name',$editpages->menu_name)
@section('edit_id',$editpages->id)
@section('icon',$editpages->icon)
@section('sort_order',$editpages->sort_order)
@section('sort_in_order',$editpages->sort_in_order)
@section('edit')
{{ method_field('PUT') }}
@endsection