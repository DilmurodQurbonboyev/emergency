@extends('admin.layouts.app')
@section('title')
@endsection

@section('content')
    <x-admin.category.trashes :params="$news" :title="'News Categories'" :route="'news-category'" />
@endsection
