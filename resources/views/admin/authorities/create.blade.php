@extends('admin.layouts.app')
@section('title')
{{ tr('Create Authority') }}
@endsection
@section('header')
<x-admin.breadcrumb :title="'Create Authority'" :breadcrumb="'authorities'" />
@endsection
@section('content')
<div class="card card-primary card-outline card-tabs">
    <div class="card-body">
        <div class="card-header p-0 pt-1 border-bottom-0">
            <x-admin.language-tab />
        </div>
        <form action="{{ route('authorities.store') }}" method="post">
            @csrf
            @include('admin.authorities._form')
            @include('admin.layouts.save-button')
        </form>
    </div>
</div>
@endsection
