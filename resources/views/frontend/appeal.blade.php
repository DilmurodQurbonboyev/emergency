@extends('frontend.layouts.app')
@section('title')
    {{ tr('Appeal') }}
@endsection

@section('content')
    <section class="inner">
        <div class="inner-in">
            <div class="container">
                <div class="inner-out">
                    <div class="inner-name">
                        <span>{{ tr('Appeal') }}</span>
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
                    <span>{{ tr('Appeal') }}</span>
                </div>
                <div class="main-hr"></div>
            </div>
            <div class="page-in">
                <div class="contents">
                    <div class="content-in">
                        <div class="container">
                            @if($errors->any())
                                <div class="alert alert-danger alert-dismissible">
                                    <h5>
                                        <i class="icon fas fa-ban"></i>
                                        {{ tr('Oops Something went wrong') }}
                                    </h5>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="application-form">
                                        <form action="{{ route('appealPost') }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="mb-2">
                                                <label for="fullname"
                                                       class="form-label @error('fullname') text-danger @enderror">{{ tr('Fullname') }}</label>
                                                <input type="text" class="form-control @error('fullname') is-invalid @enderror"
                                                       name="fullname" id="fullname" value="{{ old('fullname') }}">
                                                @error('fullname')
                                                <div class="text-danger p-2">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-2">
                                                <label for="organization"
                                                       class="form-label @error('organization') text-danger @enderror">{{ tr('Organization') }}</label>
                                                <input type="text" class="form-control @error('organization') is-invalid @enderror"
                                                       name="organization" id="organization" value="{{old('organization')}}">
                                                @error('organization')
                                                <div class="text-danger p-2">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-2">
                                                <label for="phone"
                                                       class="form-label @error('phone') text-danger @enderror">{{ tr('Phone') }}</label>
                                                <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                                       name="phone" id="phone" value="{{ old('phone') }}">
                                                @error('phone')
                                                <div class="text-danger p-2">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-2">
                                                <label for="email"
                                                       class="form-label @error('email') text-danger @enderror">{{tr('Email')}}</label>
                                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                                       name="email" id="email" value="{{ old('email') }}">
                                                @error('email')
                                                <div class="text-danger p-2">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-2">
                                                <label for="appeal_type"
                                                       class="form-label @error('appeal_type') text-danger @enderror">{{tr('The content of the appeal')}}</label>
                                                <select class="form-select select2 @error('appeal_type') is-invalid @enderror"
                                                        name="appeal_type" id="appeal_type">
                                                    <option value>{{tr('Select')}}</option>
                                                    <option value="1" {{ old('appeal_type', $appeal->appeal_type) == 1 ? 'selected' : '' }}>{{ tr('Complaint') }}</option>
                                                    <option value="2" {{ old('appeal_type', $appeal->appeal_type) == 2 ? 'selected' : '' }}>{{ tr('Gratitude') }}</option>
                                                    <option value="3" {{ old('appeal_type', $appeal->appeal_type) == 3 ? 'selected' : '' }}>{{tr('Appeal')}}</option>
                                                </select>
                                                @error('appeal_type')
                                                <div class="text-danger p-2">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-2">
                                                <label for="address"
                                                       class="form-label @error('address') text-danger @enderror">{{tr('Address')}}</label>
                                                <input type="text" class="form-control @error('address') is-invalid @enderror"
                                                       name="address" id="address" value="{{ old('address') }}">
                                                @error('address')
                                                <div class="text-danger p-2">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-2">
                                                <label for="file"
                                                       class="form-label @error('file') text-danger @enderror">{{tr('File')}}</label>
                                                <input class="form-control @error('file') is-invalid @enderror" type="file"
                                                       name="file" id="file">
                                                @error('file')
                                                <div class="text-danger p-2">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-2">
                                                <label for="message" class="form-label">{{tr('Content')}}</label>
                                                <textarea class="form-control" name="message" id="message" rows="3">{{ old('message') }}</textarea>
                                            </div>
                                            <div class="mb-2">
                                                <p class="@error('_answer') text-danger @enderror">Captcha</p>
                                                {!!getCaptchaBox()!!}
                                                @error('_answer')
                                                <div class="text-danger p-2">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <button type="submit" class="btn btn-primary">{{ tr('Send') }}</button>
                                        </form>
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
