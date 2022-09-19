@extends('admin.layouts.app')
@section('title')
    {{ tr('News') }}
@endsection
@section('header')
    <x-admin.breadcrumb :title="'News'" :breadcrumb="'news'" />
@endsection
@section('content')
    <livewire:news.news />
@endsection
