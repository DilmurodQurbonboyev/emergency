@extends('admin.layouts.app')
@section('title')
{{tr('Update Link')}}
@endsection
@section('header')
<x-admin.breadcrumb :title="'Update Link'" :breadcrumb="'links/edit'" :id="$links->id" />
@endsection

@section('content')
<div class="card card-primary card-outline card-outline-tabs">
    <form action="{{ route('links.update', $links->id) }}" method="post">
        @csrf
        @method('PATCH')
        <div class="card-body">
            @include('admin.links.links._form')
            @include('admin.layouts.update-button')
        </div>
    </form>
</div>
@endsection
