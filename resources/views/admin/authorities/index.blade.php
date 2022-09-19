@extends('admin.layouts.app')
@section('title')
{{ MessageService::tr('Authorities') }}
@endsection
@section('header')
<x-admin.breadcrumb :title="'Authorities'" :breadcrumb="'authorities'" />
@endsection
@section('content')
<livewire:authority />
@endsection
