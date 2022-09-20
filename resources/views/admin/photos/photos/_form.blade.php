<div class="form-group">
    <label for="lists_category_id">{{ tr('Category') }}</label>
    <select class="form-control select2 @error('lists_category_id') is-invalid @enderror" name="lists_category_id"
            id="lists_category_id">
        <option value>{{ tr('Select Category') }}</option>
        @foreach ($photosCategories as $photosCategory)
            <option value="{{ $photosCategory->id }}"
                {{ old('lists_category_id', $photos->lists_category_id) == $photosCategory->id ? 'selected' : '' }}>
                {{ $photosCategory->title }}</option>
        @endforeach
    </select>
    @error('lists_category_id')
    <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
<div class="card-header p-0 pt-1 border-bottom-0">
    <x-admin.language-tab/>
</div>
<div class="tab-content my-tab-content">
    @foreach (Config::get('translatable.locales') as $lang)
        <div class="tab-pane fade show" id="{{ $lang }}" role="tabpanel" aria-labelledby="{{ $lang }}">
            <div class="form-group">
                <label for="title_{{ $lang }}">{{ tr('Title') }}</label>
                <input type="text" name="title_{{ $lang }}"
                       class="form-control @error('title_' . $lang) is-invalid @enderror" id="title_{{ $lang }}"
                       value="{{ old('title_' . $lang, $photos->translate($lang)->title ?? '') }}">
                @error('title_' . $lang)
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
    @endforeach
</div>
<div class="form-group">
    <label for="anons_image" class="mb-2">{{ tr('Anons Image') }}</label>
    <div class="input-group">
        <input id="thumbnail2" class="form-control" type="text" name="anons_image"
               value="{{ old('anons_image', $photos->anons_image) }}">
        <span class="input-group-btn">
            <a id="lfm2" data-input="thumbnail2" data-preview="holder" class="btn btn-primary">
                <i class="fas fa-images"></i>
                {{ tr('Choose') }}
            </a>
        </span>
    </div>
</div>
<div class="p-2">
    <img src="{{ $photos->anons_image }}" alt="" width="30%">
</div>
<input type="hidden" class="form-control" name="list_type_id" value="7">
<div class="form-group">
    <label for="body_image" class="mb-2">{{ tr('Body Image') }}</label>
    <div class="input-group">
        <input id="thumbnail3" class="form-control" type="text" name="body_image"
               value="{{ old('anons_image', $photos->body_image) }}">
        <span class="input-group-btn">
            <a id="lfm3" data-input="thumbnail3" data-preview="holder" class="btn btn-primary">
                <i class="fas fa-images"></i>
                {{ tr('Choose') }}
            </a>
        </span>
    </div>
</div>
<div class="p-2">
        <?php
        if (!empty($photos->body_image) && is_array(explode(',', $photos->body_image))) {
            $bodyImages = explode(',', $photos->body_image);
        }
        ?>

    @foreach ($bodyImages as $i)
        @if ($i)
            <img src="{{ $i }}" alt="{{ $media->title ?? '' }}" width="30%">
        @endif
    @endforeach

</div>
<div class="form-group">
    <label for="date">{{ tr('Date') }}</label>
    <input type="text" class="form-control date" name="date" value="{{ old('date', $photos->date) }}"/>
</div>
<div class="form-group">
    <label for="parent_id">{{ tr('Main') }}</label>
    <select class="form-control select2" name="parent_id" id="parent_id">
        <option value="2" {{ old('parent_id', $photos->parent_id) == '2' ? 'selected' : '' }}>
            {{ tr('Yes') }}</option>
        <option value="1" {{ old('parent_id', $photos->parent_id) == '1' ? 'selected' : '' }}>
            {{ tr('No') }}</option>
    </select>
</div>
<div class="form-group">
    <label for="order">{{ tr('Order') }}</label>
    <input type="number" name="order" class="form-control" id="order"
           value="{{ old('order', $photos->order ?? 50) }}">
</div>
<div class="form-group">
    <label for="status">{{ tr('Status') }}</label>
    <select class="custom-select rounded-0 select2" name="status" id="status">
        <option value="2" {{ old('status', $photos->status) == '2' ? 'selected' : '' }}>{{ tr('Active') }}
        </option>
        <option value="1" {{ old('status', $photos->status) == '1' ? 'selected' : '' }}>{{ tr('Inactive') }}
        </option>
    </select>
</div>
