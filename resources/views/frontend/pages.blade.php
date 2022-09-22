@extends('frontend.layouts.app')
@section('title')
    {{ $category->title ?? '' }}
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
                    <img src="{{ asset('img/main.png') }}" alt="icon">
                </div>
                <div class="main-title-in">
                    <span>{{ $category->title ?? '' }}</span>
                </div>
                <div class="main-deacription">
                    <span>Наши врачи руководствуются главным принципом своей работы: «Интересы пациентов — превыше всего!»</span>
                </div>
                <div class="main-hr"></div>
            </div>
            <div class="page-in">
                <div class="row">
                    @foreach($lists as $list)
                        <div class="col-xl-3 col-md-6">
                            <div class="document">
                                <a href="#">
                                    <div class="document-in">
                                        <div class="document-icon">
                                            <img src="{{ asset('img/document-1.png') }}" alt="{{ $list->title ?? '' }}">
                                        </div>
                                        <div class="document-hr"></div>
                                        <div class="document-title">
                                            <span>{{ $list->title ?? '' }}</span>
                                        </div>
                                        <div class="document-description">
                                            <span>{{ $list->description ?? '' }}</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="page-pagination">
                {{ $lists->links('frontend.layouts.pagination') }}
            </div>
        </div>
    </section>
@endsection