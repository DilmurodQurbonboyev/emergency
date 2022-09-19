@extends('admin.layouts.app')
@section('title')
{{ MessageService::tr('Update Authority')}}
@endsection
@section('header')
<x-admin.breadcrumb :title="'Update Authority'" :breadcrumb="'authorities/edit'" :id="$authority->id" />
@endsection
@section('content')
<div class="card card-primary card-outline card-tabs">
    <div class="card-body">
        <div class="card-header p-0 pt-1 border-bottom-0">
            <x-admin.language-tab />
        </div>
        <form action="{{ route('authorities.update', $authority->id) }}" method="post">
            @csrf
            @method('patch')
            @include('admin.authorities._form')
            @include('admin.layouts.update-button')
        </form>
    </div>
</div>
@endsection
