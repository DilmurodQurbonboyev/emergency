@extends('admin.layouts.app')
@section('title')
{{tr('Pages')}}
@endsection
@section('header')
<x-admin.breadcrumb :title="'Pages'" :breadcrumb="'pages'" />
@endsection
@section('content')
<livewire:pages />
@endsection
