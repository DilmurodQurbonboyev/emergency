@extends('frontend.layouts.app')
@section('title')
    <!-- category --> {{ $category->title }}
@endsection
@section('content')
    @foreach($lists as $list)
        <!-- title --> {{ $list->title ?? '' }}
        <!-- description --> {!! $list->description ?? '' !!}
        <!-- content --> {!! $list->content ?? '' !!}
        <!-- slug --> {{ $list->slug }}
        <!-- anons_image --> {{$list->anons_image ?? ''}}
            <?php
            if (!empty($list->body_image) && is_array(explode(',', $list->body_image))) {
                $bodyImages = explode(',', $list->body_image);
            }
            ?>
        @foreach ($bodyImages as $i)
            @if ($i)
                <!-- body_image --> {{ $i }}
            @endif
        @endforeach
        <!-- date --> {{ $list->date }}
        <!-- pdf --> {{ $list->pdf ?? '' }}
        <!-- pdf_title --> {{ $list->pdf_title ?? '' }}
        <!-- show_on_slider --> {{ $list->show_on_slider ?? '' }}
    @endforeach
@endsection
