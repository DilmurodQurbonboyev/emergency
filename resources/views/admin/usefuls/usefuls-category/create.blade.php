@extends('admin.layouts.app')
@section('title')
{{tr('Create Useful Category')}}
@endsection
@section('header')
<x-admin.breadcrumb :title="'Create Useful Category'" :breadcrumb="'useful-category/create'" />
@endsection
@section('content')
<div class="card card-primary card-outline card-tabs">
    <div class="card-body">
        <form action="{{ route('useful-category.store') }}" method="post">
            @csrf
           @include('admin.usefuls.usefuls-category._form')
           @include('admin.layouts.save-button')
        </form>
    </div>
</div>
@endsection
