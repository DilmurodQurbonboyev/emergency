@extends('frontend.layouts.app')
@section('title')
    {{ $category->title ?? '' }}
@endsection
<?php
$name = 'name_' . app()->getLocale();
?>
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
                <div class="main-deacription p-2">
                    <span>{{ tr('Our doctors are guided by the main principle of their work: "The interests of patients are above all!"') }}</span>
                </div>
                <div class="main-hr"></div>
            </div>
            <div class="page-in">
                <div class="row">
                    @foreach($leaders as $leader)
                        <div class="col-xl-4 col-lg-6">
                            <div class="office">
                                <div class="region-right-in">
                                    <div class="region-right-title">
                                        <span>{{ $leader->regions->$name }}</span>
                                    </div>
                                    <div class="region-img">
                                        <img src="{{ $leader->anons_image ?? '' }}" alt="region">
                                    </div>
                                    <div class="region-leader in-region-leader">
                                        <span>{{ $leader->leader ?? '' }}</span>
                                    </div>
                                    <div class="region-position in-region-position">
                                        <span>{{ $leader->title ?? '' }}</span>
                                    </div>
                                    <div class="region-date in-region-date">
                                        <img src="{{ asset('img/r-loc.png') }}">
                                        <span>{{ $leader->address ?? '' }}</span>
                                    </div>
                                    <div class="region-date">
                                        <img src="{{ asset('img/r-call.png') }}">
                                        <a href="tel:{{ $leader->phone ?? '' }}">{{ $leader->phone ?? '' }}</a>
                                    </div>
                                    <div class="region-date no-border">
                                        <img src="{{ asset('img/r-email.png') }}">
                                        <a href="#">{{ $leader->email ?? '' }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="page-pagination">
                {{ $leaders->links('frontend.layouts.pagination') }}
            </div>
        </div>
    </section>
@endsection
