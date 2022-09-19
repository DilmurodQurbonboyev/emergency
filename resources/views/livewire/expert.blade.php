<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ tr('Experts') }}</h3>
    </div>
    <div class="card-body">
        <div class="col-md-12 my-2 d-flex justify-content-between">
            <a class="btn btn-primary" href="{{ route('experts.create') }}">
                <i class="fas fa-plus-circle"></i>
                {{ tr('Create Expert') }}
            </a>
        </div>
        <div class="table-responsive">
            <table class="table table-hover table-wrap">
                <thead>
                    <tr class="text-primary">
                        <th>{{ tr('Id') }}</th>
                        <th>{{ tr('Step') }}</th>
                        <th>{{ tr('Authority') }}</th>
                        <th>{{ tr('Days') }}</th>
                        <th>{{ tr('Status') }}</th>
                        <th>{{ tr('Creator') }}</th>
                        <th style="width: 100px"></th>
                    </tr>
                    <tr>
                        <th>
                            <input type="text" class="form-control" wire:model.debounce.300ms="searchId" />
                        </th>
                        <th>
                            <select class="form-control" wire:model="searchStep">
                                <option></option>
                                @foreach ($steps as $step)
                                <option value="{{ $step->id }}">{{ Str::ucfirst($step->title ?? '') }}</option>
                                @endforeach
                            </select>
                        </th>
                        <th>
                            <input type="text" class="form-control" wire:model.debounce.300ms="searchAuthority" />
                        </th>
                        <th>
                            <input type="text" class="form-control" wire:model.debounce.300ms="searchDays" />
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
                    @foreach($experts as $expert)
                    <tr>
                        <td>{{ $expert->id }}</td>
                        <td>{{ $expert->steps->title ?? ''}}</td>
                        <td>{{ $expert->authorities->title ?? '' }}</td>
                        <td>{{ $expert->days }}</td>
                        <td>
                            @if ($expert->status == 2)
                            <span class="badge bg-success">{{tr('Active')}}</span>
                            @else
                            <span class="badge bg-danger">{{tr('Inactive')}}</span>
                            @endif
                        </td>
                        <td>{{ Str::ucfirst($expert->users->name) }}</td>
                        <td class="d-flex">
                            <a class="btn btn-primary m-1" href="{{ route('experts.show', $expert->id) }}"><span
                                    class="fas fa-eye"></span>
                            </a>
                            <a class="btn btn-primary m-1" href="{{ route('experts.edit', $expert->id) }}"><span
                                    class="fas fa-pencil-alt"></span>
                            </a>
                            <form method="POST" action="{{ route('experts.destroy', $expert->id) }}">
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
            <span class="d-flex pt-2 justify-content-end"> {{ $experts->links() }}</span>
        </div>
    </div>
</div>
