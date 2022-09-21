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
                    <img src="{{ asset('img/main.png') }}" alt="main">
                </div>
                <div class="main-title-in d-none">
                    <span>{{ $category->title }}</span>
                </div>
                <div class="main-deacription p-2">
                    <span>{{ tr('We always inform you about our achievements and publish the latest news') }}</span>
                </div>
                <div class="main-hr"></div>
            </div>
            <div class="page-in">
                <div class="row">
                    @foreach($lists as $list)
                        <div class="col-xl-4 col-md-6">
                            <div class="news-page">
                                <div class="news-image">
                                    <a href="{{ route('news', $list->slug) }}">
                                        <img
                                            src="{{ $list->anons_image ?? ''}}" alt="{{ $list->title ?? '' }}">
                                    </a>
                                </div>
                                <div class="date-category">
                                    <span>{{ displayDateOnly($list->date) }}</span>
                                    <span> | </span>
                                    <a href="{{ route('news', $list->slug) }}">{{ $list->category_title ?? '' }}</a>
                                </div>
                                <div class="news-title">
                                    <a href="{{ route('news', $list->slug) }}">{{ $list->title ?? '' }}</a>
                                </div>
                                <div class="news-description">
                                    <span>{!! $list->description ?? '' !!}</span>
                                </div>
                                <div class="news-link">
                                    <a href="{{ route('news', $list->slug) }}">{{ tr('More') }}</a>
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
