@extends('admin.layouts.app')
@section('title')
{{tr('Update Page Category')}}
@endsection
@section('header')
<x-admin.breadcrumb :title="'Update Page Category'" :breadcrumb="'pages-category/edit'" :id="$pagesCategory->id" />
@endsection
@section('content')
<div class="card card-primary card-outline card-tabs">
    <div class="card-body">
        <form action="{{ route('pages-category.update', $pagesCategory->id) }}" method="post">
            @csrf
            @method('PATCH')
            @include('admin.pages.pages-category._form')
            @include('admin.layouts.update-button')
        </form>
    </div>
</div>
@endsection
