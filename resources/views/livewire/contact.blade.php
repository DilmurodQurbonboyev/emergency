<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ tr('Contacts') }}</h3>
    </div>
    <div class="card-body">
        <div class="row">
{{--            <div class="col-md-12 my-2">--}}
{{--                <a class="btn btn-primary create-btn" href="{{ route('contacts.create') }}">--}}
{{--                    <i class="fas fa-plus-circle"></i>--}}
{{--                    {{ tr('Create Contact') }}--}}
{{--                </a>--}}
{{--            </div>--}}
        </div>
        <div class="table-responsive">
            <table class="table table-hover table-wrap">
                <thead>
                <tr class="text-primary">
                    <th>{{ tr('Id') }}</th>
                    <th>{{ tr('Phone') }}</th>
                    <th>{{ tr('Address') }}</th>
                    <th>{{ tr('Reception') }}</th>
                    <th>{{ tr('Email') }}</th>
                    <th>{{ tr('Working Time') }}</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($contacts as $contact)
                    <tr>
                        <td>{{ $contact->id }}</td>
                        <td>{{ $contact->phone }}</td>
                        <td>{{ $contact->address }}</td>
                        <td>{{ $contact->reception }}</td>
                        <td>{{ $contact->email }}</td>
                        <td>{{ $contact->working_time }}</td>
                        <td class="d-flex">
                            <a class="btn btn-primary m-1" href="{{ route('contacts.show', $contact->id) }}"
                               title="View" aria-label="View"><span class="fas fa-eye"></span>
                            </a>
                            <a class="btn btn-primary m-1" href="{{ route('contacts.edit', $contact->id) }}"
                               title="Янгилаш" aria-label="Янгилаш"><span class="fas fa-pencil-alt"></span>
                            </a>
{{--                            <form method="POST" action="{{ route('contacts.destroy', $contact->id) }}">--}}
{{--                                @csrf--}}
{{--                                <input name="_method" type="hidden" value="DELETE">--}}
{{--                                <button type="submit" class="btn btn-primary deleteBtn m-1">--}}
{{--                                    <span class="fas fa-eraser"></span></button>--}}
{{--                            </form>--}}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
