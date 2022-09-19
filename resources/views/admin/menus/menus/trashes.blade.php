@extends('admin.layouts.app')
@section('title')
{{ tr('Trashes') }}
@endsection

@section('content')
<x-admin.menu.trashes :params="$menus" :title="'Menus'" :route="'menus'" />
@endsection
