<div class="card-header p-0 pt-1 border-bottom-0">
    <x-admin.language-tab/>
</div>
<div class="tab-content my-tab-content">
    @foreach (Config::get('translatable.locales') as $lang)
        <div class="tab-pane fade show" id="{{ $lang }}" role="tabpanel" aria-labelledby="{{ $lang }}">
            <div class="form-group">
                <label for="title_{{ $lang }}">{{ MessageService::tr('Title')}}</label>
                <input type="text" name="title_{{ $lang }}"
                       class="form-control @error('title_'.$lang) is-invalid @enderror"
                       id="title_{{ $lang }}" value="{{ old('title_'.$lang, $stat->translate($lang)->title ?? '') }}">
                @error('title_'.$lang)
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
    @endforeach
</div>
<div class="form-group">
    <label for="year">{{ MessageService::tr('Year')}}</label>
    <input type="text" name="year" class="form-control @error('year') is-invalid @enderror" id="year"
           value="{{ old('year', $stat->year ?? '') }}">
    @error('year')
    <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="count">{{ MessageService::tr('Count')}}</label>
    <input type="text" name="count" class="form-control @error('count') is-invalid @enderror" id="count"
           value="{{ old('count', $stat->count ?? '') }}">
    @error('count')
    <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="image" class="mb-2">{{ MessageService::tr('Image') }}</label>
    <div class="input-group">
        <input id="thumbnail2" class="form-control" type="text" name="image"
               value="{{ old('image', $stat->image ?? '') }}">
        <span class=" input-group-btn">
            <a id="lfm2" data-input="thumbnail2" data-preview="holder" class="btn btn-primary">
                <i class="fas fa-images"></i>
                {{ MessageService::tr('Choose') }}
            </a>
        </span>
    </div>
    @if($stat->image)
        <img class="p-2" src="{{ $stat->image }}" width="150px" alt="">
    @endif
</div>
