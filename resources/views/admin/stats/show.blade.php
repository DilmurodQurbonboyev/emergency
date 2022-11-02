@extends('admin.layouts.app')
@section('title')
{{tr('About Message')}}
@endsection
@section('header')
<x-admin.breadcrumb-show :show="$stat->title ?? '' " :breadcrumb="'stats/show'" :id="$stat->id" />
@endsection
@section('content')
<div class="p-3 d-flex justify-content-end" style="grid-gap: 2px">
    <button onclick="print()" class="cards btn btn-secondary">
        <i class="fas fa-print"></i>
    </button>
    <a class="btn btn-success cards" href="{{ route('stats.create') }}">
        <i class="fa fa-plus"></i>
    </a>
    <a class="btn btn-info text-white cards" href="{{ route('stats.index') }}">
        <i class="fa fa-list"></i>
    </a>
    <a class="btn btn-primary cards" href="{{ route('stats.edit', $stat->id) }}">
        <i class="fa fa-edit"></i>
    </a>
    <form method="POST" action="{{ route('stats.destroy', $stat->id) }}">
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
                        <th scope="row">{{ $stat->id }}</th>
                    </tr>
                    <tr>
                        <td>O‘zb</td>
                        <th scope="row">{!! $stat->translate('oz')->title ?? '---' !!}</th>
                    </tr>
                    <tr>
                        <td>Ўзб</td>
                        <th scope="row">{!! $stat->translate('uz')->title ?? '---' !!}</th>
                    </tr>
                    <tr>
                        <td>Рус</td>
                        <th scope="row">{!! $stat->translate('ru')->title ?? '---' !!}</th>
                    </tr>
                    <tr>
                        <td>Eng</td>
                        <th scope="row">{!! $stat->translate('en')->title ?? '---' !!}</th>
                    </tr>
                    <tr>
                        <td>{{ tr('Image') }}</td>
                        <th scope="row">
                            <img src="{{ $stat->image ?? '0' }}" width="150px" alt="">
                        </th>
                    </tr>
                    <tr>
                        <td>{{ tr('Year') }}</td>
                        <th scope="row">{{ $stat->year ?? '' }}</th>
                    </tr>
                    <tr>
                        <td>{{ tr('Count') }}</td>
                        <th scope="row">{{ $stat->count ?? '' }}</th>
                    </tr>
                    <tr>
                        <td>{{tr('Created At')}}</td>
                        <th scope="row">
                            {{ $stat->created_at->format('d.m.Y') }} <br />
                            {{ $stat->created_at->format('H:i') }}
                        </th>
                    </tr>
                    <tr>
                        <td>{{tr('Updated At')}}</td>
                        <th scope="row">
                            {{ $stat->updated_at->format('d.m.Y') }}<br />
                            {{ $stat->updated_at->format('H:i') }}
                        </th>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
