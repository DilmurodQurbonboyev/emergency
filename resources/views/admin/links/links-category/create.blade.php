@extends('admin.layouts.app')
@section('title')
{{tr('Create Link Category')}}
@endsection
@section('header')
<x-admin.breadcrumb :title="'Create Link Category'" :breadcrumb="'links-category/create'" />
@endsection
@section('content')
<div class="card card-primary card-outline card-tabs">
    <div class="card-body">
        <form action="{{ route('links-category.store') }}" method="post">
            @csrf
           @include('admin.links.links-category._form')
           @include('admin.layouts.save-button')
        </form>
    </div>
</div>
@endsection
