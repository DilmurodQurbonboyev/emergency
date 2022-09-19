@extends('admin.layouts.app')
@section('title')
{{ tr('Page Categories') }}
@endsection
@section('header')
<div class="col-sm-6">
    <h1>{{ tr('Page Categories') }}</h1>
</div>
<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        {{ Breadcrumbs::render('pages-category') }}
    </ol>
</div>
@endsection
@section('content')
<livewire:pages-category />
@endsection
