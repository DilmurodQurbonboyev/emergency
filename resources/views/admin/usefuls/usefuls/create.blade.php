@extends('admin.layouts.app')
@section('title')
{{tr('Create Useful')}}
@endsection
@section('header')
<x-admin.breadcrumb :title="'Create Useful'" :breadcrumb="'useful/create'" />
@endsection
@section('content')
<div class="card card-primary card-outline card-tabs">
    <div class="card-body">
        <form action="{{ route('useful.store') }}" method="post">
            @csrf
            @include('admin.usefuls.usefuls._form')
            @include('admin.layouts.save-button')
        </form>
    </div>
</div>
@endsection
