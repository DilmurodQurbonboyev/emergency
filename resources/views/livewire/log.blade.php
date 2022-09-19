<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ tr('Logs') }}</h3>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover table-wrap">
                <thead>
                    <tr class="text-primary">
                        <th>{{ tr('Id') }}</th>
                        <th>{{ tr('Model') }}</th>
                        <th>{{ tr('Row Id') }}</th>
                        <th>{{ tr('Username') }}</th>
                        <th>{{ tr('Ip') }}</th>
                        <th>{{ tr('Url') }}</th>
                        <th>{{ tr('Action') }}</th>
                        <th>{{ tr('Created At') }}</th>
                        <th style="width: 100px"></th>
                    </tr>
                    <tr>
                        <th>
                            <input class="form-control" type="text" wire:model.debounce.300ms="filter_id">
                        </th>
                        <th>
                            <input class="form-control" type="text" wire:model.debounce.300ms="filter_modal">
                        </th>
                        <th>
                            <input class="form-control" type="text" wire:model.debounce.300ms="filter_row">
                        </th>
                        <th>
                            <select class="custom-select rounded-0 select2bs4" wire:model.debounce.300ms="filter_user">
                                <option value="0"></option>
                                @foreach ($users as $u)
                                    <option value="{{ $u->id }}">{{ $u->name }}</option>
                                @endforeach
                            </select>
                        </th>
                        <th>
                            <input class="form-control" type="text" wire:model.debounce.300ms="filter_ip">
                        </th>
                        <th>
                            <input class="form-control" type="text" wire:model.debounce.300ms="filter_url">
                        </th>
                        <th>
                            <select wire:model.debounce.300ms="filter_action" class="form-control">
                                <option value=""></option>
                                <option value="created">{{ tr('created') }}</option>
                                <option value="updated">{{ tr('updated') }}</option>
                                <option value="deleted">{{ tr('deleted') }}</option>
                                <option value="restored">{{ tr('restored') }}</option>
                            </select>
                        </th>
                        <th>
                            <input class="form-control" type="text" wire:model.debounce.300ms="filter_created_at">
                        </th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($audits as $audit)
                        <tr>
                            <td>{{ $audit->id }}</td>
                            <td>{{ $audit->auditable_type }}</td>
                            <td>{{ $audit->auditable_id }}</td>
                            <td>{{ $audit->user_id }}</td>
                            <td>{{ $audit->ip_address }}</td>
                            <td>{{ $audit->url }}</td>
                            <td>{{ $audit->event }}</td>
                            <td>{{ $audit->created_at }}</td>
                            <td>
                                <a class="btn btn-primary" href="{{ route('logs.show', $audit->id) }}" title="View"
                                    aria-label="View"><span class="fas fa-eye"></span></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <span class="d-flex pt-2 justify-content-end"> {{ $audits->links() }}</span>
        </div>
    </div>
</div>
