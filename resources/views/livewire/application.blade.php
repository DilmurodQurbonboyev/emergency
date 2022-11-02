<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ tr('Applications') }}</h3>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover table-wrap">
                <thead>
                <tr class="text-primary">
                    <th>{{ tr('Id') }}</th>
                    <th>{{ tr('Image') }}</th>
                    <th>{{ tr('FullName') }}</th>
                    <th>{{tr('The content of the appeal')}}</th>
                    <th>{{ tr('Email') }}</th>
                    <th>{{ tr('Status') }}</th>
                    <th></th>
                </tr>
                <tr>
                    <th>
                        <input class="form-control" type="text" wire:model.debounce.300ms="filter_id">
                    </th>
                    <th>
                        <input class="form-control" type="text">
                    </th>
                    <th>
                        <input class="form-control" type="text" wire:model.debounce.300ms="filter_fullname">
                    </th>
                    <th>
                        <select class="custom-select rounded-0" wire:model.debounce.300ms="filter_appeal_type">
                            <option value=""></option>
                            <option value="1">{{ tr('Complaint') }}</option>
                            <option value="2">{{ tr('Gratitude') }}</option>
                            <option value="3">{{ tr('Appeal') }}</option>
                        </select>
                    </th>
                    <th>
                        <input class="form-control" type="text" wire:model.debounce.300ms="filter_email">
                    </th>
                    <th>
                        <select class="custom-select rounded-0" wire:model.debounce.300ms="filter_status">
                            <option value=""></option>
                            <option value="1">{{ tr('Active') }}</option>
                            <option value="-1">{{ tr('Rejected') }}</option>
                            <option value="0">{{ tr('Inactive') }}</option>
                        </select>
                    </th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($applications as $application)
                    <tr>
                        <td>{{ $application->id }}</td>
                        <td>
                            @if(!empty($application->photo))
                                <img width="80px"
                                     src="{{ Storage::disk('public')->url($application->photo) }}" alt="">
                            @else
                                <img width="80px" src="{{ asset('img/noImage.jpg') }}"
                                     alt="">
                            @endif
                        </td>
                        <td>{{ $application->fullname ?? '' }}</td>
                        <td>
                            @if($application->appeal_type == 1)
                                <span class="badge bg-danger">{{ tr('Complaint') }}</span>
                            @elseif($application->appeal_type == 2)
                                <span class="badge bg-success">{{ tr('Gratitude') }}</span>
                            @else
                                <span class="badge bg-warning">{{tr('Appeal')}}</span>
                            @endif
                        </td>
                        <td>{{ $application->email ?? '' }}</td>
                        <td>
                            @if ($application->status == 1)
                                <span class="badge bg-success">{{ tr('Active') }}</span>
                            @elseif($application->status == -1)
                                <span class="badge bg-danger">{{ tr('Rejected') }}</span>
                            @elseif($application->status == 0)
                                <span class="badge bg-secondary">{{ tr('Inactive') }}</span>
                            @endif
                        </td>
                        <td class="d-flex">
                            <a class="btn btn-primary m-1" href="{{ route('applications.show', $application->id) }}"
                               title="View" aria-label="View"><span class="fas fa-eye"></span>
                            </a>
                            <a class="btn btn-primary m-1" href="{{ route('applications.edit', $application->id) }}"
                               title="Янгилаш" aria-label="Янгилаш">
                                <i class="fas fa-paper-plane"></i>
                            </a>
                            <a class="btn btn-primary m-1"
                               href="{{ route('applications.display', $application->id) }}" title="Янгилаш"
                               aria-label="Янгилаш"><span class="fas fa-pencil-alt"></span>
                            </a>
                            <form method="POST" action="{{ route('applications.destroy', $application->id) }}">
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
            <span class="d-flex pt-2 justify-content-end"> {{ $applications->links() }}</span>
        </div>
    </div>
</div>
