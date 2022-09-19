@extends('admin.layouts.app')
@section('title')
    {{ MessageService::tr('Users') }}
@endsection
@section('header')
    <x-admin.breadcrumb :title="'Users'" :breadcrumb="'users'" />
@endsection
@section('content')
    <livewire:user />
@endsection
