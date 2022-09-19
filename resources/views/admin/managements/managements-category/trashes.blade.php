@extends('admin.layouts.app')
@section('title')
@endsection

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ tr('Page Categories') }}</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12 my-2">
                    <a href="{{ route('pages-category.index') }}" class="btn btn-primary">
                        <i class="fas fa-arrow-circle-left"></i>
                        {{ tr('Back') }}
                    </a>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-hover table-wrap">
                    <thead>
                    <tr class="text-primary">
                        <th>{{ tr('Id') }}</th>
                        <th>{{ tr('Main') }}</th>
                        <th>{{ tr('Title') }}</th>
                        <th>{{ tr('Slug') }}</th>
                        <th>{{ tr('Status') }}</th>
                        <th>{{ tr('Creator') }}</th>
                        <th style="width: 100px"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($pages as $param)
                        <tr>
                            <td>{{ $param->id }}</td>
                            <td>
                                @if ($param->parent !== null)
                                    {{ $param->parent->title }}
                                @else
                                    {{ tr('Main Category') }}
                                @endif
                            </td>
                            <td>{{ $param->title ?? '' }}</td>
                            <td>{{ $param->slug }}</td>
                            <td>
                                @if ($param->status == 2)
                                    <span class="badge bg-success">{{ tr('Active') }}</span>
                                @else
                                    <span class="badge bg-danger">{{ tr('Inactive') }}</span>
                                @endif
                            </td>
                            <td>{{ Str::ucfirst($param->user['name']) }}</td>
                            <td class="d-flex">
                                @can("pages-category.restore")
                                    <form method="post" action="{{ route("pages-category.restore", $param->id) }}">
                                        @csrf
                                        <input name="_method" type="hidden">
                                        <button type="submit" class="btn btn-primary restore m-1">
                                            <span class="fas fa-trash-restore-alt"></span></button>
                                    </form>
                                @endcan
                                @can("pages-category.forceDelete")
                                    <form method="post" action="{{ route("pages-category.forceDelete", $param->id) }}">
                                        @csrf
                                        <input name="_method" type="hidden">
                                        <button type="submit" class="btn btn-primary forceDelete m-1">
                                            <span class="fas fa-trash-alt"></span></button>
                                    </form>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <span class="d-flex pt-2 justify-content-end">{{ $pages->links() }}</span>
            </div>
        </div>
    </div>
@endsection
