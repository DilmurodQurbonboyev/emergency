@extends('admin.layouts.app')
@section('title')
    {{ tr('About Photo') }}
@endsection
@section('header')
    <x-admin.breadcrumb-show :show="$photos->title ?? ''" :breadcrumb="'photos/show'" :id="$photos->id" />
@endsection
@section('content')
    <div class="p-3 d-flex justify-content-end" style="grid-gap: 2px">
        <button onclick="print()" class="cards btn btn-secondary">
            <i class="fas fa-print"></i>
        </button>
        <a class="cards btn btn-success" href="{{ route('photos.create') }}">
            <i class="fa fa-plus"></i>
        </a>
        <a class="cards btn btn-info text-white" href="{{ route('photos.index') }}">
            <i class="fa fa-list"></i>
        </a>
        <a class="cards btn btn-primary" href="{{ route('photos.edit', $photos->id) }}">
            <i class="fa fa-edit"></i>
        </a>
        <form method="POST" action="{{ route('photos.destroy', $photos->id) }}">
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
                    <div class="tab-pane fade show" id="{{ $lang }}" role="tabpanel"
                        aria-labelledby="{{ $lang }}">
                        <div class="table-responsive">
                            <table class="table  table-striped table-hover">
                                <tbody>
                                    <tr>
                                        <td>{{ tr('Id') }}</td>
                                        <th scope="row">{{ $photos->id }}</th>
                                    </tr>
                                    <tr>
                                        <td>{{ tr('Category') }}</td>
                                        <th scope="row">
                                            @if ($photos->category != null)
                                                {{ $photos->category->title }}
                                            @else
                                                {{ tr('Main Category') }}
                                            @endif
                                        </th>
                                    </tr>
                                    <tr>
                                        <td>{{ tr('Title') }}</td>
                                        <th scope="row">{{ $photos->translate($lang)->title ?? '' }}</th>
                                    </tr>
                                    <tr>
                                        <td>{{ tr('Anons Image') }}</td>
                                        <th>
                                            @if ($photos->anons_image == null)
                                                <span class="text-danger">{{ tr('No Image') }}</span>
                                            @else
                                                <img width="20%" src="{!! $photos->anons_image !!}" alt="">
                                            @endif
                                        </th>
                                    </tr>
                                    <tr>
                                        <td>{{ tr('Body Image') }}</td>
                                        <th>
                                            <?php
                                            $res = explode(',', $photos->body_image);
                                            ?>
                                            @foreach ($res as $i)
                                                <img width="20%" src="{{ $i }}" alt="">
                                            @endforeach
                                        </th>
                                    </tr>
                                    <tr>
                                        <td>{{ tr('Date') }}</td>
                                        <th>{{ $photos->date }}</th>
                                    </tr>
                                    <tr>
                                        <td>{{ tr('Order') }}</td>
                                        <th>{{ $photos->order }}</th>
                                    </tr>
                                    <tr>
                                        <td>{{ tr('Status') }}</td>
                                        <th scope="row">
                                            @if ($photos->status == 2)
                                                <span class="badge bg-success p-2">{{ tr('Active') }}</span>
                                            @else
                                                <span class="badge bg-danger p-2">{{ tr('Inactive') }}</span>
                                            @endif
                                        </th>
                                    </tr>
                                    <tr>
                                        <td>{{ tr('Creator') }}</td>
                                        <th scope="row">{{ Str::ucfirst($photos->users->name) }}</th>
                                    </tr>
                                    <tr>
                                        <td>{{ tr('Modifier') }}</td>
                                        <th scope="row">
                                            @if ($photos->modifier_id)
                                                {{ Str::ucfirst($photos->modifiers->name) }}
                                            @else
                                                <span class="text-danger">{{ tr('Not Set') }}</span>
                                            @endif
                                        </th>
                                    </tr>
                                    <tr>
                                        <td>{{ tr('Created At') }}</td>
                                        <th scope="row">{{ $photos->created_at->format('d.m.Y') }}</th>
                                    </tr>
                                    <tr>
                                        <td>{{ tr('Updated At') }}</td>
                                        <th scope="row">{{ $photos->updated_at->format('d.m.Y') }}</th>
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
