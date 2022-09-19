@extends('admin.layouts.app')
@section('title')
{{ tr('Update Menu') }}
@endsection
@section('header')
<x-admin.breadcrumb :title="'Update Menu'" :breadcrumb="'menus/edit'" :id="$menu->id" />
@endsection
@section('content')
<div class="card card-primary card-outline card-tabs">
    <div class="card-body">
        <div class="card-header p-0 pt-1 border-bottom-0">
            <x-admin.language-tab />
        </div>
        <form action="{{ route('menus.update', $menu->id) }}" method="post">
            @csrf
            @method('patch')
            @include('admin.menus.menus._form')
            @include('admin.layouts.update-button')
        </form>
    </div>
</div>
@endsection
