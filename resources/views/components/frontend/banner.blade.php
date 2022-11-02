<section class="banner">
    <div class="banner-in">
        <div class="banner-background">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-3">
                        <div class="banner-left"></div>
                    </div>
                    <div class="col-xl-9 gx-0">
                        <div class="banner-right">
                            <img src="{{ asset('img/banner.png') }}" alt="banner">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="banner-text">
            <div class="container">
                <div class="banner-text-in">
                    <div class="banner-text-out">
                        <div class="banner-text-span">
                            <span>
                                {!! tr('Welcome to the website of the Republican Ambulance Center') !!}
                            </span>
                        </div>
                        <div class="banner-link">
                            <a class="banner-link-left" href="{{ route('about', 'markaz-haqida') }}">{{ tr('Learn more') }}</a>
                            <a class="banner-link-right" href="{{ route('pages', 'bizning-xizmatlar') }}">{{ tr('Our services') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
