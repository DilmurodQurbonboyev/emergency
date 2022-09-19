@extends('admin.layouts.app')
@section('title')
    {{tr('Create Video')}}
@endsection
@section('header')
    <x-admin.breadcrumb :title="'Create Video'" :breadcrumb="'videos/create'"/>
@endsection
@section('content')
    <div class="card card-primary card-outline card-tabs">
        <div class="card-body">
            <form action="{{ route('videos.store') }}" method="post">
                @csrf
                @include('admin.videos.videos._form')
                @include('admin.layouts.save-button')
            </form>
        </div>
    </div>
@endsection
