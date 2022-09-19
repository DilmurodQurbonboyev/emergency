<div class="form-group">
    <label for="parent_id">{{ tr('Parent Category') }}</label>
    <select class="custom-select rounded-0 select2" name="parent_id" id="parent_id">
        <option value>{{ tr('Select Parent Category') }}</option>
        @foreach ($usefulCategories as $useful)
        <option value="{{ $useful->id }}" {{ old('parent_id', $usefulCategory->parent_id) == $useful->id ? 'selected' : ''
            }}>
            {{ $useful->title }}
        </option>
        @endforeach
    </select>
</div>
<div class="card-header p-0 pt-1 border-bottom-0">
    <x-admin.language-tab />
</div>
<div class="tab-content my-tab-content">
    @foreach (Config::get('translatable.locales') as $lang)
    <div class="tab-pane fade show" id="{{ $lang }}" role="tabpanel" aria-labelledby="{{ $lang }}">
        <div class="form-group">
            <label for="title_{{ $lang }}">{{ tr('Title') }}</label>
            <input type="text" name="title_{{ $lang }}" class="form-control @error('title_'.$lang) is-invalid @enderror"
                id="title_{{ $lang }}"
                value="{{ old('title_'.$lang, $usefulCategory->translate($lang)->title ?? '') }}">
            @error('title_'.$lang)
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    @endforeach
</div>
<div class="form-group">
    <label for="image" class="mb-2">{{ tr('Image') }}</label>
    <div class="input-group">
        <input id="thumbnail2" class="form-control" type="text" name="image"
            value="{{ old('image', $usefulCategory->image ?? '') }}">
        <span class=" input-group-btn">
            <a id="lfm2" data-input="thumbnail2" data-preview="holder" class="btn btn-primary">
                <i class="fas fa-images"></i>
                {{ tr('Choose') }}
            </a>
        </span>
    </div>
    @if($usefulCategory->image)
    <img class="p-2" src="{{ $usefulCategory->image }}" width="30%" alt="">
    @endif
</div>
<div class="form-group">
    <label for="status">{{ tr('Status') }}</label>
    <select class="custom-select rounded-0 select2" name="status" id="status">
        <option value="2" {{ old('status', $usefulCategory->status) == '2' ? 'selected' : '' }}>{{tr('Active')}}
        </option>
        <option value="1" {{ old('status', $usefulCategory->status) == '1' ? 'selected' : '' }}>{{tr('Inactive')}}
        </option>
    </select>
</div>
<input type="hidden" class="form-control" name="list_type_id" value="6">
