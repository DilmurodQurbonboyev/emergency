<div class="form-group">
    <a class="btn btn-danger" href="{{ url()->previous() }}">
        <i class="fa fa-angle-double-left"></i>
        {{ MessageService::tr('Back')}}
    </a>
    <button type="reset" class="btn btn-warning">
        <i class="fas fa-sync-alt"></i>
        {{ MessageService::tr('Clear All')}}
    </button>
    <button type="submit" class="btn btn-primary">
        {{ MessageService::tr('Add') }}
    </button>
</div>
