@extends('admin.layouts.app')
@section('title')
{{tr('Update Useful Category')}}
@endsection
@section('header')
<x-admin.breadcrumb :title="'Update Useful Category'" :breadcrumb="'useful-category/edit'" :id="$usefulCategory->id" />
@endsection
@section('content')
<div class="card card-primary card-outline card-tabs">
    <div class="card-body">
        <form action="{{ route('useful-category.update', $usefulCategory->id) }}" method="post">
            @csrf
            @method('PATCH')
            @include('admin.usefuls.usefuls-category._form')
            @include('admin.layouts.update-button')
        </form>
    </div>
</div>
@endsection
