@extends('admin.layouts.app')
@section('title')
{{ tr('Trashes') }}
@endsection

@section('content')
<x-admin.menu.trashes :params="$menusCategory" :title="'Menu Categories'" :route="'menus-category'" />
@endsection
