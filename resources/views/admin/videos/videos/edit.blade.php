@extends('admin.layouts.app')
@section('title')
    {{ tr('Update Video') }}
@endsection
@section('header')

    <x-admin.breadcrumb
        :title="'Update Video'"
        :breadcrumb="'videos/edit'"
        :id="$videos->id"/>

@endsection
@section('content')
    <div class="card card-primary card-outline card-tabs">
        <div class="card-body">
            <form action="{{ route('videos.update', $videos->id) }}" method="post">
                @csrf
                @method('PATCH')
                @include('admin.videos.videos._form')
                @include('admin.layouts.update-button')
            </form>
        </div>
    </div>
@endsection
