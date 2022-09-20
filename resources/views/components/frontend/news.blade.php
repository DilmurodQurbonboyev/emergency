@php
    use Illuminate\Support\Str;
/**
* @var $news
*/
@endphp
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
                <?php
                if (count($news) > 1){
                    $item = $news[0];
                    ?>
                <div class="col-xl-6">
                    <div class="news-left">
                        <a href="{{ route('news', $item->slug ?? '') }}">
                            <div class="news-left-in">
                                <div class="news-left-img">
                                    <img src="{{ $item->anons_image ?? '' }}"
                                         alt="{{ $item->title ?? '' }}">
                                </div>
                                <div class="news-before">
                                    <div class="news-left-date">
                                        <span>{{ tr('Published') }}: {{ displayDateOnly($item->date ?? '') }}</span>
                                    </div>
                                    <div class="news-left-title">
                                        <span>{{ $item->title ?? '' }}</span>
                                    </div>
                                    <div class="news-left-description">
                                        <span>{!! Str::words($item->description, 5) !!}</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="news-right">
                            <?php $i = 0; ?>
                        @foreach ($news as $item)
                            @if($i != 0 && $i < 5)
                                <div class="news-right-item">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="news-right-img">
                                                <a href="{{ route('news', $item->slug) }}">
                                                    <img
                                                        src="{{ $item->anons_image ?? '' }}"
                                                        alt="{{ $item->title ?? '' }}">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="news-right-date">
                                                <a href="{{ route('news', $item->slug) }}">{{ $item->category->title ?? '' }}</a>
                                                <span>{{ tr('Published') }}: {{ displayDateOnly($item->date) }}</span>
                                            </div>
                                            <div class="news-right-title">
                                                <a href="{{ route('news', $item->slug) }}">{{ $item->title ?? '' }}</a>
                                            </div>
                                            <div class="news-right-description">
                                                <a href="{{ route('news', $item->slug) }}">
                                                    {!! Str::words($item->description, 5) !!}
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                                <?php $i++; ?>
                        @endforeach
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
        <div class="news-all">
            <a href="#">{{ tr('All news') }}</a>
        </div>
    </div>
</section>
