@extends('admin.layouts.app')
@section('title')
    {{ tr('About Videos Category') }}
@endsection
@section('header')
    <div class="col-sm-6">
        <h1>{{ $videosCategory->title ?? '' }}</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            {{ Breadcrumbs::render('videos-category/show', $videosCategory->id) }}
        </ol>
    </div>
@endsection
@section('content')
    <x-admin.category.show-table :param="$videosCategory" :route="'videos-category'"/>
@endsection
