@extends('admin.layouts.app')
@section('title')
{{tr('About Message')}}
@endsection
@section('header')
<x-admin.breadcrumb-show :show="$messages->title ?? '' " :breadcrumb="'messages/show'" :id="$messages->id" />
@endsection
@section('content')
<div class="p-3 d-flex justify-content-end" style="grid-gap: 2px">
    <button onclick="print()" class="cards btn btn-secondary">
        <i class="fas fa-print"></i>
    </button>
    <a class="btn btn-success cards" href="{{ route('messages.create') }}">
        <i class="fa fa-plus"></i>
    </a>
    <a class="btn btn-info text-white cards" href="{{ route('messages.index') }}">
        <i class="fa fa-list"></i>
    </a>
    <a class="btn btn-primary cards" href="{{ route('messages.edit', $messages->id) }}">
        <i class="fa fa-edit"></i>
    </a>
    <form method="POST" action="{{ route('messages.destroy', $messages->id) }}">
        @csrf
        <input name="_method" type="hidden" value="DELETE">
        <button type="submit" class="cards btn btn-danger deleteBtn">
            <span class="fas fa-eraser"></span></button>
    </form>
</div>
<div class="card card-primary card-outline card-tabs">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table  table-striped table-hover">
                <tbody>
                    <tr>
                        <td>{{ tr('Id') }}</td>
                        <th scope="row">{{ $messages->id }}</th>
                    </tr>
                    <tr>
                        <td>O‘zb</td>
                        <th scope="row">{!! $messages->translate('oz')->title ?? '---' !!}</th>
                    </tr>
                    <tr>
                        <td>Ўзб</td>
                        <th scope="row">{!! $messages->translate('uz')->title ?? '---' !!}</th>
                    </tr>
                    <tr>
                        <td>Рус</td>
                        <th scope="row">{!! $messages->translate('ru')->title ?? '---' !!}</th>
                    </tr>
                    <tr>
                        <td>Eng</td>
                        <th scope="row">{!! $messages->translate('en')->title ?? '---' !!}</th>
                    </tr>
                    <tr>
                        <td>{{tr('Created At')}}</td>
                        <th scope="row">
                            {{ $messages->created_at->format('d.m.Y') }} <br />
                            {{ $messages->created_at->format('H:i') }}
                        </th>
                    </tr>
                    <tr>
                        <td>{{tr('Updated At')}}</td>
                        <th scope="row">
                            {{ $messages->updated_at->format('d.m.Y') }}<br />
                            {{ $messages->updated_at->format('H:i') }}
                        </th>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
