@extends('admin.layouts.app')
@section('title')
    {{ tr('Create Management') }}
@endsection
@section('header')
    <x-admin.breadcrumb :title="'Create Management'" :breadcrumb="'managements/create'"/>
@endsection
@section('content')
    <div class="card card-primary card-outline card-outline-tabs">
        <form action="{{ route('managements.store') }}" method="post">
            @csrf
            <div class="card-body">
                @include('admin.managements.managements._form')
                @include('admin.layouts.save-button')
            </div>
        </form>
    </div>
@endsection
