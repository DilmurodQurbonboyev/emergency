@extends('admin.layouts.app')
@section('title')
{{tr('Create Photo Category')}}
@endsection
@section('header')
    <x-admin.breadcrumb :title="'Create Photo Category'" :breadcrumb="'photos-category/create'" />
@endsection
@section('content')
<div class="card card-primary card-outline card-tabs">
    <div class="card-body">
        <form action="{{ route('photos-category.store') }}" method="post">
            @csrf
            @include('admin.photos.photos-category._form')
            @include('admin.layouts.save-button')
        </form>
    </div>
</div>
@endsection
