@extends('admin.layouts.app')
@section('title')
{{ tr('Create News') }}
@endsection
@section('header')
<x-admin.breadcrumb :title="'Create News'" :breadcrumb="'news/create'" />
@endsection
@section('content')
<div class="card card-primary card-outline card-tabs">
    <form action="{{ route('news.store') }}" method="post">
        @csrf
        <div class="card-body">
            @include('admin.news.news._form')
            @include('admin.layouts.save-button')
        </div>
    </form>
</div>
@endsection
