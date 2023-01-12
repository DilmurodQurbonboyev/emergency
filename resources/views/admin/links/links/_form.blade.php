<div class="form-group">
    <label for="lists_category_id">{{ tr('Category') }}</label>
    <select class="custom-select rounded-0 select2" name="lists_category_id" id="lists_category_id">
        <option value>{{ tr('Select Category') }}</option>
        @foreach ($linkCategories as $linkCategory)
        <option value="{{ $linkCategory->id }}" {{ old('lists_category_id', $links->lists_category_id) ==
            $linkCategory->id ? 'selected' : '' }}>{{ $linkCategory->title }}</option>
        @endforeach
    </select>
</div>
@error('lists_category_id')
<div class="text-danger">{{ $message }}</div>
@enderror
<div class="card-header p-0 pt-1 border-bottom-0">
    <x-admin.language-tab />
</div>
<div class="tab-content my-tab-content">
    @foreach (Config::get('translatable.locales') as $lang)
    <div class="tab-pane fade show" id="{{ $lang }}" role="tabpanel" aria-labelledby="{{ $lang }}">
        <div class="form-group">
            <label for="title_{{ $lang }}">{{ tr('Title') }}</label>
            <input type="text" name="title_{{ $lang }}" class="form-control @error('title_'.$lang) is-invalid @enderror"
                id="title_{{ $lang }}" value="{{ old('title_'.$lang, $links->translate($lang)->title ?? '') }}">
            @error('title_'.$lang)
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <x-admin.form.description name="description_{{ $lang }}"
            value="{!! old('description_'.$lang, $links->translate($lang)->description ?? '') !!}" />
    </div>
    @endforeach
</div>
<input type="hidden" class="form-control" name="list_type_id" value="4">
<div class="form-group">
    <label for="image" class="mb-2">{{ tr('Image') }}</label>
    <div class="input-group">
        <input id="thumbnail2" class="form-control" type="text" name="image"
            value="{{ old('image', $links->image ?? '') }}">
        <span class="input-group-btn">
            <a id="lfm2" data-input="thumbnail2" data-preview="holder" class="btn btn-primary">
                <i class="fas fa-images"></i> {{tr('Choose')}}
            </a>
        </span>
    </div>
    @if($links->image)
    <img src="{{ $links->image }}" width="30%" class="p-2">
    @endif
</div>
<div class="row">
    <div class="form-group col-6">
        <label for="link" class="@error('link') text-danger @enderror">{{tr('Link')}}</label>
        <input type="text" name="link" class="form-control" id="link" value="{{ old('link', $links->link ?? '') }}">
        @error('link')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group col-6">
        <label for="link_type">{{ tr('Link Type') }}</label>
        <select name="link_type" class="custom-select rounded-0 select2" id="link_type">
            <option value="1" {{ old('status', $links->link_type) == '1' ? 'selected' : '' }}>{{ tr('Inactive') }}
            </option>
            <option value="2" {{ old('status', $links->link_type) == '2' ? 'selected' : '' }}>{{ tr('Local opens in
                this window') }}</option>
            <option value="3" {{ old('status', $links->link_type) == '3' ? 'selected' : '' }}>{{ tr('Local opens in a
                new window') }}</option>
            <option value="4" {{ old('status', $links->link_type) == '4' ? 'selected' : '' }}>{{ tr('Global opens in
                this window') }}</option>
            <option value="5" {{ old('status', $links->link_type) == '5' ? 'selected' : '' }}>{{ tr('Global opens in a
                new window') }}</option>
        </select>
    </div>
</div>
<div class="form-group">
    <label for="order">{{tr('Order')}}</label>
    <input type="number" name="order" class="form-control @error('order') is-invalid @enderror" id="order"
        value="{{ old('order', $links->order ?? '50') }}">
    @error('order')
    <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="date">{{ tr('Date') }}</label>
    <input type="text" class="form-control date" name="date" value="{{ old('date', $links->date) }}" />
    @error('date')
    <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="parent_id">{{ tr('Main') }}</label>
    <select class="custom-select rounded-0 select2" name="parent_id" id="parent_id">
        <option value="2" {{ old('status', $links->parent_id) == '2' ? 'selected' : '' }}>{{ tr('Yes') }}</option>
        <option value="1" {{ old('status', $links->parent_id) == '1' ? 'selected' : '' }}>{{ tr('No') }}</option>
    </select>
</div>
<div class="form-group">
    <label for="status">{{ tr('Status') }}</label>
    <select class="custom-select rounded-0 select2" name="status" id="status">
        <option value="2" {{ old('status', $links->status) == '2' ? 'selected' : '' }}>{{tr('Active')}}</option>
        <option value="1" {{ old('status', $links->status) == '1' ? 'selected' : '' }}>{{tr('Inactive')}}</option>
    </select>
</div>
