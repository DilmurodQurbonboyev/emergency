@extends('admin.layouts.app')
@section('title')
{{tr('Create Page Category')}}
@endsection
@section('header')
<x-admin.breadcrumb :title="'Create Page Category'" :breadcrumb="'pages-category/create'" />
@endsection
@section('content')
<div class="card card-primary card-outline card-tabs">
    <div class="card-body">
        <form action="{{ route('pages-category.store') }}" method="post">
            @csrf
            @include('admin.pages.pages-category._form')
            @include('admin.layouts.save-button')
        </form>
    </div>
</div>
@endsection
