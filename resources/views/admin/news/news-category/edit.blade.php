@extends('admin.layouts.app')
@section('title')
    {{ MessageService::tr('Update News Category')}}
@endsection
@section('header')
    <x-admin.breadcrumb :title="'Update News Category'" :breadcrumb="'news-category/edit'" :id="$newsCategory->id"/>
@endsection
@section('content')
    <div class="card card-primary card-outline card-tabs">
        <div class="card-body">
            <form action="{{ route('news-category.update', $newsCategory->id) }}" method="post">
                @csrf
                @method('PATCH')
                @include('admin.news.news-category._form')
                @include('admin.layouts.update-button')
            </form>
        </div>
    </div>
@endsection
