@extends('admin.layouts.app')
@section('title')
    {{ tr('Contacts') }}
@endsection
@section('header')
    <div class="col-sm-6">
        <h1>{{ tr('Contacts') }}</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            {{ Breadcrumbs::render('contacts') }}
        </ol>
    </div>
@endsection
@section('content')
    <livewire:contact/>
@endsection
