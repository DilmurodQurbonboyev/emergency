@extends('admin.layouts.app')
@section('title')
{{ tr('About Page Category') }}
@endsection
@section('header')
<x-admin.breadcrumb-show :show="$pagesCategory->title ?? '' " :breadcrumb="'pages-category/show'"
    :id="$pagesCategory->id" />
@endsection
@section('content')
<x-admin.category.show-table :param="$pagesCategory" :route="'pages-category'" />
@endsection
