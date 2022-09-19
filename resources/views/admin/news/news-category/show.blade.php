@extends('admin.layouts.app')
@section('title')
{{ MessageService::tr('About News Category') }}
@endsection
@section('header')
<x-admin.breadcrumb-show :show="$newsCategory->title ?? '' " :breadcrumb="'news-category/show'"
    :id="$newsCategory->id" />
@endsection
@section('content')
<x-admin.category.show-table :param="$newsCategory" :route="'news-category'" />
@endsection
