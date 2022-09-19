@extends('admin.layouts.app')
@section('title')
{{ tr('Managements') }}
@endsection
@section('header')
    <x-admin.breadcrumb :title="'Managements'" :breadcrumb="'managements'"/>
@endsection
@section('content')
<livewire:management />
@endsection
