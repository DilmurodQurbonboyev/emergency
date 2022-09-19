<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ tr('Holidays') }}</h3>
    </div>
    <div class="card-body">
        <div class="col-md-12 my-2 d-flex justify-content-between">
            <a class="btn btn-primary" href="{{ route('holidays.create') }}">
                <i class="fas fa-plus-circle"></i>
                {{ tr('Create Holiday') }}
            </a>
        </div>
        <div class="table-responsive">
            <table class="table table-hover table-wrap">
                <thead>
                    <tr class="text-primary">
                        <th>{{ tr('Id') }}</th>
                        <th>{{ tr('Date') }}</th>
                        <th>{{ tr('Type') }}</th>
                        <th>{{ tr('Description') }}</th>
                        <th>{{ tr('Status') }}</th>
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
                                <option value="2">{{ tr('Active') }}</option>
                                <option value="1">{{ tr('Inactive') }}</option>
                            </select>
                        </th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($holidays as $holiday)
                    <tr>
                        <td>{{ $holiday->id }}</td>
                        <td>{{ $holiday->date }}</td>
                        <td>
                            @if ($holiday->type == 1)
                            <span class="badge bg-success">{{ tr('Holidays') }}</span>
                            @else
                            <span class="badge bg-danger">{{ tr('Working days') }}</span>
                            @endif
                        </td>
                        <td>{{ $holiday->description }}</td>
                        <td>
                            @if ($holiday->status == 2)
                            <span class="badge bg-success">{{ tr('Status') }}</span>
                            @else
                            <span class="badge bg-danger">{{ tr('Inactive') }}</span>
                            @endif
                        </td>
                        <td class="d-flex">
                            <a class="btn btn-primary m-1" href="{{ route('holidays.show', $holiday->id) }}"><span
                                    class="fas fa-eye"></span>
                            </a>
                            <a class="btn btn-primary m-1" href="{{ route('holidays.edit', $holiday->id) }}"><span
                                    class="fas fa-pencil-alt"></span>
                            </a>
                            <form method="POST" action="{{ route('holidays.destroy', $holiday->id) }}">
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
            <span class="d-flex pt-2 justify-content-end">{{ $holidays->links() }}</span>
        </div>
    </div>
</div>
