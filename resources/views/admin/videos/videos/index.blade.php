@extends('admin.layouts.app')
@section('title')
{{tr('Videos')}}
@endsection
@section('header')
<x-admin.breadcrumb :title="'Videos'" :breadcrumb="'videos'" />
@endsection
@section('content')
<livewire:videos />
@endsection
