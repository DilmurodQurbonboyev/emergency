@extends('admin.layouts.app')
@section('title')
@endsection

@section('content')
    <x-admin.category.trashes :params="$photos" :title="'Photo Categories'" :route="'photos-category'" />
@endsection
