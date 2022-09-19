@if(!empty($task->expertData->action))
    {{-- Fail --}}
    @if($task->expertData->action->code == 'rejected')
        <div class="card-danger">
            <div class="card-header">
                <h5 class="text-center timeline-header">
                    {{ MessageService::tr('The application was rejected') }}
                </h5>
            </div>
        </div>
    @endif
    @if($task->expertData->action->code == 'not-suitable-for-purpose')
        <div class="card-danger">
            <div class="card-header">
                <h5 class="text-center timeline-header">
                    {{ MessageService::tr('The application was rejected') }}
                </h5>
            </div>
        </div>
    @endif
    {{-- Success --}}
    @if($task->expertData->action->code == 'purposefully')
        <div class="card-success">
            <div class="card-header">
                <h5 class="text-center timeline-header">
                    {{ MessageService::tr('The application was considered') }}
                </h5>
            </div>
        </div>
    @endif
    @if($task->expertData->action->code == 'satisfied')
        <div class="card-success">
            <div class="card-header">
                <h5 class="text-center timeline-header">
                    {{ MessageService::tr('The application was considered') }}
                </h5>
            </div>
        </div>
    @endif
    @if($task->expertData->action->code == 'send-board-of-trustees')
        <div class="card-success">
            <div class="card-header">
                <h5 class="text-center timeline-header">
                    {{ MessageService::tr('The application was considered') }}
                </h5>
            </div>
        </div>
    @endif
    {{-- Transfer --}}
    @if($task->expertData->action->code == 'transfer')
        <div class="card-danger">
            <div class="card-header">
                <h5 class="text-center timeline-header">
                    {{ MessageService::tr('The application was rejected') }}
                </h5>
            </div>
        </div>
    @endif
@endif
