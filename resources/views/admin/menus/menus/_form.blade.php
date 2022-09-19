<div class="tab-content my-tab-content">
    @foreach (Config::get('translatable.locales') as $lang)
        <div class="tab-pane fade show" id="{{ $lang }}" role="tabpanel" aria-labelledby="{{ $lang }}">
            <div class="form-group">
                <label for="title_{{ $lang }}">{{ MessageService::tr('Title')}}</label>
                <input type="text" name="title_{{ $lang }}"
                       class="form-control @error('title_'.$lang) is-invalid @enderror"
                       id="title_{{ $lang }}" value="{{ old('title_'.$lang, $menu->translate($lang)->title ?? '') }}">
                @error('title_'.$lang)
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
    @endforeach
</div>
<div class="form-group">
    <label for="link">{{ MessageService::tr('Link')}}</label>
    <input type="text" name="link" class="form-control @error('link') is-invalid @enderror" id="link"
           value="{{ old('link', $menu->link ?? '') }}">
    @error('link')
    <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="link_type">{{ MessageService::tr('Link Type') }}</label>
    <select name="link_type" class="custom-select rounded-0 select2" id="link_type">
        <option value="1" {{ old('link_type', $menu->link_type) == "1" ? 'selected' : '' }}>
            {{ MessageService::tr('Inactive') }}
        </option>
        <option value="2" {{ old('link_type', $menu->link_type) == "2" ? 'selected' : '' }}>
            {{ MessageService::tr('Local opens in this window') }}
        </option>
        <option value="3" {{ old('link_type', $menu->link_type) == "3" ? 'selected' : '' }}>
            {{ MessageService::tr('Local opens in a new window') }}
        </option>
        <option value="4" {{ old('link_type', $menu->link_type) == "4" ? 'selected' : '' }}>
            {{ MessageService::tr('Global opens in this window') }}
        </option>
        <option value="5" {{ old('link_type', $menu->link_type) == "5" ? 'selected' : '' }}>
            {{ MessageService::tr('Global opens in a new window') }}
        </option>
    </select>
</div>
<div class="form-group">
    <label for="image" class="mb-2">{{ MessageService::tr('Image') }}</label>
    <div class="input-group">
        <input id="thumbnail2" class="form-control" type="text" name="image"
               value="{{ old('image', $menu->image ?? '') }}">
        <span class="input-group-btn">
            <a id="lfm2" data-input="thumbnail2" data-preview="holder" class="btn btn-primary">
                <i class="fas fa-images"></i> {{ MessageService::tr('Choose')}}
            </a>
        </span>
    </div>
    @if($menu->image)
        <img src="{{ $menu->image }}" width="30%" class="p-2" alt="{{ $menu->title ?? '' }}">
    @endif
</div>
<div class="form-group">
    <label for="parent_id">{{ MessageService::tr('Main') }}</label>
    <select name="parent_id" class="custom-select rounded-0 select2" id="parent_id">
        <option value>{{ MessageService::tr('Select Parent Menu') }}</option>
        @foreach ($parents as $parent)
            <option value="{{ $parent->id }}" {{ old('parent_id', $menu->parent_id) == $parent->id ? 'selected' : '' }}>
                {{ $parent->title ?? '' }}
            </option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="menus_category_id">{{ MessageService::tr('Category') }}</label>
    <select class="custom-select rounded-0 select2" name="menus_category_id" id="menus_category_id">
        @foreach ($menusCategories as $menusCategory)
            <option value="{{ $menusCategory->id }}" {{ old('menus_category_id', $menu->menus_category_id) ==
            $menusCategory->id ? 'selected' : '' }}>
                {{ $menusCategory->title }}
            </option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="status">{{ MessageService::tr('Status') }}</label>
    <select class="custom-select rounded-0 select2" name="status" id="status">
        <option value="2" {{ old('status', $menu->status) == '2' ? 'selected' : '' }}>{{tr('Active')}}</option>
        <option value="1" {{ old('status', $menu->status) == '1' ? 'selected' : '' }}>{{tr('Inactive')}}</option>
    </select>
</div>
<div class="form-group">
    <label for="order">{{ MessageService::tr('Order')}}</label>
    <input type="number" name="order" class="form-control @error('order') is-invalid @enderror" id="order"
           value="{{ old('order', $menu->order ?? '50') }}">
    @error('order')
    <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
