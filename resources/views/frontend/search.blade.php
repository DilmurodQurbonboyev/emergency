@forelse ($lists as $list)
    <div class="search-title">
        <div class="search-title-text">
            <div class="search-a">
                <a href="{{ route('news', $list->slug) }}">{{ $list->title ?? '' }}</a>
            </div>
            <div class="search-text">
                <span>{{ displayDateOnly($list->created_at) }}</span>
            </div>
        </div>
    </div>
@empty
    <div class="simple-list">
        <ul>
            <div class="alert alert-success col-md-12 mt-3">{{ tr('No result found') }} ...</div>
        </ul>
    </div>
@endforelse
