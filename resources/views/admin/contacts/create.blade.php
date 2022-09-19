@extends('admin.layouts.app')
@section('title')
    {{ tr('Create Contact') }}
@endsection
@section('header')
    <div class="col-sm-6">
        <h1>{{ tr('Create Contact') }}</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
        </ol>
    </div>
@endsection
@section('content')
    <div class="card card-primary card-outline card-tabs">
        <div class="card-body">
            <div class="card-header p-0 pt-1 border-bottom-0">
                <x-admin.language-tab />
            </div>
            <form action="{{ route('contacts.store') }}" method="post">
                @csrf
                @include('admin.contacts._form')
                @include('admin.layouts.save-button')
            </form>
        </div>
    </div>
@endsection
