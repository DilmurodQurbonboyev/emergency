@extends('admin.layouts.app')
@section('title')
    {{ tr('Update Contact') }}
@endsection
@section('header')
    <div class="col-sm-6">
        <h1>{{ tr('Update Contact') }}</h1>
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
            <form action="{{ route('contacts.update', $contacts->id) }}" method="post">
                @csrf
                @method('patch')
                @include('admin.contacts._form')
                @include('admin.layouts.save-button')
            </form>
        </div>
    </div>
@endsection
