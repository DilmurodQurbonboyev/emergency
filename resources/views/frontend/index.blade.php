@extends('frontend.layouts.app')
@section('title')
@endsection
@section('content')
    <x-frontend.banner />
    <section class="service">
        <x-frontend.service/>
    </section>
    <x-frontend.region/>
    <x-frontend.block/>
    <x-frontend.news/>
    <x-frontend.media/>
    <x-frontend.partner/>
    <x-frontend.useful/>
@endsection
