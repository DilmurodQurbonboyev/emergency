@extends('admin.layouts.app')
@section('title')
    {{ tr('Update Photo') }}
@endsection
@section('header')
    <x-admin.breadcrumb :title="'Update Photos'" :breadcrumb="'photos/edit'" :id="$photos->id" />
@endsection
@section('content')
    <div class="card card-primary card-outline card-tabs">
        <div class="card-body">
            <form action="{{ route('photos.update', $photos->id) }}" method="post">
                @csrf
                @method('PATCH')
                @include('admin.photos.photos._form')
                @include('admin.layouts.update-button')
            </form>
        </div>
    </div>
@endsection
