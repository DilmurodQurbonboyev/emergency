<section class="sites">
    <div class="container">
        <div class="main-title">
            <div class="main-icon">
                <img src="{{ asset('img/main.png') }}">
            </div>
            <div class="main-title-in">
                <span>{{ tr('Useful links') }}</span>
            </div>
            <div class="main-deacription">
                <span>{{ tr('This is an opportunity to get acquainted and go to other useful resources and to the websites of state bodies.') }}</span>
            </div>
            <div class="main-hr"></div>
        </div>

        <div class="owl-sites">
            <div class="owl-carousel owl-theme">
                @foreach($usefuls as $useful)
                    <div class="item">
                        <div class="sites-in">
                            <div class="sites-icon">
                                <a href="{{ hrefType($useful->link_type, $useful->link) }}"
                                   target="{{ targetType($useful->link_type) }}">
                                    <img src="{{ $useful->image ?? '' }}" alt="{{ $useful->title ?? '' }}">
                                </a></div>
                            <div class="sites-right">
                                <a class="sites-title" target="{{ targetType($useful->link_type) }}"
                                   href="{{ hrefType($useful->link_type, $useful->link) }}">
                                    {{ $useful->title ?? '' }}
                                </a>
                                <a class="sites-link" href="{{ hrefType($useful->link_type, $useful->link) }}"
                                   target="{{ targetType($useful->link_type) }}">
                                    {{ $useful->link ?? '' }}
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
