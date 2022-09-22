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
                    <img src="{{ asset('img/main.png') }}">
                </div>
                <div class="main-title-in">
                    {{--                    <span>Video list</span>--}}
                </div>
                <div class="main-deacription p-2">
                    <span>{{ tr('An immersion into our sphere through the prism of our photos and videos') }}</span>
                </div>
                <div class="main-hr"></div>
            </div>
            <div class="page-in">
                <div class="row">
                    @foreach($lists as $list)
                        @if($list->media_type == 5)
                            <div class="col-xl-4 col-md-6">
                                <div class="video-in">
                                    <a data-fancybox="video-gallery"
                                       href="https://youtu.be/{{ $list->video_code ?? '' }}">
                                        <div class="video-out play">
                                            <img src="{{ $list->image ?? '' }}" alt="{{ $list->title ?? '' }}">
                                        </div>
                                    </a>
                                    <div class="video-title">
                                        <span>{{ $list->title ?? '' }}</span>
                                    </div>
                                    <div class="video-description">
                                        <span>{!! $list->description ?? '' !!}</span>
                                    </div>
                                    <div class="video-date">
                                        <span>{{ displayDateOnly($list->date) }}</span>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if($list->media_type == 4)
                            <div class="col-xl-4 col-md-6">
                                <div class="video-in">
                                    <a href="https://utube.uz/embed/{{ $list->video_code }}" data-fancybox data-type="iframe">
                                        <div class="video-out play">
                                            <img
                                                src="{{ $list->image ?? '' }}" alt="{{$list->title ?? ''}}">
                                        </div>
                                    </a>
                                    <div class="video-title">
                                        <span>{{ $list->title ?? '' }}</span>
                                    </div>
                                    <div class="video-description">
                                        <span>{!! $list->description ?? '' !!}</span>
                                    </div>
                                    <div class="video-date">
                                        <span>{{ displayDateOnly($list->date) }}</span>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="page-pagination">
                {{ $lists->links('frontend.layouts.pagination') }}
            </div>
        </div>
    </section>
@endsection
