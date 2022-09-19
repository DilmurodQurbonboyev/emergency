@extends('admin.layouts.app')
@section('title')
{{tr('Update Menu Category')}}
@endsection
@section('header')
<x-admin.breadcrumb :title="'Update Menu Category'" :breadcrumb="'menus-category/edit'" :id="$menusCategory->id" />
@endsection
@section('content')
<div class="card card-primary card-outline card-tabs">
    <div class="card-body">
        <div class="card-header p-0 pt-1 border-bottom-0">
            <x-admin.language-tab />
        </div>
        <form action="{{ route('menus-category.update', $menusCategory->id) }}" method="post">
            @csrf
            @method('patch')
            @include('admin.menus.menus-category._form')
            @include('admin.layouts.update-button')
        </form>
    </div>
</div>
@endsection
