@extends('admin.layouts.app')
@section('title')
    {{ MessageService::tr('About Log') }}
@endsection

@section('header')
    <x-admin.breadcrumb-show :show="$log->title ?? ''" :breadcrumb="'logs/show'" :id="$log->id"/>
@endsection

@section('content')
    <div class="p-3 d-flex justify-content-end" style="grid-gap: 2px">
        @can('logs.index')
            <a class="btn btn-info text-white" href="{{ route('logs.index') }}">
                <i class="fa fa-list"></i>
            </a>
        @endcan
    </div>
    <div class="card card-primary card-outline card-outline-tabs">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <tbody>
                    <tr>
                        <td>{{ MessageService::tr('Id') }}</td>
                        <th scope="row">{{ $log->id }}</th>
                    </tr>
                    <tr>
                        <td>{{ MessageService::tr('Model') }}</td>
                        <th scope="row">{{ $log->model }}</th>
                    </tr>
                    <tr>
                        <td>{{ MessageService::tr('User') }}</td>
                        <th scope="row">{{ Str::ucfirst($log->users->name) }}</th>
                    </tr>
                    <tr>
                        <td>{{ MessageService::tr('Ip') }}</td>
                        <th scope="row">{{ $log->user_ip }}</th>
                    </tr>
                    <tr>
                        <td>{{ MessageService::tr('Url') }}</td>
                        <th scope="row">{{ $log->url }}</th>
                    </tr>
                    <tr>
                        <td>{{ MessageService::tr('Action') }}</td>
                        <th scope="row">{{ $log->action }}</th>
                    </tr>
                    <tr>
                        <td>{{ MessageService::tr('Created At') }}</td>
                        <th scope="row">{{ $log->created_at->format('d.m.Y') }}</th>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="card card-primary card-outline card-outline-tabs">
        <div class="card-body">
            <table class="table table-striped table-hover">
                <tbody>
                <tr>
                    <td>{{ MessageService::tr('Country name') }}</td>
                    <th>{{  $position->countryName ?? '' }}</th>
                </tr>
                <tr>
                    <td>{{ MessageService::tr('Country code') }}</td>
                    <th>{{ $position->countryCode ?? '' }}</th>
                </tr>
                <tr>
                    <td>{{ MessageService::tr('City name') }}</td>
                    <th>{{ $position->cityName ?? '' }}</th>
                </tr>
                <tr>
                    <td>{{ MessageService::tr('Latitude') }}</td>
                    <th>{{ $position->latitude ?? '' }}</th>
                </tr>
                <tr>
                    <td>{{ MessageService::tr('Longitude') }}</td>
                    <th>{{ $position->longitude ?? '' }}</th>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
