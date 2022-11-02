@extends('admin.layouts.app')
@section('title')
    {{ tr('Update Statistic') }}
@endsection
@section('header')
@endsection
@section('content')
    <div class="card card-primary card-outline card-outline-tabs">
        <div class="card-body">
            <form action="{{ route('stats.update', $stat->id) }}" method="post">
                @csrf
                @method('PATCH')
                @include('admin.stats._form')
                @include('admin.layouts.update-button')
            </form>
        </div>
    </div>
@endsection
