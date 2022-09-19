@extends('admin.layouts.app')
@section('title')
{{tr('Update photos Category')}}
@endsection
@section('header')
<x-admin.breadcrumb :title="'Update Photo Category'" :breadcrumb="'photos-category/edit'" :id="$photosCategory->id" />
@endsection
@section('content')
<div class="card card-primary card-outline card-tabs">
    <div class="card-body">
        <form action="{{ route('photos-category.update', $photosCategory->id) }}" method="post">
            @csrf
            @method('PATCH')
            @include('admin.photos.photos-category._form')
            @include('admin.layouts.update-button')
        </form>
    </div>
</div>
@endsection
