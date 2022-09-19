@extends('admin.layouts.app')
@section('title')
    {{ MessageService::tr('About Log') }}
@endsection

@section('header')
    <x-admin.breadcrumb-show :show="$logs->title ?? ''" :breadcrumb="'logs/show'" :id="$logs->id" />
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
                <table class="table table-striped  table-hover">
                    <tbody>
                        <tr>
                            <td>{{ MessageService::tr('Id') }}</td>
                            <th scope="row">{{ $logs->id }}</th>
                        </tr>
                        <tr>
                            <td>{{ MessageService::tr('Model') }}</td>
                            <th scope="row">{{ $logs->auditable_type }}</th>
                        </tr>
                        <tr>
                            <td>{{ MessageService::tr('Users') }}</td>
                            <th scope="row">{{ Str::ucfirst($logs->user['name']) }}</th>
                        </tr>
                        <tr>
                            <td>{{ MessageService::tr('Ip') }}</td>
                            <th scope="row">{{ $logs->ip_address }}</th>
                        </tr>
                        <tr>
                            <td>{{ MessageService::tr('Url') }}</td>
                            <th scope="row">{{ $logs->url }}</th>
                        </tr>
                        <tr>
                            <td>{{ MessageService::tr('Action') }}</td>
                            <th scope="row">{{ $logs->event }}</th>
                        </tr>
                        <tr>
                            <td>{{ MessageService::tr('Created At') }}</td>
                            <th scope="row">{{ $logs->created_at->format('d.m.Y') }}</th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
