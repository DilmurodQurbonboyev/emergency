@extends('admin.layouts.app')
@section('title')
{{ tr('Useful Categories') }}
@endsection
@section('header')
<x-admin.breadcrumb :title="'Useful Categories'" :breadcrumb="'useful-category'" />
@endsection
@section('content')
<livewire:useful-category />
@endsection
