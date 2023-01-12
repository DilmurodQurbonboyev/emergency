@extends('admin.layouts.app')
@section('title')
{{ tr('Link Categories') }}
@endsection
@section('header')
<x-admin.breadcrumb :title="'Link Categories'" :breadcrumb="'links-category'" />
@endsection
@section('content')
<livewire:link-category />
@endsection
