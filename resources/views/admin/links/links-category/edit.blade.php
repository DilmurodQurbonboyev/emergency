@extends('admin.layouts.app')
@section('title')
{{tr('Update Link Category')}}
@endsection
@section('header')
<x-admin.breadcrumb :title="'Update Link Category'" :breadcrumb="'links-category/edit'" :id="$linkCategory->id" />
@endsection
@section('content')
<div class="card card-primary card-outline card-tabs">
    <div class="card-body">
        <form action="{{ route('links-category.update', $linkCategory->id) }}" method="post">
            @csrf
            @method('PATCH')
            @include('admin.links.links-category._form')
            @include('admin.layouts.update-button')
        </form>
    </div>
</div>
@endsection
