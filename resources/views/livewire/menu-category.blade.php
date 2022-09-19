<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ MessageService::tr('Menu Categories') }}</h3>
    </div>
    <div class="card-body">
        <x-admin.menu.table-button :route="'menus-category'" :title="'Create Menu Category'" />
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
                            <input type="text" class="form-control" wire:model.debounce.300ms="searchId" />
                        </th>
                        <th>
                            <input type="text" class="form-control" wire:model.debounce.300ms="searchTitle" />
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
                    @foreach ($menusCategories as $menusCategory)
                        <tr>
                            <td>{{ $menusCategory->id }}</td>
                            <td>{{ $menusCategory->title ?? '' }}</td>
                            <td>
                                @if ($menusCategory->status == 2)
                                    <span class="badge bg-success">{{ MessageService::tr('Active') }}</span>
                                @else
                                    <span class="badge bg-danger">{{ MessageService::tr('Inactive') }}</span>
                                @endif
                            </td>
                            <td>{{ Str::ucfirst($menusCategory->users->name) }}</td>
                            <td class="d-flex">
                                <a class="btn btn-primary m-1"
                                    href="{{ route('menus-category.show', $menusCategory->id) }}"><span
                                        class="fas fa-eye"></span>
                                </a>
                                <a class="btn btn-primary m-1"
                                    href="{{ route('menus-category.edit', $menusCategory->id) }}"><span
                                        class="fas fa-pencil-alt"></span>
                                </a>
                                <form method="POST"
                                    action="{{ route('menus-category.destroy', $menusCategory->id) }}">
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
            <span class="d-flex pt-2 justify-content-end"> {{ $menusCategories->links() }}</span>
        </div>
    </div>
</div>
