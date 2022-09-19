@extends('admin.layouts.app')
@section('title')
    {{ tr('Update Vacancy') }}
@endsection
@section('header')
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
        <div class="card-body">
            <form action="{{ route('applications.update', $vacancy->id) }}" method="post">
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
