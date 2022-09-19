@extends('admin.layouts.app')
@section('title')
{{tr('Create Video Category')}}
@endsection
@section('header')
<x-admin.breadcrumb :title="'Create Video Category'" :breadcrumb="'videos-category/create'" />
@endsection
@section('content')
<div class="card card-primary card-outline card-tabs">
    <div class="card-body">
        <form action="{{ route('videos-category.store') }}" method="post">
            @csrf
            @include('admin.videos.videos-category._form')
            @include('admin.layouts.save-button')
        </form>
    </div>
</div>
@endsection
