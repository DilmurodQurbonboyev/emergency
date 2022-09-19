@extends('admin.layouts.app')
@section('title')
{{ tr('About Useful') }}
@endsection
@section('header')
<x-admin.breadcrumb-show :show="$usefuls->title ?? '' " :breadcrumb="'useful/show'" :id="$usefuls->id" />
@endsection
@section('content')
<div class="p-3 d-flex justify-content-end" style="grid-gap: 2px">
    <button onclick="print()" class="cards btn btn-secondary">
        <i class="fas fa-print"></i>
    </button>
    <a class="cards btn btn-success" href="{{ route('useful.create') }}">
        <i class="fa fa-plus"></i>
    </a>
    <a class="cards btn btn-info text-white" href="{{ route('useful.index') }}">
        <i class="fa fa-list"></i>
    </a>
    <a class="cards btn btn-primary" href="{{ route('useful.edit', $usefuls->id) }}">
        <i class="fa fa-edit"></i>
    </a>
    <form method="POST" action="{{ route('useful.destroy', $usefuls->id) }}">
        @csrf
        <input name="_method" type="hidden" value="DELETE">
        <button type="submit" class="cards btn btn-danger deleteBtn">
            <span class="fas fa-eraser"></span>
        </button>
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
                    <table class="table  table-striped table-hover">
                        <tbody>
                            <tr>
                                <td>{{ tr('Id') }}</td>
                                <th scope="row">{{ $usefuls->id }}</th>
                            </tr>
                            <tr>
                                <td>{{ tr('Category') }}</td>
                                <th scope="row">
                                    @if ($usefuls->category != null)
                                    {{ $usefuls->category->title }}
                                    @else
                                    {{ tr('Main Category') }}
                                    @endif
                                </th>
                            </tr>
                            <tr>
                                <td>{{ tr('Title') }}</td>
                                <th scope="row">{{ $usefuls->translate($lang)->title ?? '' }}</th>
                            </tr>
                            <tr>
                                <td>{{ tr('Description') }}</td>
                                <th scope="row">{!! $usefuls->translate($lang)->description ?? '' !!}</th>
                            </tr>
                            <tr>
                                <td>{{ tr('Link') }}</td>
                                <th>{{ $usefuls->link }}</th>
                            </tr>
                            <tr>
                                <td>{{ tr('Date') }}</td>
                                <th>{{ $usefuls->date }}</th>
                            </tr>
                            <tr>
                                <td>{{ tr('Order') }}</td>
                                <th>{{ $usefuls->order }}</th>
                            </tr>
                            <tr>
                                <td>{{ tr('Status') }}</td>
                                <th scope="row">
                                    @if ($usefuls->status == 2)
                                    <span class="badge bg-success p-2">{{ tr('Active') }}</span>
                                    @else
                                    <span class="badge bg-danger p-2">{{ tr('Inactive') }}</span>
                                    @endif
                                </th>
                            </tr>
                            <tr>
                                <td>{{ tr('Creator') }}</td>
                                <th scope="row">{{ Str::ucfirst($usefuls->users->name) }}</th>
                            </tr>
                            <tr>
                                <td>{{ tr('Modifier') }}</td>
                                <th scope="row">
                                    @if ($usefuls->modifier_id)
                                    {{ Str::ucfirst($usefuls->modifiers->name) }}
                                    @else
                                    <span class="text-danger">{{ tr('Not set') }}</span>
                                    @endif
                                </th>
                            </tr>
                            <tr>
                                <td>{{ tr('Created At') }}</td>
                                <th scope="row">
                                    {{ $usefuls->created_at->format('d.m.Y') }} <br />
                                    {{ $usefuls->created_at->format('H:i') }}
                                </th>
                            </tr>
                            <tr>
                                <td>{{ tr('Updated At') }}</td>
                                <th scope="row">
                                    {{ $usefuls->updated_at->format('d.m.Y') }} <br />
                                    {{ $usefuls->updated_at->format('H:i') }}
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
