@extends('frontend.layouts.app')
@section('title')
    {{ $list->category->title ?? '' }}
@endsection
@section('content')
    <section class="inner">
        <div class="inner-in">
            <div class="container">
                <div class="inner-out">
                    <div class="inner-name">
                        <span>{{ $list->category->title ?? '' }}</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="page">
        <div class="container">
            <div class="page-in">
                <div class="row">
                    <div class="offset-xxl-1 col-xxl-5 col-lg-6">
                        <div class="about-img">
                            <img src="{{ asset('img/about.png') }}">
                        </div>
                    </div>
                    <div class="col-xxl-6 col-lg-6">
                        <div class="main-title about-title">
                            <div class="main-icon">
                                <img src="{{ asset('img/main.png') }}">
                            </div>
                            <div class="main-title-in">
                                <span>{{ $list->category->title ?? '' }}</span>
                            </div>
                            <div class="main-deacription">
                                <span>{{ tr('Our doctors are guided by the main principle of their work: "The interests of patients are above all!"') }}</span>
                            </div>
                            <div class="main-hr"></div>
                        </div>
                        <div class="about-text">
                          {!! $list->description ?? '' !!}
                        </div>
                    </div>
                </div>
                <x-frontend.service/>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="row justify-content-center">
                            <div class="col-xl-8">
                                <div class="doctor-img">
                                    <img src="{{ asset('img/doctor.jpeg') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
