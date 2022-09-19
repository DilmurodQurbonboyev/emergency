@extends('admin.layouts.app')
@section('title')
    {{ tr('Photos') }}
@endsection
@section('header')
    <x-admin.breadcrumb :title="'Photos'" :breadcrumb="'photos'" />
@endsection
@section('content')
    <livewire:photos />
@endsection
