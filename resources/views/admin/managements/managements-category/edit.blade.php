@extends('admin.layouts.app')
@section('title')
{{tr('Update Management Category')}}
@endsection
@section('header')
    <x-admin.breadcrumb :title="'Update Management Category'" :breadcrumb="'managements-category/edit'" :id="$managementCategory->id" />
@endsection
@section('content')
<div class="card card-primary card-outline card-tabs">
    <div class="card-body">
        <form action="{{ route('managements-category.update', $managementCategory->id) }}" method="post">
            @csrf
            @method('PATCH')
            @include('admin.managements.managements-category._form')
            @include('admin.layouts.update-button')
        </form>
    </div>
</div>
@endsection
