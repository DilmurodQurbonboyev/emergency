@extends('admin.layouts.app')
@section('title')
@endsection

@section('content')
    <x-admin.category.trashes :params="$usefuls" :title="'Useful Categories'" :route="'useful-category'" />
@endsection
