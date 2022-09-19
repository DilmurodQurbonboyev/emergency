@extends('admin.layouts.app')
@section('title')
    {{ tr('Applications') }}
@endsection
@section('header')
    <div class="col-sm-6">
        <h1>{{ tr('Applications') }}</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
             {{ Breadcrumbs::render('applications') }}
        </ol>
    </div>
@endsection
@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ tr('Applications') }}</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-wrap">
                    <thead>
                        <tr class="text-primary">
                            <th>{{ tr('Id') }}</th>
                            <th>{{ tr('FullName') }}</th>
                            <th>{{ tr('Date of birth') }}</th>
                            <th>{{ tr('Email') }}</th>
                            <th></th>
                        </tr>
                        <tr>
                            <th>
                                <input class="form-control" type="text" wire:model.debounce.300ms="filter_id">
                            </th>
                            <th>
                                <input class="form-control" type="text" wire:model.debounce.300ms="filter_title">
                            </th>
                            <th>
                                <input class="form-control" type="text" wire:model.debounce.300ms="filter_title">
                            </th>
                            <th>
                                <input class="form-control" type="text" wire:model.debounce.300ms="filter_title">
                            </th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($applications as $application)
                            <tr>
                                <td>{{ $application->id }}</td>
                                <td>{{ $application->fullname ?? '' }}</td>
                                <td>{{ $application->birth_date ?? '' }}</td>
                                <td>{{ $application->email ?? '' }}</td>
                                <td class="d-flex">
                                    <a class="btn btn-primary m-1" href="{{ route('applications.show', $application->id) }}"
                                        title="View" aria-label="View"><span class="fas fa-eye"></span>
                                    </a>
                                    <a class="btn btn-primary m-1" href="{{ route('applications.edit', $application->id) }}"
                                        title="Янгилаш" aria-label="Янгилаш"><span class="fas fa-pencil-alt"></span>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <span class="d-flex pt-2 justify-content-end"> {{ $applications->links() }}</span>
            </div>
        </div>
    </div>
@endsection
