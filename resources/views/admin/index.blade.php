@extends('admin.layouts.app')
@section('title')
    {{ MessageService::tr('Dashboard') }}
@endsection
@section('header')
    <x-admin.breadcrumb :title="'Dashboard'" :breadcrumb="'admin'"/>
@endsection
@section('content')
    <div class="row">
        <x-admin.card icon='<i class="fab fa-elementor"></i>' title="{{ MessageService::tr('Menus') }}"
                      url="{{ route('menus.index') }}" value="{{ $totalMenus->menus }}"></x-admin.card>
        <x-admin.card icon='<i class="far fa-newspaper"></i>' title="{{ MessageService::tr('News') }}"
                      url="{{ route('news.index') }}" value="{{ $totalLists->news }}"></x-admin.card>
        <x-admin.card icon='<i class="fa fa-link fa-lg"></i>' title="{{ MessageService::tr('Links') }}"
                      url="{{ route('pages.index') }}" value="{{ $totalLists->pages }}"></x-admin.card>
        <x-admin.card icon='<i class="fas fa-tv"></i>' title="{{ MessageService::tr('Useful') }}"
                      url="{{ route('useful.index') }}" value="{{ $totalLists->usefuls }}"></x-admin.card>
        <x-admin.card icon='<i class="fas fa-camera"></i>' title="{{ MessageService::tr('Photos') }}"
                      url="{{ route('photos.index') }}" value="{{ $totalLists->photos }}"/>
        <x-admin.card icon='<i class="fas fa-photo-video"></i>' title="{{ MessageService::tr('Video Gallery') }}"
                      url="{{ route('videos.index') }}" value="{{ $totalLists->videos }}"/>
        <x-admin.card icon='<i class="fas fa-users"></i>' title="{{ MessageService::tr('Managements') }}"
                      url="{{ route('managements.index') }}"
                      value="{{ $totalManagements->managements }}"></x-admin.card>
        <x-admin.card icon='<i class="fas fa-users"></i>' title="{{ MessageService::tr('Users') }}"
                      url="{{ route('users.index') }}" value="{{ $totalUsers->users }}"></x-admin.card>
    </div>
@endsection
