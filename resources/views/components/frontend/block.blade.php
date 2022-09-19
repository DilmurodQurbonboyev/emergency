<section class="post">
    <div class="container">
        <div class="owl-post">
            <div class="owl-carousel owl-theme">
                @foreach($blocks as $block)
                    <div class="item">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-xl-6 g-0">
                                    <div class="post-img">
                                        <img src="{{ $block->anons_image ?? '' }}" alt="{{ $block->title ?? '' }}">
                                    </div>
                                </div>
                                <div class="col-xl-6 g-0">
                                    <div class="post-right">
                                        <div class="post-date">
                                            <img src="{{ asset('img/post.png') }}">
                                            <span>{{ tr('Published') }}: {{ displayDateOnly($block->created_at) }}</span>
                                        </div>
                                        <div class="post-title">
                                            <span>{{ $block->title ?? '' }}</span>
                                        </div>
                                        <div class="post-description">
                                            <span>{!! $block->description ?? '' !!}</span>
                                        </div>
                                        <div class="post-line"></div>
                                        <div class="post-link">
                                            <a href="{{ route('news', $block->slug) }}">{{ tr('More') }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
