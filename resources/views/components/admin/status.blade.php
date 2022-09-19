<div class="row">
    <div class="col-md-12 d-flex flex-wrap">
        <a class="btn my-btn mt-2 mr-2 {{ request()->routeIs('applications.index') ? 'bg-primary' : '' }}"
           href="{{ route('applications.index') }}">
            <span>{{ tr('All') }}</span>
        </a>
        <a class="btn my-btn mt-2 mr-2 {{ request()->routeIs('applications.new') ? 'bg-primary' : '' }}"
           href="{{ route('applications.new') }}">
            <span>{{ tr('New') }}</span>
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
        @can('direction')
            <a class="btn my-btn mt-2 mr-2 {{ request()->routeIs('applications.returned') ? 'bg-primary' : '' }}"
               href="{{ route('applications.returned') }}">
                <span>{{ tr('Returned') }}</span>
                @if (!$returned)
                    <span class="badge bg-secondary ml-1">
                    {{ $returned }}
                </span>
                @else
                    <span class="badge bg-danger ml-1">
                    {{ $returned }}
                </span>
                @endif
            </a>
        @endcan
        <a class="btn my-btn mt-2 mr-2 {{ request()->routeIs('applications.accepted') ? 'bg-primary' : '' }}"
           href="{{ route('applications.accepted') }}">
            <span>{{ tr('Accepted') }}</span>
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
        <a class="btn my-btn mt-2 mr-2 {{ request()->routeIs('applications.rejected') ? 'bg-primary' : '' }}"
           href="{{ route('applications.rejected') }}">
            <span>{{ tr('Rejected') }}</span>
{{--            @if (!$rejected)--}}
{{--                <span class="badge bg-secondary ml-1">--}}
{{--                    {{ $rejected }}--}}
{{--                </span>--}}
{{--            @else--}}
{{--                <span class="badge bg-danger ml-1">--}}
{{--                    {{ $rejected }}--}}
{{--                </span>--}}
{{--            @endif--}}
        </a>
        <a class="btn my-btn mt-2 mr-2 {{ request()->routeIs('applications.deadlineExpired') ? 'bg-primary' : '' }}"
           href="{{ route('applications.deadlineExpired') }}">
            <span>{{ tr('Deadline expired') }}</span>
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
        <a class="btn my-btn mt-2 mr-2 {{ request()->routeIs('applications.closeAfterDeadline') ? 'bg-primary' : '' }}"
           href="{{ route('applications.closeAfterDeadline') }}">
            <span>{{ tr('Closed after deadline expiration') }}</span>
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
