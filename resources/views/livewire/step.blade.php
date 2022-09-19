<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ tr('Steps') }}</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12 my-2 d-flex justify-content-between">
                <a class="btn btn-primary create-btn" href="{{ route('steps.create') }}">
                    <i class="fas fa-plus-circle"></i>
                    {{ tr('Create Step') }}
                </a>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-hover table-wrap">
                <thead>
                    <tr class="text-primary">
                        <th>{{ tr('Id') }}</th>
                        <th>{{ tr('Title') }}</th>
                        <th>{{ tr('Days') }}</th>
                        <th>{{ tr('Action') }}</th>
                        <th>{{ tr('Status') }}</th>
                        <th>{{ tr('Creator') }}</th>
                        <th style="width: 100px"></th>
                    </tr>
                    <tr>
                        <th>
                            <input type="text" class="form-control" wire:model.debounce.300ms="searchId" />
                        </th>
                        <th>
                            <input type="text" class="form-control" wire:model.debounce.300ms="searchTitle" />
                        </th>
                        <th>
                            <input type="text" class="form-control" wire:model.debounce.300ms="searchDays" />
                        </th>
                        <th>
                            <input type="text" class="form-control" wire:model.debounce.300ms="searchAction" />
                        </th>
                        <th>
                            <select wire:model="searchStatus" class="form-control">
                                <option value=""></option>
                                <option value="2">{{tr('Active')}}</option>
                                <option value="1">{{tr('Inactive')}}</option>
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
                    @foreach($steps as $step)
                    <tr>
                        <td>{{ $step->id }}</td>
                        <td>{{ $step->title ?? ''}}</td>
                        <td>{{ $step->days ?? '' }}</td>
                        <td>{{ $step->action ?? '' }}</td>
                        <td>
                            @if ($step->status == 2)
                            <span class="badge bg-success">{{tr('Active')}}</span>
                            @else
                            <span class="badge bg-danger">{{tr('Inactive')}}</span>
                            @endif
                        </td>
                        <td>{{ Str::ucfirst($step->users->name) }}</td>
                        <td class="d-flex">
                            <a class="btn btn-primary m-1" href="{{ route('steps.show', $step->id) }}" title="View"
                                aria-label="View"><span class="fas fa-eye"></span>
                            </a>
                            <a class="btn btn-primary m-1" href="{{ route('steps.edit', $step->id) }}" title="Янгилаш"
                                aria-label="Янгилаш"><span class="fas fa-pencil-alt"></span>
                            </a>
                            <form method="POST" action="{{ route('steps.destroy', $step->id) }}">
                                @csrf
                                <input name="_method" type="hidden" value="DELETE">
                                <button type="submit" class="btn btn-primary deleteBtn m-1">
                                    <span class="fas fa-eraser"></span></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <span class="d-flex pt-2 justify-content-end">{{ $steps->links() }}</span>
        </div>
    </div>
</div>
