<section class="media">
    <div class="container">
        <div class="main-title">
            <div class="main-icon">
                <img src="{{ asset('img/main.png') }}">
            </div>
            <div class="main-title-in">
                <span>{{ tr('Photo and video gallery') }}</span>
            </div>
            <div class="main-deacription">
                <span>{{ tr('An immersion into our sphere through the prism of our photos and videos') }}</span>
            </div>
            <div class="main-hr"></div>
        </div>
    </div>
    <div class="owl-media">
        <div class="owl-carousel owl-theme">
            @foreach($medias as $media)
                @if($media->list_type_id == 7)
                    <div class="item">
                        <div class="media-in">
                            <a data-fancybox="gallery-{{ $media->id }}"
                               data-src="{{ $media->anons_image }}">
                                <div class="media-out">
                                    <img
                                        src="{{ $media->anons_image }}" alt="{{ $media->title ?? '' }}">
                                </div>
                            </a>
                                <?php
                                if (!empty($media->body_image) && is_array(explode(',', $media->body_image))) {
                                    $bodyImages = explode(',', $media->body_image);
                                }
                                ?>
                            @foreach ($bodyImages as $i)
                                @if ($i)
                                    <a style="display: none;" data-fancybox="gallery-{{ $media->id }}"
                                       data-src="{{ $i }}">
                                        <img src="{{ $i }}" alt="{{ $media->title ?? '' }}">
                                    </a>
                                @endif
                            @endforeach

                        </div>
                    </div>
                @endif
                @if($media->list_type_id == 8)
                    @if($media->media_type == 4)
                        <div class="item">
                            <div class="media-in">
                                <a href="https://utube.uz/embed/{{ $media->video_code }}" data-fancybox
                                   data-type="iframe">
                                    <div class="media-out play">
                                        <img
                                            src="https://samcancer.uz/media/k2/items/cache/00d9b1e39f02d57be65ad2a9a6eaa3b8_XL.jpg">
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endif
                    @if($media->media_type == 5)
                        <div class="item">
                            <div class="media-in">
                                <a data-fancybox="video-gallery"
                                   href="https://www.youtube.com/watch?v={{ $media->video_code }}">
                                    <div class="media-out play">
                                        <img src="https://xabar.uz/static/crop/3/5/736_736_95_3501462813.jpg">
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endif
                @endif
            @endforeach
        </div>
    </div>
    <div class="container">
        <div class="news-all">
            <a href="#">{{ tr('All PhotoGallery') }}</a>
            <a href="#">{{ tr('All VideoGallery') }}</a>
        </div>
    </div>
</section>
