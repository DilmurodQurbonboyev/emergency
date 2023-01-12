@extends('admin.layouts.app')
@section('title')
{{tr('Create Link')}}
@endsection
@section('header')
<x-admin.breadcrumb :title="'Create Link'" :breadcrumb="'links/create'" />
@endsection
@section('content')
<div class="card card-primary card-outline card-tabs">
    <div class="card-body">
        <form action="{{ route('links.store') }}" method="post">
            @csrf
            @include('admin.links.links._form')
            @include('admin.layouts.save-button')
        </form>
    </div>
</div>
@endsection
