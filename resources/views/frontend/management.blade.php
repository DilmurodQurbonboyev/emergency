@extends('frontend.layouts.app')
@section('title')
@endsection
@section('content')
    <section class="inner">
        <div class="inner-in">
            <div class="container">
                <div class="inner-out">
                    <div class="inner-name">
                        <span>{{ $category->title ?? '' }}</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="page">
        <div class="container">
            <div class="main-title">
                <div class="main-icon">
                    <img src="{{ asset('img/main.png') }}">
                </div>
                <div class="main-title-in">
{{--                    <span>{{ $category->title ?? '' }}</span>--}}
                </div>
                <div class="main-deacription">
{{--                    <span>Наши врачи руководствуются главным принципом своей работы: «Интересы пациентов — превыше всего!»</span>--}}
                </div>
                <div class="main-hr"></div>
            </div>
            <div class="page-in">
                <div class="row">
                    <div class="col-xl-10 offset-xl-1">
                        @foreach($leaders as $leader)
                            <div class="leader">
                                <div class="row">
                                    <div class="col-xxl-2 col-lg-3 col-md-4">
                                        <div class="leader-img">
                                            <img src="{{ $leader->anons_image ?? '' }}" alt="{{ $leader->title ?? '' }}">
                                        </div>
                                    </div>
                                    <div class="col-xxl-10 col-lg-9 col-md-8">
                                        <div class="leader-in">
                                            <div class="leader-name">
                                                <span>{{ $leader->leader ?? '' }}</span>
                                            </div>
                                            <div class="leader-position">
                                                <span>{{ $leader->title ?? '' }}</span>
                                            </div>
                                            <div class="leader-date">
                                                <div class="row">
                                                    <div class="col-xl-4">
                                                        <div class="leader-left">
                                                            <span>{{ tr('Phone') }}:</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-8">
                                                        <div class="leader-right">
                                                            <a href="#">{{ $leader->phone ?? '' }}</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="leader-date">
                                                <div class="row">
                                                    <div class="col-xl-4">
                                                        <div class="leader-left">
                                                            <span>{{ tr('Reception') }}:</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-8">
                                                        <div class="leader-right">
                                                            <span>{{ $leader->reception ?? '' }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="leader-date">
                                                <div class="row">
                                                    <div class="col-xl-4">
                                                        <div class="leader-left">
                                                            <span>{{ tr('Email') }}:</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-8">
                                                        <div class="leader-right">
                                                            <a href="#">{{ $leader->email ?? '' }}</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="page-pagination">
                {{ $leaders->links('frontend.layouts.pagination') }}
            </div>
        </div>
    </section>
@endsection
