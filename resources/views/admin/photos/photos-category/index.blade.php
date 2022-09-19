@extends('admin.layouts.app')
@section('title')
{{ tr('Photos Categories') }}
@endsection
@section('header')
<x-admin.breadcrumb :title="'Photos Categories'" :breadcrumb="'photos-category'" />
@endsection
@section('content')
<livewire:photos-category />
@endsection
