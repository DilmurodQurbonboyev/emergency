@extends('admin.layouts.app')
@section('title')
    {{ tr('Feedbacks') }}
@endsection
@section('header')
    <div class="col-sm-6">
        <h1>{{ tr('Feedbacks') }}</h1>
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
            <h3 class="card-title">{{ tr('Feedbacks') }}</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-wrap">
                    <thead>
                        <tr class="text-primary">
                            <th>{{ tr('Id') }}</th>
                            <th>{{ tr('FullName') }}</th>
                            <th>{{ tr('Date of birth') }}</th>
                            <th>{{ tr('Text of the question') }}</th>
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
                        @foreach ($feedbacks as $feedback)
                            <tr>
                                <td>{{ $feedback->id }}</td>
                                <td>{{ $feedback->fullname ?? '' }}</td>
                                <td>{{ $feedback->birth_date ?? '' }}</td>
                                <td>{{ $feedback->message ?? '' }}</td>
                                <td class="d-flex">
                                    <a class="btn btn-primary m-1" href="{{ route('feedbacks.show', $feedback->id) }}"
                                        title="View" aria-label="View"><span class="fas fa-eye"></span>
                                    </a>
                                    <a class="btn btn-primary m-1" href="{{ route('feedbacks.edit', $feedback->id) }}"
                                        title="Янгилаш" aria-label="Янгилаш"><span class="fas fa-pencil-alt"></span>
                                    </a>
                                    <form method="POST" action="{{ route('feedbacks.destroy', $feedback->id) }}">
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
                <span class="d-flex pt-2 justify-content-end"> {{ $feedbacks->links() }}</span>
            </div>
        </div>
    </div>
@endsection
