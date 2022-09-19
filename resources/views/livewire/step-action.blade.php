<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ tr('Actions') }}</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12 my-2 d-flex justify-content-between">
                <a class="btn btn-primary create-btn" href="{{ route('step-action.create') }}">
                    <i class="fas fa-plus-circle"></i>
                    {{ tr('Create Step Action') }}
                </a>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-hover table-wrap">
                <thead>
                <tr class="text-primary">
                    <th>{{ tr('Id') }}</th>
                    <th>{{ tr('Step') }}</th>
                    <th>{{ tr('Action') }}</th>
                    <th>{{ tr('Next Step') }}</th>
                    <th>{{ tr('Status') }}</th>
                    <th>{{ tr('Creator') }}</th>
                    <th style="width: 100px"></th>
                </tr>
                <tr>
                    <th>
                        <input type="text" class="form-control" wire:model.debounce.300ms="searchId"/>
                    </th>
                    <th>
                        <input type="text" class="form-control" wire:model.debounce.300ms="searchCode"/>
                    </th>
                    <th>
                        <input type="text" class="form-control" wire:model.debounce.300ms="searchTitle"/>
                    </th>
                    <th>
                        <select wire:model="searchType" class="form-control">
                            <option value=""></option>
                            <option value="2">{{tr('Expert')}}</option>
                            <option value="1">{{tr('Applicant')}}</option>
                        </select>
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
                @foreach($stepActions as $stepAction)
                    <tr>
                        <td>{{ $stepAction->id }}</td>
                        <td>{{ $stepAction->steps->translation->title ?? '' }}</td>
                        <td>{{ $stepAction->actions->translation->title ?? ''}}</td>
                        <td>{{ $stepAction->nextStep->translation->title ?? '' }}</td>
                        <td>
                            @if ($stepAction->status == 2)
                                <span class="badge bg-success">{{tr('Active')}}</span>
                            @else
                                <span class="badge bg-danger">{{tr('Inactive')}}</span>
                            @endif
                        </td>
                        <td>{{ Str::ucfirst($stepAction->users->name) }}</td>
                        <td class="d-flex">
                            <a class="btn btn-primary m-1" href="{{ route('step-action.show', $stepAction->id) }}"
                               title="View"
                               aria-label="View"><span class="fas fa-eye"></span>
                            </a>
                            <a class="btn btn-primary m-1" href="{{ route('step-action.edit', $stepAction->id) }}"
                               title="Янгилаш"
                               aria-label="Янгилаш"><span class="fas fa-pencil-alt"></span>
                            </a>
                            <form method="POST" action="{{ route('step-action.destroy', $stepAction->id) }}">
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
            <span class="d-flex pt-2 justify-content-end">{{ $stepActions->links() }}</span>
        </div>
    </div>
</div>
