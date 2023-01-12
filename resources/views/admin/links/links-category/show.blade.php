@extends('admin.layouts.app')
@section('title')
    {{ tr('About Link Category') }}
@endsection
@section('header')
    <div class="col-sm-6">
        <h1>{{ $linkCategory->title ?? '' }}</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            {{ Breadcrumbs::render('links-category/show', $linkCategory->id) }}
        </ol>
    </div>
@endsection
@section('content')
    <x-admin.category.show-table :param="$linkCategory" :route="'links-category'"/>
@endsection
