@extends('admin.layouts.app')
@section('title')
{{ tr('Menus') }}
@endsection
@section('header')
<x-admin.breadcrumb :title="'Menus'" :breadcrumb="'menus'" />
@endsection
@section('content')
<livewire:menu />
@endsection
