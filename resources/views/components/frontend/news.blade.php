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
                <img src="{{ asset('img/main.png')}}" alt="main">
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
                <?php if (count($news) > 1): ?>
                    <?php $item = $news[0]; ?>
                <div class="col-xl-6">
                    <div class="news-left">
                        <a href="{{ route('news', $item->slug) }}">
                            <div class="news-left-in">
                                <div class="news-left-img">
                                    <img src="{{ $item->anons_image ?? '' }}"
                                         alt="{{ $item->list_title ?? '' }}">
                                </div>
                                <div class="news-before">
                                    <div class="news-left-date">
                                        <span>{{ tr('Published') }}: {{ displayDateOnly($item->date ?? '') }}</span>
                                    </div>
                                    <div class="news-left-title">
                                        <span>{{ $item->list_title ?? '' }}</span>
                                    </div>
                                    <div class="news-left-description">
                                        <span>{!! Str::words($item->list_description, 5) !!}</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <?php endif; ?>
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
                                                <a href="{{ route('news', $item->slug) }}">{{ $item->category_title ?? '' }}</a>
                                                <span>{{ tr('Published') }}: {{ displayDateOnly($item->date) }}</span>
                                            </div>
                                            <div class="news-right-title">
                                                <a href="{{ route('news', $item->slug) }}">{{ $item->list_title ?? '' }}</a>
                                            </div>
                                            <div class="news-right-description">
                                                <a href="{{ route('news', $item->slug) }}">
                                                    {!! strip_tags(Str::words($item->list_description, 5)) !!}
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
            </div>
        </div>
        <div class="news-all">
            <a href="{{ route('category', 'yangiliklar') }}">{{ tr('All news') }}</a>
        </div>
    </div>
</section>
