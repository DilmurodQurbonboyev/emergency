<div class="p-3 d-flex justify-content-end" style="grid-gap: 2px">
    <button onclick="print()" class="cards btn btn-secondary">
        <i class="fas fa-print"></i>
    </button>
    <a class="cards btn btn-success" href="{{ route("{$route}.create") }}">
        <i class="fa fa-plus"></i>
    </a>
    <a class="cards btn btn-info text-white" href="{{ route("{$route}.index") }}">
        <i class="fa fa-list"></i>
    </a>
    <a class="cards btn btn-primary" href="{{ route("{$route}.edit", $param->id) }}">
        <i class="fa fa-edit"></i>
    </a>
    <form method="POST" action="{{ route("{$route}.destroy", $param->id) }}">
        @csrf
        <input name="_method" type="hidden" value="DELETE">
        <button type="submit" class="cards btn btn-danger deleteBtn">
            <span class="fas fa-eraser"></span></button>
    </form>
</div>
<div class="card card-primary card-outline card-tabs">
    <div class="card-header p-0 pt-1 border-bottom-0">
        <x-admin.language-tab/>
    </div>
    <div class="card-body">
        <div class="tab-content">
            @foreach (Config::get('translatable.locales') as $lang)
                <div class="tab-pane fade show" id="{{ $lang }}" role="tabpanel" aria-labelledby="{{ $lang }}">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <tbody>
                            <tr>
                                <td>{{ MessageService::tr('Id') }}</td>
                                <th scope="row">{{ $param->id }}</th>
                            </tr>
                            <tr>
                                <td>{{ MessageService::tr('Main') }}</td>
                                <th scope="row">
                                    @if ($param->parent_id == 0)
                                        {{ MessageService::tr('Main Category') }}
                                    @else
                                        {{ $param->parent->title ?? '' }}
                                    @endif
                                </th>
                            </tr>
                            <tr>
                                <td>{{ MessageService::tr('Title') }}</td>
                                <th scope="row">{{ $param->translate($lang)->title ?? '' }}</th>
                            </tr>
                            <tr>
                                <td>{{ MessageService::tr('Slug') }}</td>
                                <th scope="row">{{ $param->slug ?? '' }}</th>
                            </tr>
                            <tr>
                                <td>{{ MessageService::tr('Image') }}</td>
                                <th>
                                    @if ($param->image)
                                        <a data-fancybox="single" href="{{ $param->image }}">
                                            <div class="foto-in">
                                                <img width="300px" src="{{ $param->image }}"/>
                                            </div>
                                        </a>
                                    @else
                                        <span class="text-danger">{{ MessageService::tr('No Image') }}</span>
                                    @endif
                                </th>
                            </tr>
                            <tr>
                                <td>{{ MessageService::tr('Status') }}</td>
                                <th scope="row">
                                    @if ($param->status == 2)
                                        <span class="badge bg-success p-2">{{ MessageService::tr('Active') }}</span>
                                    @else
                                        <span class="badge bg-danger p-2">{{ MessageService::tr('Inactive') }}</span>
                                    @endif
                                </th>
                            </tr>
                            <tr>
                                <td>{{ MessageService::tr('Creator') }}</td>
                                <th scope="row">{{ Str::ucfirst($param->users->name) }}</th>
                            </tr>
                            <tr>
                                <td>{{ MessageService::tr('Modifier') }}</td>
                                <th scope="row">
                                    @if ($param->modifier_id)
                                        {{ Str::ucfirst($param->modifiers->name) }}
                                    @else
                                        <span class="text-danger">{{ MessageService::tr('Not set') }}</span>
                                    @endif
                                </th>
                            </tr>
                            <tr>
                                <td>{{ MessageService::tr('Created At') }}</td>
                                <th scope="row">
                                    {{ $param->created_at->format('d.m.Y') }} <br/>
                                    {{ $param->created_at->format('H:i') }}
                                </th>
                            </tr>
                            <tr>
                                <td>{{ MessageService::tr('Updated At') }}</td>
                                <th scope="row">
                                    {{ $param->updated_at->format('d.m.Y') }}<br/>
                                    {{ $param->updated_at->format('H:i') }}
                                </th>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
