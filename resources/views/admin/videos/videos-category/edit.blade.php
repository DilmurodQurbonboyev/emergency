@extends('admin.layouts.app')
@section('title')
    {{tr('Update Video Category')}}
@endsection
@section('header')
    <x-admin.breadcrumb :title="'Update Video Category'" :breadcrumb="'videos-category/edit'" :id="$videosCategory->id" />
@endsection
@section('content')
    <div class="card card-primary card-outline card-tabs">
        <div class="card-body">
            <form action="{{ route('videos-category.update', $videosCategory->id) }}" method="post">
                @csrf
                @method('PATCH')
                @include('admin.videos.videos-category._form')
                @include('admin.layouts.update-button')
            </form>
        </div>
    </div>
@endsection
