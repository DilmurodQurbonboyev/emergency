@extends('admin.layouts.app')
@section('title')
    {{ MessageService::tr('Management Categories') }}
@endsection
@section('header')
    <x-admin.breadcrumb :title="'Management Categories'" :breadcrumb="'managements-category'"/>
@endsection
@section('content')
    <livewire:management-category/>
@endsection
