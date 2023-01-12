@extends('admin.layouts.app')
@section('title')
{{tr('Links')}}
@endsection
@section('header')
<x-admin.breadcrumb :title="'Links'" :breadcrumb="'links'" />
@endsection
@section('content')
<livewire:link />
@endsection
