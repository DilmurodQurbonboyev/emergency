@extends('frontend.layouts.app')
@section('title')
    {{ $category->title }}
@endsection

@section('content')
    <section class="inner">
        <div class="inner-in">
            <div class="container">
                <div class="inner-out">
                    <div class="inner-name">
                        <span>{{ $category->title }}</span>
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
                    <span>{{ $category->title }}</span>
                </div>
                <div class="main-deacription">
                    <span>Наши врачи руководствуются главным принципом своей работы: «Интересы пациентов — превыше всего!»</span>
                </div>
                <div class="main-hr"></div>
            </div>
            <div class="page-in">
                <div class="row">
                    @foreach($lists as $list)
                        <div class="col-xl-4 col-md-6">
                            <div class="news-page">
                                <div class="news-image">
                                    <a href="#">
                                        <img
                                            src="{{ $list->anons_image ?? ''}}" alt="{{ $list->title ?? '' }}">
                                    </a>
                                </div>
                                <div class="date-category">
                                    <span>{{ displayDateOnly($list->date) }}</span>
                                    <span> | </span>
                                    <a href="#">{{ $list->category_title ?? '' }}</a>
                                </div>
                                <div class="news-title">
                                    <a href="#">Истеъмолчиларга сифатли нефть маҳсулотлари етказилиши…</a>
                                </div>
                                <div class="news-description">
                                    <span>Нефть, газ ҳамда газ конденсати қазиб чиқариш, қайта ишлаш ва сотиш, фаолиятига лицензия олиш учун… “Ўзнефтгазинспекция” ҳудудий бўлимлари томонидан . . . ўрнатилган технологик жараёнлар ва асбоб-ускуналарнинг</span>
                                </div>
                                <div class="news-link">
                                    <a href="#">Батафсил</a>
                                </div>
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
