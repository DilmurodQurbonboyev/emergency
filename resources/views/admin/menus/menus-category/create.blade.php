@extends('admin.layouts.app')
@section('title')
{{tr('Create Menu Category')}}
@endsection
@section('header')
<x-admin.breadcrumb :title="'Create Menu Category'" :breadcrumb="'menus-category/create'" />
@endsection
@section('content')
<div class="card card-primary card-outline card-tabs">
    <div class="card-body">
        <div class="card-header p-0 pt-1 border-bottom-0">
            <x-admin.language-tab />
        </div>
        <form action="{{ route('menus-category.store') }}" method="post">
            @csrf
            @include('admin.menus.menus-category._form')
            @include('admin.layouts.save-button')
        </form>
    </div>
</div>
@endsection
