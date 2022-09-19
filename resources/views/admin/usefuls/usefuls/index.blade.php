@extends('admin.layouts.app')
@section('title')
{{tr('Useful')}}
@endsection
@section('header')
<x-admin.breadcrumb :title="'Useful'" :breadcrumb="'useful'" />
@endsection
@section('content')
<livewire:useful />
@endsection
