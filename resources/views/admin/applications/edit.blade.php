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
            <form action="{{ route('applications.update', $application->id) }}" method="post"
                  enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="form-group">
                    <label for="status" class="@error('status') text-danger @enderror">{{ tr('Status') }}</label>
                    <select name="status" id="status"
                            class="form-control select2 @error('status') is-invalid @enderror">
                        <option value>{{ tr('Select') }}</option>
                        <option
                            value="1" {{ old('status', $application->status) == 1 ? 'selected' : '' }}>{{ tr('Satisfied') }}</option>
                        <option
                            value="-1" {{ old('status', $application->status) == -1 ? 'selected' : '' }}>{{ tr('Rejected') }}</option>
                    </select>
                    @error('status')
                    <div class="text-danger p-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="answer" class="@error('answer') text-danger @enderror">{{ tr('Answer') }}</label>
                    <textarea name="answer" class="form-control @error('answer') is-invalid @enderror" id="answer"
                              cols="30"
                              rows="10">{{ old('answer', $application->answer) ?? '' }}</textarea>
                </div>
                @error("answer")
                <div class="text-danger p-2">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="answer_file"
                           class="@error('answer_file') text-danger @enderror">{{ tr('Answer File') }}</label>
                    <input class="form-control @error('answer_file') is-invalid @enderror" type="file"
                           name="answer_file" id="formFile"/>
                </div>
                @error("answer_file")
                <div class="text-danger p-2">{{ $message }}</div>
                @enderror
                <button type="submit" class="btn btn-primary">{{ tr('Send') }}</button>
            </form>
        </div>
    </div>
@endsection
