<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ tr('Menus') }}</h3>
    </div>
    <div class="card-body">
        <x-admin.menu.table-button :route="'menus'" :title="'Create Menu'" />
        <div class="table-responsive">
            <table class="table table-hover table-wrap">
                <thead>
                    <tr class="text-primary">
                        <th>{{ tr('Id') }}</th>
                        <th>{{ tr('Main') }}</th>
                        <th>{{ tr('Category') }}</th>
                        <th>{{ tr('Title') }}</th>
                        <th>{{ tr('Link') }}</th>
                        <th>{{ tr('Link Type') }}</th>
                        <th>{{ tr('Status') }}</th>
                        <th>{{ tr('Creator') }}</th>
                        <th style="width: 100px"></th>
                    </tr>
                    <tr>
                        <th>
                            <input class="form-control" wire:model.debounce.300ms="filter_id" type="number">
                        </th>
                        <th>
                            <select class="custom-select rounded-0" wire:model.debounce.300ms="filter_parent_id">
                                <option value></option>
                                @foreach ($parentMenus as $parentId)
                                <option value="{{ $parentId->id }}">{{ $parentId->title ?? '' }}
                                </option>
                                @endforeach
                            </select>
                        </th>
                        <th>
                            <select class="custom-select rounded-0" wire:model.debounce.300ms="filter_category">
                                <option value></option>
                                @foreach ($menusCategories as $menu)
                                <option value="{{ $menu->id }}">
                                    {{ $menu->title ?? '' }}
                                </option>
                                @endforeach
                            </select>
                        </th>
                        <th>
                            <input class="form-control" type="text" wire:model.debounce.300ms="filter_title">
                        </th>
                        <th>
                            <input class="form-control" type="text" wire:model.debounce.300ms="filter_link">
                        </th>
                        <th>
                            <select class="custom-select rounded-0" wire:model.debounce.300ms="filter_link_type">
                                <option></option>
                                <option value="1">{{ tr('Inactive') }}</option>
                                <option value="2">{{ tr('Local opens in this window') }}</option>
                                <option value="3">{{ tr('Local opens in a new window') }}</option>
                                <option value="4">{{ tr('Global opens in this window') }}</option>
                                <option value="5">{{ tr('Global opens in a new window') }}</option>
                            </select>
                        </th>
                        <th>
                            <select class="custom-select rounded-0" wire:model.debounce.300ms="filter_status">
                                <option value=""></option>
                                <option value="2">{{ tr('Active') }}</option>
                                <option value="1">{{ tr('Inactive') }}</option>
                            </select>
                        </th>
                        <th>
                            <select class="custom-select rounded-0" wire:model.debounce.300ms="filter_user">
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
                    @foreach ($menus as $menu)
                    <tr>
                        <td>{{ $menu->id }}</td>
                        <td>{{ $menu->parent != null ? $menu->parent->title : tr('Main Category') }}</td>
                        <td>
                            @if ($menu->category)
                            {{ $menu->category->title }}
                            @else
                            {{ tr('Not set') }}
                            @endif
                        </td>
                        <td>{{ $menu->title ?? '' }}</td>
                        <td>{{ $menu->link }}</td>
                        <td>
                            @if ($menu->link_type == 1)
                            {{ tr('Inactive') }}
                            @endif
                            @if ($menu->link_type == 2)
                            {{ tr('Local opens in this window') }}
                            @endif
                            @if ($menu->link_type == 3)
                            {{ tr('Local opens in a new window') }}
                            @endif
                            @if ($menu->link_type == 4)
                            {{ tr('Global opens in this window') }}
                            @endif
                            @if ($menu->link_type == 5)
                            {{ tr('Global opens in a new window') }}
                            @endif
                        </td>
                        <td>
                            @if ($menu->status == 2)
                            <span class="badge bg-success">{{ tr('Active') }}</span>
                            @else
                            <span class="badge bg-danger">{{ tr('Inactive') }}</span>
                            @endif
                        </td>
                        <td>{{ Str::ucfirst($menu->users->name) }}</td>
                        <td class="d-flex">
                            <a class="btn btn-primary m-1" href="{{ route('menus.show', $menu->id) }}" title="View"
                                aria-label="View"><span class="fas fa-eye"></span>
                            </a>
                            <a class="btn btn-primary m-1" href="{{ route('menus.edit', $menu->id) }}" title="Янгилаш"
                                aria-label="Янгилаш"><span class="fas fa-pencil-alt"></span>
                            </a>
                            <form method="POST" action="{{ route('menus.destroy', $menu->id) }}">
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
            <span class="d-flex pt-2 justify-content-end"> {{ $menus->links() }}</span>
        </div>
    </div>
</div>
