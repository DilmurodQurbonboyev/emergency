@extends('admin.layouts.app')
@section('title')
    {{ tr('About Management') }}
@endsection
@section('header')
    <x-admin.breadcrumb-show :show="$management->title ?? '' " :breadcrumb="'managements/show'"
                             :id="$management->id"/>
@endsection
@section('content')
    <div class="p-3 d-flex justify-content-end" style="grid-gap: 2px">
        <button onclick="print()" class="btn btn-secondary">
            <i class="fas fa-print"></i>
        </button>
        <a class="btn btn-success" href="{{ route('managements.create') }}">
            <i class="fa fa-plus"></i>
        </a>
        <a class="btn btn-info text-white" href="{{ route('managements.index') }}">
            <i class="fa fa-list"></i>
        </a>
        <a class="btn btn-primary" href="{{ route('managements.edit', $management->id) }}">
            <i class="fa fa-edit"></i>
        </a>
        <form method="POST" action="{{ route('managements.destroy', $management->id) }}">
            @csrf
            <input name="_method" type="hidden" value="DELETE">
            <button type="submit" class="btn btn-danger deleteBtn">
                <span class="fas fa-eraser"></span>
            </button>
        </form>
    </div>
    <div class="card card-primary card-outline card-outline-tabs">
        <div class="card-header p-0 border-bottom-0">
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
                                    <th scope="row">{{ $management->id }}</th>
                                </tr>
                                <tr>
                                    <td>{{ tr('Category') }}</td>
                                    <th scope="row">
                                        @if ($management->category != null)
                                            {{ $management->category->title }}
                                        @else
                                            {{ tr('Main Category') }}
                                        @endif
                                    </th>
                                </tr>
                                <tr>
                                    <td>{{ tr('Title') }}</td>
                                    <th scope="row">{{ $management->translate($lang)->title ?? '' }}</th>
                                </tr>
                                <tr>
                                    <td>{{ tr('Description') }}</td>
                                    <th scope="row">{!! $management->translate($lang)->description ?? '' !!}</th>
                                </tr>
                                <tr>
                                    <td>{{ tr('Contet') }}</td>
                                    <th scope="row">{!! $management->translate($lang)->content ?? '' !!}</th>
                                </tr>
                                <tr>
                                    <td>{{ tr('Anons Image') }}</td>
                                    <th>
                                        @if ($management->anons_image == null)
                                            <span class="text-danger">{{ tr('No Image') }}</span>
                                        @else
                                            <img width="20%" src="{!! $management->anons_image !!}" alt="">
                                        @endif
                                    </th>
                                </tr>
                                <tr>
                                    <td>{{ tr('Pdf Title') }}</td>
                                    <th>{{ $management->translate($lang)->pdf_title ?? '' }}</th>
                                </tr>
                                <tr>
                                    <td>{{ tr('Pdf') }}</td>
                                    <th scope="row">
                                        @if($management->pdf)
                                            <i class="far fa-file-pdf"></i>
                                            <a href="{{ $management->pdf }}" target="__blank" style="color: #000;">{{
                                        $management->translate($lang)->pdf ?? '' }}</a>
                                        @endif
                                    </th>
                                </tr>
                                <tr>
                                    <td>{{ tr('Date') }}</td>
                                    <th>{{ $management->date }}</th>
                                </tr>
                                <tr>
                                    <td>{{ tr('Order') }}</td>
                                    <th>{{ $management->order }}</th>
                                </tr>
                                <tr>
                                    <td>{{ tr('Status') }}</td>
                                    <th scope="row">
                                        @if ($management->status == 2)
                                            <span class="badge bg-success p-2">{{ tr('Active') }}</span>
                                        @else
                                            <span class="badge bg-danger p-2">{{ tr('Inactive') }}</span>
                                        @endif
                                    </th>
                                </tr>
                                <tr>
                                    <td>{{ tr('Creator') }}</td>
                                    <th scope="row">{{ Str::ucfirst($management->users->name) }}</th>
                                </tr>
                                <tr>
                                    <td>{{ tr('Modifier') }}</td>
                                    <th scope="row">
                                        @if ($management->modifier_id)
                                            {{ Str::ucfirst($management->modifiers->name) }}
                                        @else
                                            <span class="text-danger">{{ tr('Not Set') }}</span>
                                        @endif
                                    </th>
                                </tr>
                                <tr>
                                    <td>{{ tr('Created At') }}</td>
                                    <th scope="row">
                                        {{ $management->created_at->format('d.m.Y') }} <br/>
                                        {{ $management->created_at->format('H:i') }}
                                    </th>
                                </tr>
                                <tr>
                                    <td>{{ tr('Updated At') }}</td>
                                    <th scope="row">
                                        {{ $management->updated_at->format('d.m.Y') }} <br/>
                                        {{ $management->updated_at->format('H:i') }}
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
