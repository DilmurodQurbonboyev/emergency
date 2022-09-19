@extends('admin.layouts.app')
@section('title')
{{tr('Create Menu')}}
@endsection
@section('header')
<x-admin.breadcrumb :title="'Create Menu'" :breadcrumb="'menus/create'" />
@endsection
@section('content')
<div class="card card-primary card-outline card-tabs">
    <div class="card-body">
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div>{{$error}}</div>
            @endforeach
        @endif
        <div class="card-header p-0 pt-1 border-bottom-0">
            <x-admin.language-tab />
        </div>
        <form action="{{ route('menus.store') }}" method="post">
            @csrf
            @include('admin.menus.menus._form')
            @include('admin.layouts.save-button')
        </form>
    </div>
</div>
@endsection
