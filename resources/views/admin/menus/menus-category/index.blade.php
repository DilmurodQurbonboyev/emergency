@extends('admin.layouts.app')
@section('title')
{{ tr('Menu Categories') }}
@endsection
@section('header')
<x-admin.breadcrumb :title="'Menu Categories'" :breadcrumb="'menus-category'" />
@endsection
@section('content')
<livewire:menu-category />
@endsection
