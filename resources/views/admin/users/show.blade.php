@extends('admin.layouts.app')
@section('title')
{{ MessageService::tr('About News Category')}}
@endsection

@section('header')
<x-admin.breadcrumb-show :show="$users->name ?? '' " :breadcrumb="'users/show'" :id="$users->id" />
@endsection
@section('content')
<div class="p-3 d-flex justify-content-end" style="grid-gap: 2px">
    <button onclick="print()" class="cards btn btn-secondary">
        <i class="fas fa-print"></i>
    </button>
    <a class="cards btn btn-info text-white" href="{{ route('users.index') }}">
        <i class="fa fa-list"></i>
    </a>
    <form method="POST" action="{{ route('users.destroy', $users->id) }}">
        @csrf
        @method('DELETE')
        <input name="_method" type="hidden" value="DELETE">
        <button type="submit" class="cards btn btn-danger">
            <i class="fa fa-trash"></i></button>
    </form>
</div>
<div class="card">
    <div class="card-body">
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" href="#user" data-toggle="tab" role="tab" aria-controls="user"
                    aria-selected="true">
                    {{ MessageService::tr('User') }}
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#oneid" data-toggle="tab" role="tab" aria-controls="oneid"
                    aria-selected="false">
                    {{ MessageService::tr('User OneId data') }}
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#w2-tab2" data-toggle="tab" role="tab" aria-controls="w2-tab2"
                    aria-selected="true">
                    {{ MessageService::tr('Roles') }}
                </a>
            </li>
        </ul>
        <div class="tab-content">
            <div id="user" class="tab-pane active"><br>
                <table id="w0" class="table table-striped table-bordered ">
                    <tbody>
                        <tr>
                            <th>{{ MessageService::tr('Id') }}</th>
                            <td>{{ $users->id }}</td>
                        </tr>
                        <tr>
                            <th>{{ MessageService::tr('Username') }}</th>
                            <td>{{ $users->userData->user_id }}</td>
                        </tr>
                        <tr>
                            <th>{{ MessageService::tr('Email') }}</th>
                            <td>{{ $users->userData->email }}</td>
                        </tr>
                        <tr>
                            <th>{{ MessageService::tr('Created At') }}</th>
                            <td>{{ $users->created_at }}</td>
                        </tr>
                        <tr>
                            <th>{{ MessageService::tr('Updated At') }}</th>
                            <td>{{ $users->updated_at }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div id="oneid" class="tab-pane"><br>
                <table id="w1" class="table table-striped table-bordered detail-view">
                    <tbody>
                        <tr>
                            <th>{{ MessageService::tr('Id') }}</th>
                            <td>{{ $users->id }}</td>
                        </tr>
                        <tr>
                            <th>{{ MessageService::tr('User Id') }}</th>
                            <td>{{ $users->userData->userid }}</td>
                        </tr>
                        <tr>
                            <th>{{ MessageService::tr('First Name') }}</th>
                            <td>{{ $users->userData->first_name }}</td>
                        </tr>
                        <tr>
                            <th>{{ MessageService::tr('Last name') }}</th>
                            <td>{{ $users->userData->sur_name }}</td>
                        </tr>
                        <tr>
                            <th>{{ MessageService::tr('Middle name') }}</th>
                            <td>{{ $users->userData->mid_name ?? '' }}</td>
                        </tr>
                        <tr>
                            <th>{{ MessageService::tr('Full name') }}</th>
                            <td>{{ $users->userData->full_name }}</td>
                        </tr>
                        <tr>
                            <th>{{ MessageService::tr('Birth') }}</th>
                            <td>{{ $users->userData->birth_date }}</td>
                        </tr>
                        <tr>
                            <th>{{ MessageService::tr('Gender') }}</th>
                            <td>{{ $users->userData->gd }}</td>
                        </tr>
                        <tr>
                            <th>{{ MessageService::tr('Email') }}</th>
                            <td>{{ $users->userData->email }}</td>
                        </tr>
                        <tr>
                            <th>{{ MessageService::tr('Phone') }}</th>
                            <td>{{ $users->userData->mob_phone_no }}</td>
                        </tr>
                        <tr>
                            <th>{{ MessageService::tr('Pinfl') }}</th>
                            <td>{{ $users->userData->pin }}</td>
                        </tr>
                        <tr>
                            <th>{{ MessageService::tr('Passport Number') }}</th>
                            <td>{{ $users->userData->pport_no }}</td>
                        </tr>
                        <tr>
                            <th>{{tr('Passport Issue Date')}}</th>
                            <td>{{ $users->userData->pport_issue_date }}</td>
                        </tr>
                        <tr>
                            <th>{{ MessageService::tr('Passport Expiration Date') }}</th>
                            <td>{{ $users->userData->pport_issue_date }}</td>
                        </tr>
                        <tr>
                            <th>{{ MessageService::tr('Passport Issue Place') }}</th>
                            <td>{{ $users->userData->pport_issue_place }}</td>
                        </tr>
                        <tr>
                            <th>{{ MessageService::tr('Citizen') }}</th>
                            <td>{{ $users->userData->ctzn }}</td>
                        </tr>
                        <tr>
                            <th>{{ MessageService::tr('Place of birth') }}</th>
                            <td>{{ $users->userData->birth_place }}</td>
                        </tr>
                        <tr>
                            <th>{{ MessageService::tr('Address') }}</th>
                            <td>{{ $users->userData->per_adr }}</td>
                        </tr>
                        <tr>
                            <th>{{ MessageService::tr('Created At') }}</th>
                            <td>{{ $users->userData->created_at }}</td>
                        </tr>
                        <tr>
                            <th>{{ MessageService::tr('Updated At') }}</th>
                            <td>{{ $users->userData->updated_at }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div id="w2-tab2" class="tab-pane"><br>
                <div class="row">
                    <div class="col-xl-12">
                        <p>
                            <a class="btn btn-primary cards" href="{{ route('users.edit', $users->id) }}">
                                {{ MessageService::tr('Assign Role') }}
                            </a>
                        </p>
                    </div>
                    <br>
                    <div class="col-xl-12">
                        @foreach ($users->userRoleLink as $role)
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-9 col-md-6 col-sm-12 auth-name">
                                        {{ MessageService::tr('Authority') }}:
                                        <span class="text-bold authority-name">
                                            {{ $role->title ?? '' }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
