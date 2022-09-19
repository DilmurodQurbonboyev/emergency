<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ tr('Messages') }}</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12 my-2">
                <a class="btn btn-primary create-btn" href="{{ route('messages.create') }}">
                    <i class="fas fa-plus-circle"></i>
                    {{ tr('Create Message') }}
                </a>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-hover table-wrap">
                <thead>
                    <tr class="text-primary">
                        <th>{{ tr('Id') }}</th>
                        <th>{{ tr('Title') }}</th>
                        <th>{{ tr('Messages') }}</th>
                        <th></th>
                    </tr>
                    <tr>
                        <th>
                            <input class="form-control" type="text" wire:model.debounce.300ms="filter_id">
                        </th>
                        <th>
                            <input class="form-control" type="text" wire:model.debounce.300ms="filter_title">
                        </th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($messages as $message)
                        <tr>
                            <td>{{ $message->id }}</td>
                            <td>{{ $message->title ?? '' }}</td>
                            <td>
                                @if ($message->translate('oz')->title)
                                    <span class="badge bg-success">O‘zb</span>
                                @else
                                    <span class="badge bg-danger">O‘zb</span>
                                @endif
                                @if ($message->translate('uz')->title)
                                    <span class="badge bg-success">Ўзб</span>
                                @else
                                    <span class="badge bg-danger">Ўзб</span>
                                @endif
                                @if ($message->translate('ru')->title)
                                    <span class="badge bg-success">Рус</span>
                                @else
                                    <span class="badge bg-danger">Рус</span>
                                @endif
                                @if ($message->translate('en')->title)
                                    <span class="badge bg-success">Eng</span>
                                @else
                                    <span class="badge bg-danger">Eng</span>
                                @endif
                            </td>
                            <td class="d-flex">
                                <a class="btn btn-primary m-1" href="{{ route('messages.show', $message->id) }}"
                                    title="View" aria-label="View"><span class="fas fa-eye"></span>
                                </a>
                                <a class="btn btn-primary m-1" href="{{ route('messages.edit', $message->id) }}"
                                    title="Янгилаш" aria-label="Янгилаш"><span class="fas fa-pencil-alt"></span>
                                </a>
                                <form method="POST" action="{{ route('messages.destroy', $message->id) }}">
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
            <span class="d-flex pt-2 justify-content-end"> {{ $messages->links() }}</span>
        </div>
    </div>
</div>
