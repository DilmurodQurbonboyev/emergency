@extends('admin.layouts.app')
@section('title')
{{tr('About Vacancy')}}
@endsection
@section('header')
@endsection
@section('content')
    <div class="p-3 d-flex justify-content-end" style="grid-gap: 2px">
        <a class="btn btn-info text-white cards" href="{{ route('vacancies.index') }}">
            <i class="fa fa-list"></i>
        </a>
        <a class="btn btn-primary cards" href="{{ route('vacancies.edit', $vacancy->id) }}">
            <i class="fa fa-edit"></i>
        </a>
    </div>
    <div class="card card-primary card-outline card-tabs">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover styled-detail-view table-bordered mt-3">
                    <tbody>
                    <tr>
                        <th>{{ tr('Id') }}</th>
                        <td>{{ $vacancy->id }}</td>
                    </tr>
                    <tr>
                        <th>{{ tr('FullName') }}</th>
                        <td>{{ $vacancy->fullname ?? '' }}</td>
                    </tr>
                    <tr>
                        <th>{{ tr('Email') }}</th>
                        <td>{{ $vacancy->email ?? '' }}</td>
                    </tr>
                    <tr>
                        <th>{{ tr('Phone') }}</th>
                        <td>{{ $vacancy->phone ?? '' }}</td>
                    </tr>
                    <tr>
                        <th>{{ tr('Message') }}</th>
                        <td>{{ $vacancy->message ?? '' }}</td>
                    </tr>
                    <tr>
                        <th>{{ tr('Status') }}</th>
                        <td>
                            @if ($vacancy->status == 1)
                                <span class="badge bg-success p-2">{{ tr('Active') }}</span>
                            @elseif($vacancy->status == 2)
                                <span class="badge bg-danger p-2">{{ tr('Inactive') }}</span>
                            @else
                                <span class="badge bg-secondary p-2">{{ tr('Not checked yet') }}</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>{{ tr('User Ip') }}</th>
                        <td>{{ $vacancy->user_ip ?? '' }}</td>
                    </tr>
                    <tr>
                        <th>{{ tr('Created At') }}</th>
                        <td>
                            {{ $vacancy->created_at->format('d.m.Y') }} <br/>
                            {{ $vacancy->created_at->format('H:i') }}
                        </td>
                    </tr>
                    <tr>
                        <th>{{ tr('Updated At') }}</th>
                        <td>
                            {{ $vacancy->updated_at->format('d.m.Y') }} <br/>
                            {{ $vacancy->updated_at->format('H:i') }}
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
