@extends('frontend.layouts.app')
@section('title')
    <!-- category --> {{ $category->title }}
@endsection

@section('content')
    @foreach($lists as $list)
        <!-- title --> {{ $list->title ?? '' }}
        <!-- description --> {!! $list->description ?? '' !!}
        <!-- content --> {!! $list->content ?? '' !!}
        <!-- anons_image --> {{$list->anons_image ?? ''}}
        <!-- slug --> {{ $list->slug }}
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
    @endforeach
@endsection
