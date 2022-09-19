@extends('admin.layouts.app')
@section('title')
{{ MessageService::tr('About Authority') }}
@endsection
@section('header')
<x-admin.breadcrumb-show :show="$authority->title ?? '' " :breadcrumb="'authorities/show'" :id="$authority->id" />
@endsection
@section('content')
<div class="p-3 d-flex justify-content-end" style="grid-gap: 2px">
    <button onclick="print()" class="cards btn btn-secondary">
        <i class="fas fa-print"></i>
    </button>
    <a class="cards btn btn-success" href="{{ route('authorities.create') }}">
        <i class="fa fa-plus"></i>
    </a>
    <a class="cards btn btn-info text-white" href="{{ route('authorities.index') }}">
        <i class="fa fa-list"></i>
    </a>
    <a class="cards btn btn-primary" href="{{ route('authorities.edit', $authority->id) }}">
        <i class="fa fa-edit"></i>
    </a>
    <form method="POST" action="{{ route('authorities.destroy', $authority->id) }}">
        @csrf
        <input name="_method" type="hidden" value="DELETE">
        <button type="submit" class="cards btn btn-danger deleteBtn">
            <span class="fas fa-eraser"></span></button>
    </form>
</div>
<div class="card card-primary card-outline card-tabs">
    <div class="card-header p-0 pt-1 border-bottom-0">
        <x-admin.language-tab />
    </div>
    <div class="card-body">
        <div class="tab-content">
            @foreach (Config::get('translatable.locales') as $lang)
            <div class="tab-pane fade show" id="{{ $lang }}" role="tabpanel" aria-labelledby="{{ $lang }}">
                <div class="table-responsive">
                    <table class="table table-striped  table-hover">
                        <tbody>
                            <tr>
                                <td>{{ MessageService::tr('Id') }}</td>
                                <th scope="row">{{ $authority->id }}</th>
                            </tr>
                            <tr>
                                <td>{{ MessageService::tr('Title') }}</td>
                                <th scope="row">{{ $authority->translate($lang)->title ?? '' }}</th>
                            </tr>
                            <tr>
                                <td>{{ MessageService::tr('Status') }}</td>
                                <th scope="row">
                                    @if ($authority->status == 2)
                                    <span class="badge bg-success p-2">{{ MessageService::tr('Active') }}</span>
                                    @else
                                    <span class="badge bg-danger p-2">{{ MessageService::tr('Inactive') }}</span>
                                    @endif
                                </th>
                            </tr>
                            <tr>
                                <td>{{ MessageService::tr('Creator') }}</td>
                                <th scope="row">{{ Str::ucfirst($authority->users->name) }}</th>
                            </tr>
                            <tr>
                                <td>{{ MessageService::tr('Modifier') }}</td>
                                <th scope="row">
                                    @if ($authority->modifier_id)
                                    {{ Str::ucfirst($authority->modifiers->name) }}
                                    @else
                                    <span class="text-danger">{{ MessageService::tr('Not set') }}</span>
                                    @endif
                                </th>
                            </tr>
                            <tr>
                                <td>{{ MessageService::tr('Created At') }}</td>
                                <th scope="row">
                                    {{ $authority->created_at->format('d.m.Y') }} <br />
                                    {{ $authority->created_at->format('H:i') }}
                                </th>
                            </tr>
                            <tr>
                                <td>{{ MessageService::tr('Updated At') }}</td>
                                <th scope="row">
                                    {{ $authority->updated_at->format('d.m.Y') }} <br />
                                    {{ $authority->updated_at->format('H:i') }}
                                </th>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
