@extends('admin.layouts.app')
@section('title')
    {{ MessageService::tr('Logs') }}
@endsection
@section('header')
    <x-admin.breadcrumb :title="'Logs'" :breadcrumb="'logs'" />
@endsection
@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ MessageService::tr('Logs') }}</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-wrap">
                    <thead>
                        <tr class="text-primary">
                            <th>{{ MessageService::tr('Id') }}</th>
                            <th>{{ MessageService::tr('FullName') }}</th>
                            <th>{{ MessageService::tr('Authority') }}</th>
                            <th>{{ MessageService::tr('Created At') }}</th>
                            <th style="width: 100px"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($logs as $log)
                            <tr>
                                <td style="width: 100px">{{ $log->id }}</td>
                                <td>{{ $log->users->userData->full_name ?? '' }}</td>
                                <td>{{ $log->authorities->title ?? '' }}</td>
                                <td>{{ displayDateTime($log->created_at) }}</td>
                                {{-- <td>
                                    <a class="btn btn-primary" href="{{ route('logs.show', $log->id) }}"><span
                                            class="fas fa-eye"></span></a>
                                </td> --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <span class="d-flex pt-2 justify-content-end"> {{ $logs->links() }}</span>
            </div>
        </div>
    </div>
@endsection
