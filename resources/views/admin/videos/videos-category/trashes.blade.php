@extends('admin.layouts.app')
@section('title')
@endsection

@section('content')
    <x-admin.category.trashes :params="$videos" :title="'Video Categories'" :route="'videos-category'"/>
@endsection
