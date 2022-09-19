<div class="table-responsive">
    <table class="table table-hover table-wrap">
        <thead>
            <tr class="text-primary">
                <th>{{ MessageService::tr('Id') }}</th>
                <th>{{ MessageService::tr('Main') }}</th>
                <th>{{ MessageService::tr('Title') }}</th>
                <th>{{ MessageService::tr('Slug') }}</th>
                <th>{{ MessageService::tr('Status') }}</th>
                <th>{{ MessageService::tr('Creator') }}</th>
                <th style="width: 100px"></th>
            </tr>
            <tr>
                <th>
                    <input class="form-control" type="number" wire:model.debounce.300ms="filter_id" />
                </th>
                <th>
                    <select class="form-control" wire:model.debounce.300ms="filter_parent_id">
                        <option value></option>
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->title ?? '' }}</option>
                        @endforeach
                    </select>
                </th>
                <th>
                    <input class="form-control" type="text" wire:model.debounce.300ms="filter_title" />
                </th>
                <th>
                    <input class="form-control" type="text" wire:model.debounce.300ms="filter_slug" />
                </th>
                <th>
                    <select class="custom-select rounded-0 select2bs4" wire:model.debounce.300ms="filter_status">
                        <option value=""></option>
                        <option value="2">{{ MessageService::tr('Active') }}</option>
                        <option value="1">{{ MessageService::tr('Inactive') }}</option>
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
            @foreach ($params as $param)
            <tr>
                <td>{{ $param->id }}</td>
                <td>
                    @if ($param->parent !== null)
                    {{ $param->parent->title }}
                    @else
                    {{ MessageService::tr('Main Category') }}
                    @endif
                </td>
                <td>{{ $param->title ?? '' }}</td>
                <td>{{ $param->slug }}</td>
                <td>
                    @if ($param->status == 2)
                    <span class="badge bg-success">{{ MessageService::tr('Active') }}</span>
                    @else
                    <span class="badge bg-danger">{{ MessageService::tr('Inactive') }}</span>
                    @endif
                </td>
                <td>{{ Str::ucfirst($param->users->name) }}</td>
                <td class="d-flex">
                    <a class="btn btn-primary m-1" href="{{ route("{$route}.show", $param->id) }}" title="View"
                        aria-label="View"><span class="fas fa-eye"></span>
                    </a>
                    <a class="btn btn-primary m-1" href="{{ route("{$route}.edit", $param->id) }}">
                        <span class="fas fa-pencil-alt"></span>
                    </a>
                    <form method="POST" action="{{ route("{$route}.destroy", $param->id) }}">
                        @csrf
                        <input name="_method" type="hidden" value="DELETE">
                        <button type="submit" class="btn btn-primary deleteBtn m-1">
                            <span class="fas fa-eraser"></span>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <span class="d-flex pt-2 justify-content-end">{{ $params->links() }}</span>
</div>
