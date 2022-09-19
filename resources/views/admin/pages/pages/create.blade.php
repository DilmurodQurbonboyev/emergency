@extends('admin.layouts.app')
@section('title')
{{tr('Create Page')}}
@endsection
@section('header')
<x-admin.breadcrumb :title="'Create Page'" :breadcrumb="'pages/create'" />
@endsection

@section('content')
<div class="card card-primary card-outline card-tabs">
    <form action="{{ route('pages.store') }}" method="post">
        @csrf
        <div class="card-body">
            @include('admin.pages.pages._form')
            @include('admin.layouts.save-button')
        </div>
    </form>
</div>
@endsection
