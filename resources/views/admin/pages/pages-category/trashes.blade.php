@extends('admin.layouts.app')
@section('title')
@endsection

@section('content')
    <x-admin.category.trashes :params="$pages" :title="'Page Categories'" :route="'pages-category'" />
@endsection
