@extends('admin.layouts.app')
@section('title')
    {{tr('Create Management Category')}}
@endsection
@section('header')
    <x-admin.breadcrumb :title="'Create Management Category'" :breadcrumb="'managements-category/create'"/>
@endsection
@section('content')
    <div class="card card-primary card-outline card-tabs">
        <div class="card-body">
            <form action="{{ route('managements-category.store') }}" method="post">
                @csrf
                @include('admin.managements.managements-category._form')
                @include('admin.layouts.save-button')
            </form>
        </div>
    </div>
@endsection
