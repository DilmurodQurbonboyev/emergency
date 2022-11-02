@extends('admin.layouts.app')
@section('title')
    {{ tr('Applications') }}
@endsection
@section('header')
    <div class="col-sm-6">
        <h1>{{ tr('Applications') }}</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            {{ Breadcrumbs::render('applications') }}
        </ol>
    </div>
@endsection
@section('content')
    <livewire:application/>
@endsection
