@extends('admin.layouts.app')
@section('title')
{{tr('Update Useful')}}
@endsection
@section('header')
<x-admin.breadcrumb :title="'Update Useful'" :breadcrumb="'useful/edit'" :id="$usefuls->id" />
@endsection

@section('content')
<div class="card card-primary card-outline card-outline-tabs">
    <form action="{{ route('useful.update', $usefuls->id) }}" method="post">
        @csrf
        @method('PATCH')
        <div class="card-body">
            @include('admin.usefuls.usefuls._form')
            @include('admin.layouts.update-button')
        </div>
    </form>
</div>
@endsection
