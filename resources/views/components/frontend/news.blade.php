@php use Illuminate\Support\Str; @endphp
<section class="news">
    <div class="container">
        <div class="main-title">
            <div class="main-icon">
                <img src="{{ asset('img/main.png')}}">
            </div>
            <div class="main-title-in">
                <span>{{ tr('News of the center') }}</span>
            </div>
            <div class="main-deacription">
                <span>{{ tr('We always inform you about our achievements and publish the latest news') }}</span>
            </div>
            <div class="main-hr"></div>
        </div>
        <div class="news-row">
            <div class="row">
                <div class="col-xl-6">
                    @isset($lastItem->description)
                        <div class="news-left">
                            <a href="{{ route('news', $lastItem->slug ?? '') }}">
                                <div class="news-left-in">
                                    <div class="news-left-img">
                                        <img src="{{ $lastItem->anons_image ?? '' }}"
                                             alt="{{ $lastItem->title ?? '' }}">
                                    </div>
                                    <div class="news-before">
                                        <div class="news-left-date">
                                            <span>{{ tr('Published') }}: {{ displayDateOnly($lastItem->date ?? '') }}</span>
                                        </div>
                                        <div class="news-left-title">
                                            <span>{{ $lastItem->title ?? '' }}</span>
                                        </div>
                                        <div class="news-left-description">
                                            <span>{!! Str::words($lastItem->description, 5) !!}</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endif
                </div>
                <div class="col-xl-6">
                    <div class="news-right">
                        @foreach($news as $new)
                            <div class="news-right-item">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="news-right-img">
                                            <a href="{{ route('news', $new->slug) }}">
                                                <img
                                                    src="{{ $new->anons_image ?? '' }}" alt="{{ $new->title ?? '' }}">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="news-right-date">
                                            <a href="{{ route('news', $new->slug) }}">{{ $new->category->title ?? '' }}</a>
                                            <span>{{ tr('Published') }}: {{ displayDateOnly($new->date) }}</span>
                                        </div>
                                        <div class="news-right-title">
                                            <a href="{{ route('news', $new->slug) }}">{{ $new->title ?? '' }}</a>
                                        </div>
                                        <div class="news-right-description">
                                            <a href="{{ route('news', $new->slug) }}">
                                                {!! Str::words($new->description, 5) !!}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="news-all">
            <a href="#">{{ tr('All news') }}</a>
        </div>
    </div>
</section>
