<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ tr('Applications') }}</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12 d-flex p-2">
                <a class="btn btn-outline-primary m-2 active" href="#">
                    {{ tr('All') }}
                </a>
                <a class="btn btn-outline-primary m-2" href="#">
                    {{ tr('New') }}
                </a>
                <a class="btn btn-outline-primary m-2" href="#">
                    {{ tr('Process') }}
                </a>
                <a class="btn btn-outline-primary m-2" href="#">
                    {{ tr('Accepted') }}
                </a>
                <a class="btn btn-outline-primary m-2" href="#">
                    {{ tr('Rejected') }}
                </a>
                <a class="btn btn-outline-primary m-2" href="#">
                    {{ tr('Deadline expired') }}
                </a>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-hover table-wrap">
                <thead>
                <tr class="text-primary">
                    <th></th>
                    <th>{{ tr('Id') }}</th>
                    <th>{{ tr('Category') }}</th>
                    <th>{{ tr('Given date') }}</th>
                    <th>{{ tr('Deadline') }}</th>
                    <th style="width: 100px"></th>
                </tr>
                <tr>
                    <th>
                        <input type="checkbox" name="" id="checkAll">
                    </th>
                    <th>
                        <input type="text" class="form-control" wire:model.debounce.300ms="searchId"/>
                    </th>
                    <th>
                        <input type="text" class="form-control" wire:model.debounce.300ms="searchTitle"/>
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
                </tr>
                </thead>
                <tbody>
                @foreach($applications as $application)
                    <tr>
                        <td>
                            <input type="checkbox" class="checkItem">
                        </td>
                        <td>{{ $application->id }}</td>
                        <td>{{ $application->category->title ?? '' }}</td>
                        <td>{{ $application->created_at->format('d.m.Y') }}
                            {{ $application->created_at->format('H:i') }}
                        </td>
                        <td>
                            {{ $application->created_at->addDays($application->steps->days)->format('d.m.Y') }}
                        </td>
                        <td style="width:70px;">
                            <a class="btn btn-primary" href="{{ route('applications.show', $application->id) }}">
                                {{ tr('Details') }}
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
