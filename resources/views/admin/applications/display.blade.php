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
            <form action="{{ route('applications.displayPost', $application->id) }}" method="post"
                  enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="form-group">
                    <label for="display">{{ tr('Display') }}</label>
                    <select name="display" id="display" class="form-control select2">
                        <option value>{{ tr('Select') }}</option>
                        <option
                            value="2" {{ old('display', $application->display) == 2 ? 'selected' : '' }}>{{ tr('Yes') }}</option>
                        <option
                            value="1" {{ old('display', $application->display) == 1 ? 'selected' : '' }}>{{ tr('No') }}</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">{{ tr('Send') }}</button>
            </form>
        </div>
    </div>
@endsection
