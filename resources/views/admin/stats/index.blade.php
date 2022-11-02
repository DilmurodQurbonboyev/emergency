@extends('admin.layouts.app')
@section('title')
    {{ tr('Statistics') }}
@endsection
@section('header')
    <div class="col-sm-6">
        <h1>{{ tr('Statistics') }}</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            {{ Breadcrumbs::render('stats') }}
        </ol>
    </div>
@endsection
@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ tr('Statistics') }}</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12 my-2">
                    <a class="btn btn-primary create-btn" href="{{ route('stats.create') }}">
                        <i class="fas fa-plus-circle"></i>
                        {{ tr('Create Statistic') }}
                    </a>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-hover table-wrap">
                    <thead>
                    <tr class="text-primary">
                        <th>{{ tr('Id') }}</th>
                        <th>{{ tr('Image') }}</th>
                        <th>{{ tr('Title') }}</th>
                        <th>{{ tr('Count') }}</th>
                        <th>{{ tr('Year') }}</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($stats as $stat)
                        <tr>
                            <td>{{ $stat->id }}</td>
                            <td>
                                <img src="{{ $stat->image ?? '' }}" alt="">
                            </td>
                            <td>{{ $stat->title ?? '' }}</td>
                            <td>{{ $stat->count ?? '' }}</td>
                            <td>{{ $stat->year ?? '' }}</td>
                            <td class="d-flex">
                                <a class="btn btn-primary m-1" href="{{ route('stats.show', $stat->id) }}"
                                   title="View" aria-label="View"><span class="fas fa-eye"></span>
                                </a>
                                <a class="btn btn-primary m-1" href="{{ route('stats.edit', $stat->id) }}"
                                   title="Янгилаш" aria-label="Янгилаш"><span class="fas fa-pencil-alt"></span>
                                </a>
                                <form method="POST" action="{{ route('stats.destroy', $stat->id) }}">
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
            </div>
        </div>
    </div>
@endsection
