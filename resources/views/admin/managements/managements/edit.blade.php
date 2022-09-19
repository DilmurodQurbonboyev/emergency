@extends('admin.layouts.app')
@section('title')
    {{ tr('Update Management') }}
@endsection
@section('header')
    <x-admin.breadcrumb :title="'Update Management'" :breadcrumb="'managements/edit'" :id="$management->id"/>
@endsection
@section('content')
    <div class="card card-primary card-outline card-outline-tabs">
        <div class="card-body">
            <form action="{{ route('managements.update', $management->id) }}" method="post">
                @csrf
                @method('patch')
                @include('admin.managements.managements._form')
                @include('admin.layouts.update-button')
            </form>
        </div>
    </div>
@endsection
