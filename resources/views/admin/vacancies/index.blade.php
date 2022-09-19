@extends('admin.layouts.app')
@section('title')
    {{ tr('Vacancies') }}
@endsection
@section('header')
    <div class="col-sm-6">
        <h1>{{ tr('Vacancies') }}</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            {{-- {{ Breadcrumbs::render('messages') }} --}}
        </ol>
    </div>
@endsection
@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ tr('Vacancies') }}</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-wrap">
                    <thead>
                        <tr class="text-primary">
                            <th>{{ tr('Id') }}</th>
                            <th>{{ tr('FullName') }}</th>
                            <th>{{ tr('Email') }}</th>
                            <th>{{ tr('Phone') }}</th>
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
                        @foreach ($vacancies as $vacancy)
                            <tr>
                                <td>{{ $vacancy->id }}</td>
                                <td>{{ $vacancy->fullname ?? '' }}</td>
                                <td>{{ $vacancy->email ?? '' }}</td>
                                <td>{{ $vacancy->phone ?? '' }}</td>
                                <td class="d-flex">
                                    <a class="btn btn-primary m-1" href="{{ route('vacancies.show', $vacancy->id) }}"
                                        title="View" aria-label="View"><span class="fas fa-eye"></span>
                                    </a>
                                    <a class="btn btn-primary m-1" href="{{ route('vacancies.edit', $vacancy->id) }}"
                                        title="Янгилаш" aria-label="Янгилаш"><span class="fas fa-pencil-alt"></span>
                                    </a>
                                    <form method="POST" action="{{ route('vacancies.destroy', $vacancy->id) }}">
                                        @csrf
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button type="submit" class="btn btn-primary deleteBtn m-1">
                                            <span class="fas fa-eraser"></span></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <span class="d-flex pt-2 justify-content-end"> {{ $vacancies->links() }}</span>
            </div>
        </div>
    </div>
@endsection
