@extends('admin.layouts.app')
@section('title')
    {{tr('Update News')}}
@endsection
@section('header')
<x-admin.breadcrumb :title="'Update News'" :breadcrumb="'news/edit'" :id="$news->id" />
@endsection
@section('content')
    <div class="card card-primary card-outline card-tabs">
        <form action="{{ route('news.update', $news->id) }}" method="post">
            @csrf
            @method('PATCH')
            <div class="card-body">
                @include('admin.news.news._form')
                @include('admin.layouts.update-button')
            </div>
        </form>
    </div>
@endsection
