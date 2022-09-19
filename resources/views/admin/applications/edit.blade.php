@extends('admin.layouts.app')
@section('title')
    {{ tr('Update Application') }}
@endsection
@section('header')
    <x-admin.breadcrumb :title="'Update Application'" :breadcrumb="'applications/edit'" :id="$application->id"/>
@endsection
@section('content')
    <div class="p-3 d-flex justify-content-end" style="grid-gap: 2px">
        <a class="btn btn-info text-white cards" href="{{ route('applications.index') }}">
            <i class="fa fa-list"></i>
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
                        <th>{{ tr('Date of birth') }}</th>
                        <td>{{ $application->birth_date ?? '' }}</td>
                    </tr>
                    <tr>
                        <th>{{ tr('Passport information') }}</th>
                        <td>{{ $application->passport_data ?? '' }}</td>
                    </tr>
                    <tr>
                        <th>{{ tr('Address') }}</th>
                        <td>{{ $application->address ?? '' }}</td>
                    </tr>
                    <tr>
                        <th>{{ tr('Index') }}</th>
                        <td>{{ $application->index ?? '' }}</td>
                    </tr>
                    <tr>
                        <th>{{ tr('Code') }}</th>
                        <td>{{ $application->code ?? '' }}</td>
                    </tr>
                    <tr>
                        <th>{{ tr('Topics of appeals') }}</th>
                        <td>{{ $application->type_id ?? '' }}</td>
                    </tr>
                    <tr>
                        <th>{{ tr('Email') }}</th>
                        <td>{{ $application->email ?? '' }}</td>
                    </tr>
                    <tr>
                        <th>{{ tr('Phone') }}</th>
                        <td>{{ $application->phone ?? '' }}</td>
                    </tr>
                    <tr>
                        <th>{{ tr('Applicant') }}</th>
                        <td>{{ $application->appeal_type ?? '' }}</td>
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
        <div class="card-body">
            <form action="{{ route('applications.update', $application->id) }}" method="post">
                @csrf
                @method('patch')
                <div class="form-group">
                    <label for="status">{{ tr('Status') }}</label>
                    <select name="status" id="status"
                            class="form-control select2 @error('status') is-invalid @enderror">
                        <option value>{{ tr('Select') }}</option>
                        <option value="1">{{ tr('Satisfied') }}</option>
                        <option value="2">{{ tr('Rejected') }}</option>
                    </select>
                    @error('status')
                    <div class="text-danger p-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="answer">{{ tr('Answer') }}</label>
                    <textarea name="answer" class="form-control" id="answer" cols="30"
                              rows="10">{{ old('answer') }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">{{ tr('Send') }}</button>
            </form>
        </div>
    </div>
@endsection
