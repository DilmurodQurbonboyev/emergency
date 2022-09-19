@extends('admin.layouts.app')
@section('title')
    {{tr('Create Photo')}}
@endsection
@section('header')
    <x-admin.breadcrumb :title="'Create Photos'" :breadcrumb="'photos/create'"/>
@endsection

@section('content')
    <div class="card card-primary card-outline card-tabs">
        <div class="card-body">
            <form action="{{ route('photos.store') }}" method="post">
                @csrf
                @include('admin.photos.photos._form')
                @include('admin.layouts.save-button')
            </form>
        </div>
    </div>
@endsection
