<section class="partners">
    <div class="container">
        <div class="main-title">
            <div class="main-icon">
                <img src="{{ asset('img/main.png') }}">
            </div>
            <div class="main-title-in">
                <span>{{ tr('Our international partners') }}</span>
            </div>
            <div class="main-deacription">
                <span>{{ tr('Our doctors are guided by the main principle of their work') }}</span>
            </div>
            <div class="main-hr"></div>
        </div>
        <div class="owl-partners">
            <div class="owl-carousel owl-theme">
                @foreach($partners as $partner)
                    <div class="item">
                        <div class="partners-in">
                            <a href="{{ hrefType($partner->link_type, $partner->link) }}" target="{{ targetType($partner->link_type) }}">
                                <div class="partners-out">
                                    <img src="{{ $partner->image ?? '' }}">
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
