@extends('frontend.layouts.app')
@section('title')
    {{ tr('Check the status of the application') }}
@endsection

@section('content')
    <section class="inner">
        <div class="inner-in">
            <div class="container">
                <div class="inner-out">
                    <div class="inner-name">
                        <span>{{ tr('Check the status of the application') }}</span>
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
                    <span>{{ tr('Check the status of the application') }}</span>
                </div>
                <div class="main-hr"></div>
            </div>
            <div class="page-in">
                <div class="contents">
                    <div class="content-in">
                        <div class="container">
                            <div class="row" style="padding: 12px">
                                <div class="col-xl-12">
                                    <div class="application-form">
                                        <form class="form" action="{{ route('statusPost') }}" method="post">
                                            @csrf
                                            <div class="inner-title">
                                                <span>{{ tr('If you have an application, enter the number in the box below and click the "Check" button to find out the status of your application.') }}</span>
                                            </div>
                                            <div class="form-field field d-flex">
                                                <div class="inner-input mt-2" style="flex: 1">
                                                    <input type="text" class="input form-control" id="code" name="code"
                                                           value="{{ old('code') }}"
                                                           placeholder="{{ tr('Write application number') }}">
                                                </div>
                                                <div class="ms-2 mt-2">
                                                    <button class="btn btn-primary" type="submit">{{ tr('Send') }}</button>
                                                </div>

                                            </div>
                                        </form>
                                        @error('code')
                                        <div class="inner-error">
                                            <div class="inner-error-title">
                                                <span>{{ tr('Error') }}</span>
                                            </div>
                                            <div class="inner-error-span">
                                                <span>{{ tr('The application number was written incorrectly') }}</span>
                                            </div>
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
