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
                                        <a data-fancybox data-src="{{ $leader->anons_image ?? '' }}" data-caption="{{ $leader->leader ?? '' }}">
                                            <img src="{{ $leader->anons_image ?? '' }}" width="200" height="150"/>
                                        </a>
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
                                    <div class="accordion" id="i1">
                                        <div class="accardion-nav">
                                            <div class="accordion-header" id="headingOne">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                                    Биография
                                                </button>
                                            </div>
                                            <div class="accordion-header" id="headingTwo">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                    Функциялари
                                                </button>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#i1">
                                                <div class="accordion-body">
                                                    <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#i1">
                                                <div class="accordion-body">
                                                    <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
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
            <div class="page-pagination">
                {{ $leaders->links('frontend.layouts.pagination') }}
            </div>
        </div>
    </section>
@endsection
