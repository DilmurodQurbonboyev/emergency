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
                        <th>{{ MessageService::tr('Model') }}</th>
                        <th>{{ MessageService::tr('Row Id') }}</th>
                        <th>{{ MessageService::tr('Username') }}</th>
                        <th>{{ MessageService::tr('Ip') }}</th>
                        <th>{{ MessageService::tr('Url') }}</th>
                        <th>{{ MessageService::tr('Action') }}</th>
                        <th>{{ MessageService::tr('Created At') }}</th>
                        <th style="width: 100px"></th>
                    </tr>
                    <tr>
                        <th>
                            <input class="form-control" type="text" wire:model.debounce.300ms="filter_id">
                        </th>
                        <th>
                            <input class="form-control" type="text" wire:model.debounce.300ms="filter_modal">
                        </th>
                        <th>
                            <input class="form-control" type="text" wire:model.debounce.300ms="filter_row">
                        </th>
                        <th>
                            <select class="custom-select rounded-0 select2bs4" wire:model.debounce.300ms="filter_user">
                                <option value="0"></option>
                                @foreach ($users as $u)
                                    <option value="{{ $u->id }}">{{ $u->name }}</option>
                                @endforeach
                            </select>
                        </th>
                        <th>
                            <input class="form-control" type="text" wire:model.debounce.300ms="filter_ip">
                        </th>
                        <th>
                            <input class="form-control" type="text" wire:model.debounce.300ms="filter_url">
                        </th>
                        <th>
                            <select wire:model.debounce.300ms="filter_action" class="form-control">
                                <option value=""></option>
                                <option value="created">{{ MessageService::tr('created') }}</option>
                                <option value="updated">{{ MessageService::tr('updated') }}</option>
                                <option value="deleted">{{ MessageService::tr('deleted') }}</option>
                                <option value="restored">{{ MessageService::tr('restored') }}</option>
                            </select>
                        </th>
                        <th>
                            <input class="form-control" type="text" wire:model.debounce.300ms="filter_created_at">
                        </th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($logs as $log)
                        <tr>
                            <td>{{ $log->id }}</td>
                            <td>{{ $log->model }}</td>
                            <td>{{ $log->row_id }}</td>
                            <td>{{ $log->users->name }}</td>
                            <td>{{ $log->user_ip }}</td>
                            <td>{{ $log->url }}</td>
                            <td>{{ $log->action }}</td>
                            <td>{{ $log->created_at }}</td>
                            <td>
                                <a class="btn btn-primary" href="{{ route('logs.show', $log->id) }}" title="View"
                                   aria-label="View"><span class="fas fa-eye"></span></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <span class="d-flex pt-2 justify-content-end"> {{ $logs->links() }}</span>
            </div>
        </div>
    </div>
@endsection
