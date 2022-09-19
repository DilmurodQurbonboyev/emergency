@extends('admin.layouts.app')
@section('title')
    {{ MessageService::tr('Update Users') }}
@endsection
@section('header')
    <x-admin.breadcrumb :title="'Update User'" :breadcrumb="'users/edit'" :id="$users->id" />
@endsection
@section('content')
    <div class="card card-primary card-outline card-tabs">
        <div class="card-header">
            <h4>{{ MessageService::tr('Authority') }}</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('users.update', $users->id) }}" method="post">
                @csrf
                @method('patch')
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">

                            @foreach ($authorities as $authority)
                                <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input" type="checkbox" name="authority_id[]"
                                        id="authority_{{ $authority->id }}" value="{{ $authority->id }}"
                                        @foreach ($users->userRoleLink as $role) {{ $role->id == $authority->id ? 'checked' : '' }} @endforeach>
                                    <label for="authority_{{ $authority->id }}" class="custom-control-label">
                                        {{ $authority->title }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                @include('admin.layouts.update-button')
            </form>
        </div>
    </div>
@endsection
