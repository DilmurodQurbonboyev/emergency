@extends('admin.layouts.app')
@section('title')
    {{tr('About Application')}}
@endsection
@section('header')
    <x-admin.breadcrumb-show :show="$application->id ?? '' " :breadcrumb="'applications/show'" :id="$application->id"/>
@endsection
@section('content')
    <div class="p-3 d-flex justify-content-end" style="grid-gap: 2px">
        <a class="btn btn-info text-white cards" href="{{ route('applications.index') }}">
            <i class="fa fa-list"></i>
        </a>
        <a class="btn btn-primary cards" href="{{ route('applications.edit', $application->id) }}">
            <i class="fa fa-edit"></i>
        </a>
    </div>
    <div class="card card-primary card-outline card-tabs">
        <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered styled-detail-view mt-3">
                        <tbody>
                        <tr>
                            <th>{{ tr('Id') }}</th>
                            <td>{{ $application->id }}</td>
                        </tr>
                        <tr>
                            <th>{{ tr('FullName') }}</th>
                            <td>{{ $application->fullname ?? '' }}</td>
                        </tr>
                        <tr>
                            <th>{{ tr('Organization') }}</th>
                            <td>{{ $application->organization ?? '' }}</td>
                        </tr>
                        <tr>
                            <th>{{ tr('Phone') }}</th>
                            <td>{{ $application->phone ?? '' }}</td>
                        </tr>
                        <tr>
                            <th>{{ tr('Email') }}</th>
                            <td>{{ $application->email ?? '' }}</td>
                        </tr>
                        <tr>
                            <th>{{ tr('Applicant') }}</th>
                            <td>
                                @if($application->appeal_type == 1)
                                    {{ tr('Question') }}
                                @elseif($application->appeal_type == 2)
                                    {{ tr('Objection') }}
                                @elseif($application->appeal_type == 3)
                                    {{tr('Question about licensing')}}
                                @elseif($application->appeal_type == 4)
                                    {{tr('Appeal to the management of the inspectorate')}}
                                @elseif($application->appeal_type == 5)
                                    {{tr('Selection application')}}
                                @else
                                    {{tr('Job application')}}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>{{ tr('Address') }}</th>
                            <td>{{ $application->address ?? '' }}</td>
                        </tr>
                        <tr>
                            <th>{{ tr('Region Id') }}</th>
                            <td>{{ $application->region_id ?? '' }}</td>
                        </tr>
                        <tr>
                            <th>{{ tr('Image') }}</th>
                            <td>
                                <img width="15%" style="border-radius: 12px"
                                     src="{{ Storage::disk('public')->url($application->photo) ?? asset('img/noImage.jpg') }}"
                                     alt="">
                            </td>
                        </tr>
                        <tr>
                            <th>{{ tr('File') }}</th>
                            <td>
                                @if($application->file)
                                    <a href="{{ Storage::disk('public')->url($application->file) }}"
                                       download="{{ Storage::disk('public')->url($application->file) }}">{{ Storage::disk('public')->url($application->file) }}</a>
                                @else
                                    {{ tr('No Files') }}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>{{ tr('Answer File') }}</th>
                            <td>
                                @if($application->answer_file)
                                    <a href="{{ Storage::disk('public')->url($application->answer_file) }}"
                                       download="{{ Storage::disk('public')->url($application->answer_file) }}">{{ Storage::disk('public')->url($application->answer_file) }}</a>
                                @else
                                    {{ tr('No Files') }}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>{{ tr('Code') }}</th>
                            <td>{{ $application->code ?? '' }}</td>
                        </tr>
                        <tr>
                            <th>{{ tr('Text of the question') }}</th>
                            <td>{{ $application->message ?? '' }}</td>
                        </tr>
                        <tr>
                            <th>{{ tr('Status') }}</th>
                            <td>
                                @if ($application->status == 1)
                                    <span class="badge bg-success p-2">{{ tr('Active') }}</span>
                                @elseif($application->status == 2)
                                    <span class="badge bg-danger p-2">{{ tr('Inactive') }}</span>
                                @else
                                    <span class="badge bg-secondary p-2">{{ tr('Not checked yet') }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>{{ tr('User Ip') }}</th>
                            <td>{{ $application->user_ip ?? '' }}</td>
                        </tr>
                        <tr>
                            <th>{{ tr('Created At') }}</th>
                            <td>
                                {{ $application->created_at->format('d.m.Y') }} <br/>
                                {{ $application->created_at->format('H:i') }}
                            </td>
                        </tr>
                        <tr>
                            <th>{{ tr('Updated At') }}</th>
                            <td>
                                {{ $application->updated_at->format('d.m.Y') }} <br/>
                                {{ $application->updated_at->format('H:i') }}
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
        </div>
    </div>
@endsection
