<div class="row">
    <div class="col-md-12 d-flex flex-wrap">
        <a class="btn my-btn mt-2 mr-2 {{ request()->routeIs('emergency-applications.index') ? 'bg-primary' : '' }}"
           href="{{ route('emergency-applications.index') }}">
            <span>{{ \App\Services\MessageService::tr('All') }}</span>
        </a>
        <a class="btn my-btn mt-2 mr-2 {{ request()->routeIs('emergency-applications.new') ? 'bg-primary' : '' }}"
           href="{{ route('emergency-applications.new') }}">
            <span>{{ \App\Services\MessageService::tr('New') }}</span>
            @if (!$new)
                <span class="badge bg-secondary ml-1">
                    {{ $new }}
                </span>
            @else
                <span class="badge bg-danger ml-1">
                    {{ $new }}
                </span>
            @endif
        </a>
        <a class="btn my-btn mt-2 mr-2 {{ request()->routeIs('emergency-applications.accepted') ? 'bg-primary' : '' }}"
           href="{{ route('emergency-applications.accepted') }}">
            <span>{{ \App\Services\MessageService::tr('Accepted') }}</span>
            {{--            @if (!$accepted)--}}
            {{--                <span class="badge bg-secondary ml-1">--}}
            {{--                    {{ $accepted }}--}}
            {{--                </span>--}}
            {{--            @else--}}
            {{--                <span class="badge bg-danger ml-1">--}}
            {{--                    {{ $accepted }}--}}
            {{--                </span>--}}
            {{--            @endif--}}
        </a>
        <a class="btn my-btn mt-2 mr-2 {{ request()->routeIs('emergency-applications.deadlineExpired') ? 'bg-primary' : '' }}"
           href="{{ route('emergency-applications.deadlineExpired') }}">
            <span>{{ \App\Services\MessageService::tr('Deadline expired') }}</span>
            @if (!$deadlineExpired)
                <span class="badge bg-secondary ml-1">
                    {{ $deadlineExpired }}
                </span>
            @else
                <span class="badge bg-danger ml-1">
                    {{ $deadlineExpired }}
                </span>
            @endif
        </a>
        <a class="btn my-btn mt-2 mr-2 {{ request()->routeIs('emergency-applications.closeAfterDeadline') ? 'bg-primary' : '' }}"
           href="{{ route('emergency-applications.closeAfterDeadline') }}">
            <span>{{ \App\Services\MessageService::tr('Closed after deadline expiration') }}</span>
            {{--            @if (!$closeAfterDeadline)--}}
            {{--                <span class="badge bg-secondary ml-1">--}}
            {{--                    {{ $closeAfterDeadline }}--}}
            {{--                </span>--}}
            {{--            @else--}}
            {{--                <span class="badge bg-danger ml-1">--}}
            {{--                    {{ $closeAfterDeadline }}--}}
            {{--                </span>--}}
            {{--            @endif--}}
        </a>
    </div>
</div>
