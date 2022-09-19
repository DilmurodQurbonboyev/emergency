@extends('admin.layouts.app')
@section('title')
    {{ tr('About Photo Category') }}
@endsection
@section('header')
    <x-admin.breadcrumb-show
        :show="$photosCategory->title ?? '' "
        :breadcrumb="'photos-category/show'"
        :id="$photosCategory->id"/>
@endsection
@section('content')
    <x-admin.category.show-table
        :param="$photosCategory"
        :route="'photos-category'"/>
@endsection
