@extends('frontend.layouts.app')
@section('title')
    {{ $list->category->title ?? '' }}
@endsection
@section('content')
    {{ $list->title ?? '' }}
    {{ displayDateOnly($list->date) }}
    {!! $list->description ?? '' !!}
    {!! $list->content ?? '' !!}
@endsection
