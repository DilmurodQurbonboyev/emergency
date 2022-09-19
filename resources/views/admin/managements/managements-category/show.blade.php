@extends('admin.layouts.app')
@section('title')
    {{ tr('About News Category') }}
@endsection
@section('header')
    <x-admin.breadcrumb-show :show="$managementCategory->title ?? '' " :breadcrumb="'managements-category/show'"
                             :id="$managementCategory->id"/>
@endsection
@section('content')
    <div class="p-3 d-flex justify-content-end" style="grid-gap: 2px">
        <button onclick="print()" class="btn btn-secondary">
            <i class="fas fa-print"></i>
        </button>
        <a class="btn btn-success" href="{{ route('managements-category.create') }}">
            <i class="fa fa-plus"></i>
        </a>
        <a class="btn btn-info text-white" href="{{ route('managements-category.index') }}">
            <i class="fa fa-list"></i>
        </a>
        <a class="btn btn-primary"
           href="{{ route('managements-category.edit', $managementCategory->id) }}">
            <i class="fa fa-edit"></i>
        </a>
        <form method="POST" action="{{ route('managements-category.destroy', $managementCategory->id) }}">
            @csrf
            <input name="_method" type="hidden" value="DELETE">
            <button type="submit" class="btn btn-danger deleteBtn">
                <span class="fas fa-eraser"></span></button>
        </form>
    </div>
    <div class="card card-primary card-outline card-tabs">
        <div class="card-header p-0 pt-1 border-bottom-0">
            <x-admin.language-tab/>
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
                                    <th scope="row">{{ $managementCategory->id }}</th>
                                </tr>
                                <tr>
                                    <td>{{ tr('Main') }}</td>
                                    <th scope="row">
                                        @if ($managementCategory->parent_id == 0)
                                            {{ tr('Main Category') }}
                                        @else
                                            {{ $managementCategory->parent->title ?? '' }}
                                        @endif
                                    </th>
                                </tr>
                                <tr>
                                    <td>{{ tr('Title') }}</td>
                                    <th scope="row">{{ $managementCategory->translate($lang)->title ?? '' }}</th>
                                </tr>
                                <tr>
                                    <td>{{ tr('Status') }}</td>
                                    <th scope="row">
                                        @if ($managementCategory->status == 2)
                                            <span class="badge bg-success p-2">{{ tr('Active') }}</span>
                                        @else
                                            <span class="badge bg-danger p-2">{{ tr('Inactive') }}</span>
                                        @endif
                                    </th>
                                </tr>
                                <tr>
                                    <td>{{ tr('Creator') }}</td>
                                    <th scope="row">{{ Str::ucfirst($managementCategory->users->name) }}</th>
                                </tr>
                                <tr>
                                    <td>{{ tr('Modifier') }}</td>
                                    <th scope="row">
                                        @if ($managementCategory->modifier_id)
                                            {{ Str::ucfirst($managementCategory->modifiers->name) }}
                                        @else
                                            <span class="text-danger">{{ tr('Not set') }}</span>
                                        @endif
                                    </th>
                                </tr>
                                <tr>
                                    <td>{{ tr('Created At') }}</td>
                                    <th scope="row">
                                        {{ $managementCategory->created_at->format('d.m.Y') }}<br/>
                                        {{ $managementCategory->created_at->format('H:i') }}
                                    </th>
                                </tr>
                                <tr>
                                    <td>{{ tr('Updated At') }}</td>
                                    <th scope="row">
                                        {{ $managementCategory->updated_at->format('d.m.Y') }} <br/>
                                        {{ $managementCategory->updated_at->format('H:i') }}
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
