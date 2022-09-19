@extends('admin.layouts.app')
@section('title')
{{ tr('About Menu Category') }}
@endsection
@section('header')
<x-admin.breadcrumb-show :show="$menusCategory->title ?? '' " :breadcrumb="'menus-category/show'"
    :id="$menusCategory->id" />
@endsection
@section('content')
<div class="p-3 d-flex justify-content-end" style="grid-gap: 2px">
    <button onclick="print()" class="cards btn btn-secondary">
        <i class="fas fa-print"></i>
    </button>
    <a class="cards btn btn-success" href="{{ route('menus-category.create') }}">
        <i class="fa fa-plus"></i>
    </a>
    <a class="cards btn btn-purple" href="{{ route('menus-category.json', $menusCategory->id) }}">
        Json
    </a>
    <a class="cards btn btn-info text-white" href="{{ route('menus-category.index') }}">
        <i class="fa fa-list"></i>
    </a>
    <a class="cards btn btn-primary" href="{{ route('menus-category.edit', $menusCategory->id) }}">
        <i class="fa fa-edit"></i>
    </a>
    <form method="POST" action="{{ route('menus-category.destroy', $menusCategory->id) }}">
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
                                <th scope="row">{{ $menusCategory->id }}</th>
                            </tr>
                            <tr>
                                <td>{{ tr('Title') }}</td>
                                <th scope="row">{{ $menusCategory->translate($lang)->title ?? '' }}</th>
                            </tr>
                            <tr>
                                <td>{{ tr('Status') }}</td>
                                <th scope="row">
                                    @if ($menusCategory->status == 2)
                                    <span class="badge bg-success p-2">{{ tr('Active') }}</span>
                                    @else
                                    <span class="badge bg-danger p-2">{{ tr('Inactive') }}</span>
                                    @endif
                                </th>
                            </tr>
                            <tr>
                                <td>{{ tr('Creator') }}</td>
                                <th scope="row">{{ Str::ucfirst($menusCategory->users->name) }}</th>
                            </tr>
                            <tr>
                                <td>{{ tr('Modifier') }}</td>
                                <th scope="row">
                                    @if ($menusCategory->modifier_id)
                                    {{ Str::ucfirst($menusCategory->modifiers->name) }}
                                    @else
                                    <span class="text-danger">{{ tr('Not set') }}</span>
                                    @endif
                                </th>
                            </tr>
                            <tr>
                                <td>{{ tr('Created At') }}</td>
                                <th scope="row">
                                    {{ $menusCategory->created_at->format('d.m.Y') }} <br />
                                    {{ $menusCategory->created_at->format('H:i') }}
                                </th>
                            </tr>
                            <tr>
                                <td>{{ tr('Updated At') }}</td>
                                <th scope="row">
                                    {{ $menusCategory->updated_at->format('d.m.Y') }} <br />
                                    {{ $menusCategory->updated_at->format('H:i') }}
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
