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
        <!-- media_type --> {{ $list->media_type }}
        <!-- link_type --> {{ $list->link_type }}
        <!-- link --> {{ $list->link }}
        <!-- date --> {{ $list->date }}
    @endforeach
@endsection
