@extends('admin.layouts.app')
@section('title')
{{ MessageService::tr('Create News Category')}}
@endsection
@section('header')
<x-admin.breadcrumb :title="'Create News Category'" :breadcrumb="'news-category/create'" />
@endsection
@section('content')
<div class="card card-primary card-outline card-tabs">
    <div class="card-body">
        <form action="{{ route('news-category.store') }}" method="post">
            @csrf
            @include('admin.news.news-category._form')
            @include('admin.layouts.save-button')
        </form>
    </div>
</div>
@endsection
