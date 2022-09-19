<div class="form-group">
    <label for="parent_id">{{ MessageService::tr('Parent Category') }}</label>
    <select class="custom-select rounded-0 select2" name="parent_id" id="parent_id">
        <option value>{{ MessageService::tr('Select Parent Category') }}</option>
        @foreach ($newsCategories as $news)
            <option
                value="{{ $news->id }}" {{ old('parent_id', $newsCategory->parent_id) == $news->id ? 'selected' : '' }}>
                {{ $news->title }}
            </option>
        @endforeach
    </select>
</div>
<div class="card-header p-0 pt-1 border-bottom-0">
    <x-admin.language-tab/>
</div>
<div class="tab-content my-tab-content">
    @foreach (Config::get('translatable.locales') as $lang)
        <div class="tab-pane fade show" id="{{ $lang }}" role="tabpanel" aria-labelledby="{{ $lang }}">
            <div class="form-group">
                <label for="title_{{ $lang }}">{{ MessageService::tr('Title') }}</label>
                <input type="text" name="title_{{ $lang }}"
                       class="form-control @error('title_'.$lang) is-invalid @enderror"
                       id="title_{{ $lang }}"
                       value="{{ old('title_'.$lang, $newsCategory->translate($lang)->title ?? '') }}">
                @error('title_'.$lang)
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
    @endforeach
</div>
<div class="form-group">
    <label for="image" class="mb-2">{{ MessageService::tr('Image') }}</label>
    <div class="input-group">
        <input id="thumbnail2" class="form-control" type="text" name="image"
               value="{{ old('image', $newsCategory->image ?? '') }}">
        <span class=" input-group-btn">
            <a id="lfm2" data-input="thumbnail2" data-preview="holder" class="btn btn-primary">
                <i class="fas fa-images"></i>
                {{ MessageService::tr('Choose') }}
            </a>
        </span>
    </div>
    @if($newsCategory->image)
        <img class="p-2" src="{{ $newsCategory->image }}" width="30%" alt="">
    @endif
</div>
<div class="form-group">
    <label for="status">{{ MessageService::tr('Status') }}</label>
    <select class="custom-select rounded-0 select2" name="status" id="status">
        <option value="2" {{ old('status', $newsCategory->status) == '2' ? 'selected' : '' }}>{{MessageService::tr('Active')}}</option>
        <option value="1" {{ old('status', $newsCategory->status) == '1' ? 'selected' : '' }}>{{MessageService::tr('Inactive')}}
        </option>
    </select>
</div>
<input type="hidden" class="form-control" name="list_type_id" value="1">
