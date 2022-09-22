<?php
$name = 'name_' . app()->getLocale();
?>

<div class="form-group">
    <label for="m_category_id" class="@error('m_category_id') text-danger @enderror">
        {{ tr('Category') }}
    </label>
    <select class="form-control select2 @error('m_category_id') is-invalid @enderror" name="m_category_id"
            id="m_category_id">
        <option value>{{ tr('Select Category') }}</option>

        @foreach ($managementCategories as $managementCategory)
            <option value="{{ $managementCategory->id }}"
                {{ old('m_category_id', $management->m_category_id) == $managementCategory->id ? 'selected' : '' }}>
                {{ $managementCategory->title }}</option>
        @endforeach
    </select>
    @error('m_category_id')
    <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="region_id" class="@error('region_id') text-danger @enderror">{{ tr('Regions') }}</label>
    <select name="region_id" id="region_id" class="form-control select2 @error('region_id') is-invalid @enderror">
        <option value>{{ tr('Select') }}</option>
        @foreach($regions as $region)
            <option value="{{ $region->id }}"  {{ old('region_id', $management->region_id) == $region->id ? 'selected' : '' }}>{{ $region->$name }}</option>
        @endforeach
    </select>
</div>
@error('region_id')
<div class="text-danger">{{ $message }}</div>
@enderror
<div class="card-header p-0 pt-1 border-bottom-0">
    <x-admin.language-tab/>
</div>
<div class="tab-content my-tab-content">
    @foreach (Config::get('translatable.locales') as $lang)
        <div class="tab-pane fade show" id="{{ $lang }}" role="tabpanel" aria-labelledby="{{ $lang }}">
            <div class="form-group">
                <label for="title_{{ $lang }}"
                       class="@error('title_' . $lang) text-danger @enderror">{{ tr('Title') }}</label>
                <input type="text" name="title_{{ $lang }}"
                       class="form-control @error('title_' . $lang) is-invalid @enderror" id="title_{{ $lang }}"
                       value="{{ old('title_' . $lang, $management->translate($lang)->title ?? '') }}">
                @error('title_' . $lang)
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="leader_{{ $lang }}" class="@error('leader_' . $lang) text-danger @enderror">
                    {{ tr('Leader') }}
                </label>
                <input type="text" class="form-control @error('leader_' . $lang)  @enderror"
                       name="leader_{{ $lang }}" id="leader_{{ $lang }}"
                       value="{{ old('leader_' . $lang, $management->translate($lang)->leader ?? '') }}">
                @error('leader_' . $lang)
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="reception_{{ $lang }}">{{ tr('Reception') }}</label>
                <textarea class="form-control" name="reception_{{ $lang }}" id="reception_{{ $lang }}" cols="30"
                          rows="2">{{ old('reception_' . $lang, $management->translate($lang)->reception ?? '') }}</textarea>
            </div>
            <div class="form-group">
                <label for="address_{{ $lang }}">{{ tr('Address') }}</label>
                <textarea class="form-control" name="address_{{ $lang }}" id="address_{{ $lang }}" cols="30"
                          rows="2">{{ old('address_' . $lang, $management->translate($lang)->address ?? '') }}</textarea>
            </div>
            <div class="form-group">
                <label for="biography_{{ $lang }}">{{ tr('Biography') }}</label>
                <textarea class="form-control" name="biography_{{ $lang }}" id="biography_{{ $lang }}" cols="30"
                          rows="4">{{ old('biography_' . $lang, $management->translate($lang)->biography ?? '') }}</textarea>
            </div>
            <div class="form-group">
                <label for="description_{{ $lang }}">{{ tr('Functions') }}</label>
                <textarea class="form-control" name="description_{{ $lang }}" id="description_{{ $lang }}"
                          cols="30"
                          rows="4">{{ old('description_' . $lang, $management->translate($lang)->description ?? '') }}</textarea>
            </div>
        </div>
    @endforeach
</div>
<div class="form-group">
    <label for="image" class="mb-2">{{ tr('Organization Image') }}</label>
    <div class="input-group">
        <input id="thumbnail2" class="form-control" type="text" name="image"
               value="{{ old('image', $management->image ?? '') }}">
        <span class="input-group-btn">
            <a id="lfm2" data-input="thumbnail2" data-preview="holder" class="btn btn-primary">
                <i class="fas fa-images"></i>
                {{ tr('Choose') }}
            </a>
        </span>
    </div>
    @if ($management->image)
        <img class="p-2" src="{{ $management->image }}" width="30%" alt="">
    @endif
</div>
<div class="form-group">
    <label for="anons_image" class="mb-2">{{ tr('Leader Image') }}</label>
    <div class="input-group">
        <input id="thumbnail3" class="form-control" type="text" name="anons_image"
               value="{{ old('image', $management->anons_image ?? '') }}">
        <span class="input-group-btn">
            <a id="lfm3" data-input="thumbnail3" data-preview="holder" class="btn btn-primary">
                <i class="fas fa-images"></i>
                {{ tr('Choose') }}
            </a>
        </span>
    </div>
    @if ($management->anons_image)
        <img class="p-2" src="{{ $management->anons_image }}" width="30%" alt="">
    @endif
</div>
<div class="form-group">
    <label for="phone">{{ tr('Phone') }}</label>
    <input type="text" class="form-control" name="phone" id="phone"
           value="{{ old('phone', $management->phone ?? '') }}">
</div>
<div class="form-group">
    <label for="email">{{ tr('Email') }}</label>
    <input type="email" class="form-control" name="email" id="email"
           value="{{ old('email', $management->email ?? '') }}">
</div>
<div class="form-group">
    <label for="fax">{{ tr('Fax') }}</label>
    <input type="text" class="form-control" name="fax" id="fax"
           value="{{ old('fax', $management->fax ?? '') }}">
</div>
<div class="form-group">
    <label for="order">{{ tr('Order') }}</label>
    <input type="number" name="order" class="form-control" id="order"
           value="{{ old('order', $management->order ?? '50') }}">
</div>
<div class="form-group">
    <label for="status">{{ tr('Status') }}</label>
    <select class="form-control select2" name="status" id="status">
        <option value="2" {{ old('status', $management->status) == '2' ? 'selected' : '' }}>
            {{ tr('Active') }}</option>
        <option value="1" {{ old('status', $management->status) == '1' ? 'selected' : '' }}>
            {{ tr('Inactive') }}</option>
    </select>
</div>
<input type="hidden" class="form-control" name="list_type_id" value="10">
