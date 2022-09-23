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
{{--                    <span>Foto list</span>--}}
                </div>
                <div class="main-deacription p-2">
                    <span>{{ tr('An immersion into our sphere through the prism of our photos and videos') }}</span>
                </div>
                <div class="main-hr"></div>
            </div>
            <div class="page-in">
                <div class="row">
                    @foreach($lists as $list)
                        <div class="col-xl-4 col-md-6">
                            <div class="foto-in">
                                <a data-fancybox="gallery-{{ $list->id }}" data-src="{{$list->anons_image ?? ''}}">
                                    <div class="foto-out">
                                        <img src="{{$list->anons_image ?? ''}}">
                                    </div>
                                    <div class="foto-title">
                                        <span>{{ $list->title ?? '' }}</span>
                                    </div>
                                    <div class="foto-date">
                                        <span class="f-left">{{ displayDateOnly($list->date) }}</span>
                                        <span class="f-right">
											<img src="{{ asset('img/f-right.png') }}" alt="right">
										</span>
                                    </div>
                                </a>
                                    <?php
                                    if (!empty($list->body_image) && is_array(explode(',', $list->body_image))) {
                                        $bodyImages = explode(',', $list->body_image);
                                    }
                                    ?>
                                @foreach ($bodyImages as $i)
                                    @if ($i)
                                        <a class="d-none" data-fancybox="gallery-{{ $list->id }}" data-src="{{ $i }}">
                                            <img src="{{ $i }}" alt="{{ $list->title ?? '' }}">
                                        </a>
                                    @endif
                                @endforeach
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
