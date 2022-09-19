@extends('admin.layouts.app')
@section('title')
    {{ tr('About Useful Category') }}
@endsection
@section('header')
    <div class="col-sm-6">
        <h1>{{ $usefulCategory->title ?? '' }}</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            {{ Breadcrumbs::render('useful-category/show', $usefulCategory->id) }}
        </ol>
    </div>
@endsection
@section('content')
    <x-admin.category.show-table :param="$usefulCategory" :route="'useful-category'"/>
@endsection
