<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ MessageService::tr('Users') }}</h3>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover table-wrap">
                <thead>
                    <tr class="text-primary">
                        <th>{{ MessageService::tr('Id') }}</th>
                        <th>{{ MessageService::tr('Username') }}</th>
                        <th>{{ MessageService::tr('Fullname') }}</th>
                        <th>{{ MessageService::tr('Authority') }}</th>
                        <th></th>
                    </tr>
                    <tr>
                        <th>
                            <input type="text" class="form-control" wire:model.debounce.300ms="searchId" />
                        </th>
                        <th>
                            <input type="text" class="form-control" wire:model.debounce.300ms="searchUsername" />
                        </th>
                        <th>
                            <input type="text" class="form-control" wire:model.debounce.300ms="searchFullname" />
                        </th>
                        <th>
                            <input type="text" class="form-control" wire:model.debounce.300ms="searchAuthority" />
                        </th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->userData->user_id }}</td>
                        <td>{{ $user->userData->full_name }}</td>
                        <td>
                            @foreach ($user->userRoleLink as $role)
                            <span class="bg-info badge">{{ $role->title ?? '' }}</span>
                            @endforeach
                        </td>
                        <td class="d-flex">
                            <a class="btn btn-primary m-1" href="{{ route('users.show', $user->id) }}">
                                <span class="fas fa-eye"></span>
                            </a>
                            <a class="btn btn-primary m-1" href="{{ route('users.edit', $user->id) }}">
                                <span class="fas fa-pencil-alt"></span>
                            </a>
                            <form method="POST" action="{{ route('users.destroy', $user->id) }}">
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
            <span class="d-flex pt-2 justify-content-end"> {{ $users->links() }}</span>
        </div>
    </div>
</div>
