<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ tr('Management Categories') }}</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12 my-2">
                <a class="btn btn-primary create-btn"
                   href="{{ route('managements-category.create') }}">
                    <i class="fas fa-plus-circle"></i>
                    {{ tr('Create Management Category') }}</a>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-hover table-wrap">
                <thead>
                <tr class="text-primary">
                    <th>{{ tr('Id') }}</th>
                    <th>{{ tr('Main') }}</th>
                    <th>{{ tr('Title') }}</th>
                    <th>{{ tr('Slug') }}</th>
                    <th>{{ tr('Status') }}</th>
                    <th>{{ tr('Creator') }}</th>
                    <th style="width: 100px"></th>
                </tr>
                <tr>
                    <th>
                        <input class="form-control" type="number" wire:model.debounce.300ms="filter_id"/>
                    </th>
                    <th>
                        <select class="form-control" wire:model.debounce.300ms="filter_parent_id">
                            <option value="0"></option>
                            @foreach ($managementParent as $managementpar)
                                <option value="{{ $managementpar->id }}">{{ $managementpar->title }}</option>
                            @endforeach
                        </select>
                    </th>
                    <th>
                        <input class="form-control" type="text" wire:model.debounce.300ms="filter_title"/>
                    </th>
                    <th>
                        <input class="form-control" type="text" wire:model.debounce.300ms="filter_slug"/>
                    </th>
                    <th>
                        <select class="custom-select rounded-0 select2bs4"
                                wire:model.debounce.300ms="filter_status">
                            <option value=""></option>
                            <option value="2">{{tr('Active')}}</option>
                            <option value="1">{{tr('Inactive')}}</option>
                        </select>
                    </th>
                    <th>
                        <select class="custom-select rounded-0 select2bs4" wire:model.debounce.300ms="filter_user">
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
                @foreach($managements as $management)
                    <tr>
                        <td>{{ $management->id }}</td>
                        <td>
                            @if($management->parent !== null)
                                {{ $management->parent->title }}
                            @else
                                {{tr('Main Category')}}
                            @endif
                        </td>
                        <td>{{ $management->title ?? ''}}</td>
                        <td>{{ $management->slug }}</td>
                        <td>
                            @if ($management->status == 2)
                                <span class="badge bg-success">{{tr('Active')}}</span>
                            @else
                                <span class="badge bg-danger">{{tr('Inactive')}}</span>
                            @endif
                        </td>
                        <td>{{ Str::ucfirst($management->users->name) }}</td>
                        <td class="d-flex">
                            <a class="btn btn-primary m-1"
                               href="{{ route('managements-category.show', $management->id) }}" title="View"
                               aria-label="View"><span class="fas fa-eye"></span>
                            </a>
                            <a class="btn btn-primary m-1"
                               href="{{ route('managements-category.edit', $management->id) }}" title="Янгилаш"
                               aria-label="Янгилаш"><span class="fas fa-pencil-alt"></span>
                            </a>
                            <form method="POST"
                                  action="{{ route('managements-category.destroy', $management->id) }}">
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
        </div>
    </div>
</div>
