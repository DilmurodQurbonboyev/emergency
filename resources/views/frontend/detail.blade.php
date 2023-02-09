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
            <div class="pages-title">
                <div class="pages-icon">
                    <img src="{{ asset('img/main.png') }}" alt="main">
                </div>
                <div class="pages-title-in">
                    <span>{{ $list->title ?? '' }}</span>
                </div>
                <div class="date-eye">
                    <span class="pages-date">{{ displayDateOnly($list->date) }}</span>
                    <svg transform="translate(0 -1)" xmlns="http://www.w3.org/2000/svg" width="20" height="15"
                         viewBox="0 0 25.771 17.855">
                        <path
                            d="M15.235,21.986a5.03,5.03,0,0,0,5.059-5.059,5.03,5.03,0,0,0-5.059-5.059,5.03,5.03,0,0,0-5.059,5.059,5.03,5.03,0,0,0,5.059,5.059Zm0-1.726A3.3,3.3,0,0,1,11.9,16.927a3.3,3.3,0,0,1,3.333-3.333,3.3,3.3,0,0,1,3.333,3.333,3.3,3.3,0,0,1-3.333,3.333Zm0,5.595a13.287,13.287,0,0,1-7.484-2.232,15.062,15.062,0,0,1-5.223-5.892,1.165,1.165,0,0,1-.134-.357,2.254,2.254,0,0,1,0-.893,1.165,1.165,0,0,1,.134-.357,15.062,15.062,0,0,1,5.223-5.892A13.287,13.287,0,0,1,15.235,8a13.287,13.287,0,0,1,7.484,2.232,15.062,15.062,0,0,1,5.223,5.892,1.165,1.165,0,0,1,.134.357,2.254,2.254,0,0,1,0,.893,1.165,1.165,0,0,1-.134.357,15.062,15.062,0,0,1-5.223,5.892A13.287,13.287,0,0,1,15.235,25.855ZM15.235,16.927Zm0,7.142a11.967,11.967,0,0,0,6.621-1.949,12.648,12.648,0,0,0,4.6-5.193,12.649,12.649,0,0,0-4.6-5.193,12.221,12.221,0,0,0-13.242,0,12.861,12.861,0,0,0-4.627,5.193A12.861,12.861,0,0,0,8.614,22.12,11.967,11.967,0,0,0,15.235,24.069Z"
                            transform="translate(-2.35 -8)" fill="#5c5c5c"/>
                    </svg>
                    <span>{{ $list->count_view }}</span>
                </div>
                <div class="pages-deacription">
                    <span>{!! $list->description ?? '' !!}</span>
                </div>
                <div class="pages-hr"></div>
            </div>
            <div class="page-in">
                <div class="news-content">
                    <div class="owl-news">
                        @php
                            $res = explode(',', $list->body_image);
                        @endphp
                        <div class="owl-carousel owl-theme">
                            @foreach ($res as $i)
                                @if ($i)
                                    <div class="item">
                                        <div class="owl-news-in">
                                            <img src="{{ $i }}" alt="{{ $list->title ?? '' }}"/>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="news-content-in">
                        {!! $list->content ?? '' !!}
                    </div>
                    @if($list->pdf && $list->pdf_type == 2)
                        <div class="pdf-out">
                            <div class="pdf-left">
                                <a href="{{ $list->pdf ?? '' }}" download>
                                    <img src="{{ asset('img/pdf.png') }}" alt="pdf">
                                </a>
                            </div>
                            <div class="pdf-right">
                                <div class="pdf-name">
                                    <span>{{ $list->pdf_title ?? '' }}</span>
                                </div>
                                <div class="pdf-download">
                                    <a href="{{ $list->pdf ?? '' }}" download>{{ tr('Download') }}</a>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if($list->pdf && $list->pdf_type == 1)
                        <div class="pdf-in-next">
                            <div class="row justify-content-center">
                                <div class="col-xxl-12">
                                    <iframe
                                        src="{{ $list->pdf }}"
                                        style="width: 100%; height:800px;"></iframe>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            {{--            <div class="page-pagination">--}}
            {{--                <nav>--}}
            {{--                    <ul class="pagination">--}}
            {{--                        <li class="page-item">--}}
            {{--                            <a class="page-link" href="#" aria-label="Previous">--}}
            {{--                                <span aria-hidden="true">&laquo;</span>--}}
            {{--                            </a>--}}
            {{--                        </li>--}}
            {{--                        <li class="page-item">--}}
            {{--                            <a class="page-link" href="#" aria-label="Next">--}}
            {{--                                <span aria-hidden="true">&raquo;</span>--}}
            {{--                            </a>--}}
            {{--                        </li>--}}
            {{--                    </ul>--}}
            {{--                </nav>--}}
            {{--            </div>--}}
        </div>
    </section>
@endsection
