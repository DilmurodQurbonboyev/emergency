@extends('admin.layouts.app')
@section('title')
{{ tr('Video Categories') }}
@endsection
@section('header')
<div class="col-sm-6">
    <h1>{{ tr('Video Categories') }}</h1>
</div>
<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        {{ Breadcrumbs::render('videos-category') }}
    </ol>
</div>
@endsection
@section('content')
<livewire:videos-category />
@endsection
