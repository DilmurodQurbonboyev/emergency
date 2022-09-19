@extends('admin.layouts.app')
@section('title')
{{tr('Update Pages')}}
@endsection
@section('header')
<x-admin.breadcrumb :title="'Update Pages'" :breadcrumb="'pages/edit'" :id="$pages->id" />
@endsection

@section('content')
<div class="card card-primary card-outline card-tabs">
    <form action="{{ route('pages.update', $pages->id) }}" method="post">
        @csrf
        @method('patch')
        <div class="card-body">
            @include('admin.pages.pages._form')
            @include('admin.layouts.update-button')
        </div>
    </form>
</div>
@endsection
