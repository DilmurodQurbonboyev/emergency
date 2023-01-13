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
                {{--                <div class="main-icon">--}}
                {{--                    <img src="{{ asset('img/main.png') }}">--}}
                {{--                </div>--}}
                <div class="main-title-in">
                    {{--                    <span>{{ $category->title ?? '' }}</span>--}}
                </div>
                <div class="main-deacription">
                    {{--                    <span>Наши врачи руководствуются главным принципом своей работы: «Интересы пациентов — превыше всего!»</span>--}}
                </div>
                {{--                <div class="main-hr"></div>--}}
            </div>
            <div class="page-in">
                <div class="row">
                    <div class="col-xl-10 offset-xl-1">
                        @foreach($leaders as $leader)
                            <div class="leader">
                                <div class="row">
                                    <div class="col-xxl-2 col-lg-3 col-md-4">
                                        <div class="leader-img">
                                            @if($leader->anons_image)
                                                <img src="{{ $leader->anons_image ?? '' }}"
                                                     alt="{{ $leader->title ?? '' }}">
                                            @else
                                                <img src="{{ asset('img/empty.jpg') }}"
                                                     alt="{{ $leader->title ?? '' }}">
                                            @endif
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
                                            <div class="accordion" id="i1">
                                                <div class="accardion-nav">
                                                    <div class="accordion-header" id="headingOne">
                                                        @if($leader->biography)
                                                            <button class="accordion-button collapsed" type="button"
                                                                    data-bs-toggle="collapse"
                                                                    data-bs-target="#collapse_biography_{{$leader->id}}"
                                                                    aria-expanded="false"
                                                                    aria-controls="collapse_biography_{{$leader->id}}">
                                                                {{ tr('Biography') }}
                                                            </button>
                                                        @endif
                                                    </div>
                                                    <div class="accordion-header" id="headingTwo">
                                                        @if($leader->description)
                                                            <button class="accordion-button collapsed" type="button"
                                                                    data-bs-toggle="collapse"
                                                                    data-bs-target="#collapse_function_{{$leader->id}}"
                                                                    aria-expanded="false"
                                                                    aria-controls="collapse_function_{{$leader->id}}">
                                                                {{ tr('Function') }}
                                                            </button>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="accordion-item">
                                                    <div id="collapse_biography_{{$leader->id}}"
                                                         class="accordion-collapse collapse"
                                                         aria-labelledby="headingOne" data-bs-parent="#i1">
                                                        <div class="accordion-body">
                                                            {!! $leader->biography ?? '' !!}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="accordion-item">
                                                    <div id="collapse_function_{{$leader->id}}"
                                                         class="accordion-collapse collapse"
                                                         aria-labelledby="headingTwo" data-bs-parent="#i1">
                                                        <div class="accordion-body">
                                                            {!! $leader->description ?? '' !!}
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
