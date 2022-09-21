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
                                <span>О центре</span>
                            </div>
                            <div class="main-deacription">
                                <span>Наши врачи руководствуются главным принципом своей работы: «Интересы пациентов — превыше всего!»</span>
                            </div>
                            <div class="main-hr"></div>
                        </div>
                        <div class="about-text">
                          {!! $list->description ?? '' !!}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xxl-3 col-lg-6">
                        <div class="service-in">
                            <div class="service-icon">
                                <img src="{{ asset('img/ser1.png') }}">
                            </div>
                            <div class="service-hr"></div>
                            <div class="service-number">
                                <span>18 963</span>
                            </div>
                            <div class="service-text">
                                <span>вызовы, выполненные бригадами за 2022 год</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-lg-6">
                        <div class="service-in">
                            <div class="service-icon">
                                <img src="{{ asset('img/ser2.png') }}">
                            </div>
                            <div class="service-hr"></div>
                            <div class="service-number">
                                <span>18 963</span>
                            </div>
                            <div class="service-text">
                                <span>госпитализировано<br> в 2022 году</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-lg-6">
                        <div class="service-in">
                            <div class="service-icon">
                                <img src="{{ asset('img/ser3.png') }}">
                            </div>
                            <div class="service-hr"></div>
                            <div class="service-number">
                                <span>18 963</span>
                            </div>
                            <div class="service-text">
                                <span>обратились за медицинской помощью в 2022 году</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-lg-6">
                        <div class="service-in">
                            <div class="service-icon">
                                <img src="{{ asset('img/ser4.png') }}">
                            </div>
                            <div class="service-hr"></div>
                            <div class="service-number">
                                <span>18 963</span>
                            </div>
                            <div class="service-text">
                                <span>оказана мед. помощь на месте в 2022 году</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="main-title about-title">
                            <div class="main-icon">
                                <img src="{{ asset('img/main.png') }}">
                            </div>
                            <div class="main-title-in">
                                <span>Врачи</span>
                            </div>
                            <div class="main-deacription">
                                <span>Наши врачи руководствуются главным принципом своей работы: «Интересы пациентов — превыше всего!»</span>
                            </div>
                            <div class="main-hr"></div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="about-text">
                          {!! $list->content ?? '' !!}
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="row justify-content-center">
                            <div class="col-xl-6 col-md-6">
                                <div class="doctor">
                                    <div class="doctor-icon">
                                        <img src="{{ asset('img/vr-1.png') }}">
                                    </div>
                                    <div class="doctor-text">
                                        <span>Вызовы</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-6">
                                <div class="doctor">
                                    <div class="doctor-icon">
                                        <img src="{{ asset('img/vr-2.png') }}">
                                    </div>
                                    <div class="doctor-text">
                                        <span>Койка</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-6">
                                <div class="doctor">
                                    <div class="doctor-icon">
                                        <img src="{{ asset('img/vr-3.png') }}">
                                    </div>
                                    <div class="doctor-text">
                                        <span>Стоматология</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-6">
                                <div class="doctor">
                                    <div class="doctor-icon">
                                        <img src="{{ asset('img/vr-4.png') }}">
                                    </div>
                                    <div class="doctor-text">
                                        <span>Лаборатория</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-6">
                                <div class="doctor">
                                    <div class="doctor-icon">
                                        <img src="{{ asset('img/vr-5.png') }}">
                                    </div>
                                    <div class="doctor-text">
                                        <span>Обратились</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-6">
                                <div class="doctor">
                                    <div class="doctor-icon">
                                        <img src="{{ asset('img/vr-6.png') }}">
                                    </div>
                                    <div class="doctor-text">
                                        <span>Все услуги</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
