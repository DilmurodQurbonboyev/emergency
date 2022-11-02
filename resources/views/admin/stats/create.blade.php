@extends('admin.layouts.app')
@section('title')
    {{ tr('Create Statistic') }}
@endsection
@section('header')
    <div class="col-sm-6">
        <h1>{{ tr('Create Statistic') }}</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
        </ol>
    </div>
@endsection
@section('content')
    <div class="card card-primary card-outline card-outline-tabs">
        <div class="card-body">
            <form action="{{ route('stats.store') }}" method="post">
                @csrf
                @include('admin.stats._form')
                @include('admin.layouts.save-button')
            </form>
        </div>
    </div>
@endsection
