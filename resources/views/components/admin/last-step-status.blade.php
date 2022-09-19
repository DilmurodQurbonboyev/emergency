<div class="row">
    <div class="col-md-12 d-flex flex-wrap">
        <a class="btn my-btn mt-2 mr-2 {{ request()->routeIs('last-step.index') ? 'bg-primary' : '' }}"
            href="{{ route('last-step.index') }}">
            <span>{{ MessageService::tr('All') }}</span>
        </a>
        <a class="btn my-btn mt-2 mr-2 {{ request()->routeIs('last-step.new') ? 'bg-primary' : '' }}"
            href="{{ route('last-step.new') }}">
            <span>{{ MessageService::tr('New') }}</span>
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
        <a class="btn my-btn mt-2 mr-2 {{ request()->routeIs('last-step.accepted') ? 'bg-primary' : '' }}"
            href="{{ route('last-step.accepted') }}">
            <span>{{ MessageService::tr('Accepted') }}</span>
            @if (!$accepted)
                <span class="badge bg-secondary ml-1">
                    {{ $accepted }}
                </span>
            @else
                <span class="badge bg-danger ml-1">
                    {{ $accepted }}
                </span>
            @endif
        </a>
        <a class="btn my-btn mt-2 mr-2 {{ request()->routeIs('last-step.rejected') ? 'bg-primary' : '' }}"
            href="{{ route('last-step.rejected') }}">
            <span>{{ tr('Rejected') }}</span>
            @if (!$rejected)
                <span class="badge bg-secondary ml-1">
                    {{ $rejected }}
                </span>
            @else
                <span class="badge bg-danger ml-1">
                    {{ $rejected }}
                </span>
            @endif
        </a>
        <a class="btn my-btn mt-2 mr-2 {{ request()->routeIs('last-step.deadlineExpired') ? 'bg-primary' : '' }}"
            href="{{ route('last-step.deadlineExpired') }}">
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
        <a class="btn my-btn mt-2 mr-2 {{ request()->routeIs('last-step.closeAfterDeadline') ? 'bg-primary' : '' }}"
            href="{{ route('last-step.closeAfterDeadline') }}">
            <span>{{ tr('Closed after deadline expiration') }}</span>
            @if (!$closeAfterDeadline)
                <span class="badge bg-secondary ml-1">
                    {{ $closeAfterDeadline }}
                </span>
            @else
                <span class="badge bg-danger ml-1">
                    {{ $closeAfterDeadline }}
                </span>
            @endif
        </a>
    </div>
</div>
