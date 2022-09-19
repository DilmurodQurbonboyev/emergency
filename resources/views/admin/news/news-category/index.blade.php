@extends('admin.layouts.app')
@section('title')
{{ MessageService::tr('News Categories') }}
@endsection
@section('header')
<x-admin.breadcrumb :title="'News Categories'" :breadcrumb="'news-category'" />
@endsection
@section('content')
    @livewire('news.news-category')
@endsection
