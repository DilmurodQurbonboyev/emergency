@extends('frontend.layouts.app')
@section('title')
    {{ tr('Search') }}
@endsection
@section('content')
    <section class="inner">
        <div class="inner-in">
            <div class="container">
                <div class="inner-out">
                    <div class="inner-name">
                        <span>{{ tr('Search') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="page">
        <div class="container">
            <div class="main-title">
                <div class="main-icon">
{{--                    <img src="img/main.png">--}}
                </div>
                <!-- <div class="main-title-in">
                    <span>Региональные подразделения</span>
                </div> -->
                <div class="main-deacription">
{{--                    <span>Наши врачи руководствуются главным принципом своей работы: «Интересы пациентов — превыше всего!»</span>--}}
                </div>
{{--                <div class="main-hr"></div>--}}
            </div>
            <div class="page-in">
                <div class="row">
                    <div class="offset-xxl-2 col-xxl-8 col-xl-12">
                        @forelse ($lists as $list)
                            <div class="card search-detail">
                                <div class="card-header">
                                    {{ $list->category->title ?? '' }}
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">{{ $list->title ?? '' }}</h5>
                                    <p class="card-text">{!! $list->description ?? '' !!}</p>
                                    <a href="{{ route('news', $list->slug) }}" class="search-link">{{ tr('More') }}</a>
                                </div>
                            </div>
                        @empty
                            <div class="simple-list">
                                <ul>
                                    <div class="alert alert-success col-md-12 mt-3">{{ tr('No result found') }} ...</div>
                                </ul>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
            <div class="page-pagination">
                {{ $lists->links('frontend.layouts.pagination') }}
            </div>
        </div>
    </section>
@endsection
