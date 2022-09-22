@extends('admin.layouts.app')
@section('title')
    {{tr('About Contact')}}
@endsection
@section('header')
    <x-admin.breadcrumb-show :show="$contacts->title ?? '' " :breadcrumb="'contacts/show'" :id="$contacts->id"/>
@endsection
@section('content')
    <div class="p-3 d-flex justify-content-end" style="grid-gap: 2px">
        <button onclick="print()" class="cards btn btn-secondary">
            <i class="fas fa-print"></i>
        </button>
{{--        <a class="btn btn-success cards" href="{{ route('contacts.create') }}">--}}
{{--            <i class="fa fa-plus"></i>--}}
{{--        </a>--}}
        <a class="btn btn-info text-white cards" href="{{ route('contacts.index') }}">
            <i class="fa fa-list"></i>
        </a>
        <a class="btn btn-primary cards" href="{{ route('contacts.edit', $contacts->id) }}">
            <i class="fa fa-edit"></i>
        </a>
{{--        <form method="POST" action="{{ route('contacts.destroy', $contacts->id) }}">--}}
{{--            @csrf--}}
{{--            <input name="_method" type="hidden" value="DELETE">--}}
{{--            <button type="submit" class="cards btn btn-danger deleteBtn">--}}
{{--                <span class="fas fa-eraser"></span></button>--}}
{{--        </form>--}}
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
                                    <td>{{ tr('Id') }}</td>
                                    <th scope="row">{{ $contacts->id }}</th>
                                </tr>
                                <tr>
                                    <td>{{ tr('Phone') }}</td>
                                    <th scope="row">{{ $contacts->phone ?? '' }}</th>
                                </tr>
                                <tr>
                                    <td>{{ tr('Address') }}</td>
                                    <th scope="row">
                                        {{ $contacts->translate($lang)->address ?? '' }}
                                    </th>
                                </tr>
                                <tr>
                                    <td>{{ tr('Reception') }}</td>
                                    <th scope="row">
                                        {{ $contacts->translate($lang)->reception ?? '' }}
                                    </th>
                                </tr>
                                <tr>
                                    <td>{{ tr('Email') }}</td>
                                    <th scope="row">{{ $contacts->email ?? '' }}</th>
                                </tr>
                                <tr>
                                    <td>{{ tr('Latitude') }}</td>
                                    <th scope="row">{{ $contacts->latitude ?? '' }}</th>
                                </tr>
                                <tr>
                                    <td>{{ tr('Longitude') }}</td>
                                    <th scope="row">{{ $contacts->longitude ?? '' }}</th>
                                </tr>
                                <tr>
                                    <td>{{ tr('Working Time') }}</td>
                                    <th scope="row">
                                        {{ $contacts->translate($lang)->working_time ?? '' }}
                                    </th>
                                </tr>
                                <tr>
                                    <td>{{tr('Created At')}}</td>
                                    <th scope="row">
                                        {{ $contacts->created_at->format('d.m.Y') }} <br/>
                                        {{ $contacts->created_at->format('H:i') }}
                                    </th>
                                </tr>
                                <tr>
                                    <td>{{tr('Updated At')}}</td>
                                    <th scope="row">
                                        {{ $contacts->updated_at->format('d.m.Y') }}<br/>
                                        {{ $contacts->updated_at->format('H:i') }}
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
