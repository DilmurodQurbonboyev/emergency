<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ MessageService::tr('Authorities') }}</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12 my-2 d-flex justify-content-between">
                <a class="btn btn-primary" href="{{ route('authorities.create') }}">
                    <i class="fas fa-plus-circle"></i>
                    {{ MessageService::tr('Create Authority') }}
                </a>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-hover table-wrap">
                <thead>
                <tr class="text-primary">
                    <th>{{ MessageService::tr('Id') }}</th>
                    <th>{{ MessageService::tr('Title') }}</th>
                    <th>{{ MessageService::tr('Status') }}</th>
                    <th>{{ MessageService::tr('Creator') }}</th>
                    <th style="width: 100px"></th>
                </tr>
                <tr>
                    <th>
                        <input type="text" class="form-control" wire:model.debounce.300ms="searchId"/>
                    </th>
                    <th>
                        <input type="text" class="form-control" wire:model.debounce.300ms="searchTitle"/>
                    </th>
                    <th>
                        <select wire:model="searchStatus" class="form-control">
                            <option value=""></option>
                            <option value="2">{{ MessageService::tr('Active') }}</option>
                            <option value="1">{{ MessageService::tr('Inactive') }}</option>
                        </select>
                    </th>
                    <th>
                        <select class="form-control" wire:model="searchUser">
                            <option></option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ Str::ucfirst($user->name) }}</option>
                            @endforeach
                        </select>
                    </th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($authorities as $authority)
                    <tr>
                        <td>{{ $authority->id }}</td>
                        <td>{{ $authority->title ?? '' }}</td>
                        <td>
                            @if ($authority->status == 2)
                                <span class="badge bg-success">{{ MessageService::tr('Active') }}</span>
                            @else
                                <span class="badge bg-danger">{{ MessageService::tr('Inactive') }}</span>
                            @endif
                        </td>
                        <td>{{ Str::ucfirst($authority->users->name) }}</td>
                        <td class="d-flex">
                            <a class="btn btn-primary m-1" href="{{ route('authorities.show', $authority->id) }}"><span
                                    class="fas fa-eye"></span>
                            </a>
                            <a class="btn btn-primary m-1" href="{{ route('authorities.edit', $authority->id) }}"><span
                                    class="fas fa-pencil-alt"></span>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <span class="d-flex pt-2 justify-content-end"> {{ $authorities->links() }}</span>
        </div>
    </div>
</div>
