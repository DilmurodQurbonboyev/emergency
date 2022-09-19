@extends('admin.layouts.app')
@section('title')
    {{ tr('Update Message') }}
@endsection
@section('header')


@endsection
@section('content')
    <div class="card card-primary card-outline card-outline-tabs">
        <div class="card-header p-0 border-bottom-0">
        </div>
        <div class="card-body">
            <form action="{{ route('messages.update', $messages->id) }}" method="post">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="key">Message</label>
                    <textarea id="key" name="key" class="form-control">{{ $messages->key }}</textarea>
                </div>
                <div class="form-group">
                    <label for="title_oz">O‘zb</label>
                    <textarea name="title_oz" id=""
                              class="form-control">{{ $messages->translate('oz')->title ?? '' }}</textarea>
                </div>
                <div class="form-group">
                    <label for="title_uz">Ўзб</label>
                    <textarea name="title_uz" id=""
                              class="form-control">{{ $messages->translate('uz')->title ?? '' }}</textarea>
                </div>
                <div class="form-group">
                    <label for="title_ru">Рус</label>
                    <textarea name="title_ru" id=""
                              class="form-control">{{ $messages->translate('ru')->title ?? '' }}</textarea>
                </div>
                <div class="form-group">
                    <label for="title_en">Eng</label>
                    <textarea name="title_en" id=""
                              class="form-control">{{ $messages->translate('en')->title ?? '' }}</textarea>
                </div>
                @include('admin.layouts.update-button')
            </form>
        </div>
    </div>
@endsection
