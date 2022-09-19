<div class="form-group">
    <label for="lists_category_id">{{ tr('Category') }}</label>
    <select class="custom-select rounded-0 select2" name="lists_category_id" id="lists_category_id">
        <option value>{{ tr('Select Category') }}</option>
        @foreach ($newsCategories as $newsCategory)
            <option value="{{ $newsCategory->id }}" {{ old('lists_category_id', $news->lists_category_id) ==
            $newsCategory->id ? 'selected' : '' }}>{{ $newsCategory->title }}</option>
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
                <label for="title_{{ $lang }}">{{ tr('Title') }}</label>
                <input type="text" name="title_{{ $lang }}"
                       class="form-control @error('title_'.$lang) is-invalid @enderror"
                       id="title_{{ $lang }}" value="{{ old('title_'.$lang, $news->translate($lang)->title ?? '') }}">
                @error('title_'.$lang)
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <x-admin.form.description name="description_{{ $lang }}"
                                      value="{!! old('description_'.$lang, $news->translate($lang)->description ?? '') !!}"/>
            <x-admin.form.content name="content_{{ $lang }}"
                                  value="{!! old('content_'.$lang, $news->translate($lang)->content ?? '') !!}"/>
            <div class="form-group">
                <label for="pdf_title_{{ $lang }}">{{ tr('Pdf title') }}</label>
                <input type="text" class="form-control @error('pdf_title_'.$lang) is-invalid @enderror"
                       name="pdf_title_{{ $lang }}" id="pdf_title_{{ $lang }}"
                       value="{{ $news->translate($lang)->pdf_title ?? '' }}">
                @error('pdf_title_'.$lang)
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="pdf" class="mb-2">{{ tr('Pdf') }}</label>
                <div class="input-group">
                    <input id="thumbnail_{{ $lang }}" class="form-control" type="text" name="pdf_{{ $lang }}"
                           value="{{ old('pdf_', $news->translate($lang)->pdf ?? '') }}"/>
                    <span class="input-group-btn">
                    <a id="lfm_{{ $lang }}" data-input="thumbnail_{{ $lang }}" data-preview="holder"
                       class="btn btn-primary">
                        {{ tr('Choose') }}
                    </a>
                </span>
                </div>
                @error('pdf_'.$lang)
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
    @endforeach
</div>
<div class="form-group">
    <label for="pdf_type">{{ tr('Pdf Type') }}</label>
    <select class="custom-select rounded-0 select2" name="pdf_type" id="pdf_type">
        <option value="2" {{ old('pdf_type', $news->pdf_type == "2" ? 'selected' : '') }}>{{ tr('Download') }}</option>
        <option value="1" {{ old('pdf_type', $news->pdf_type == "1" ? 'selected' : '') }}>{{ tr('Show') }}</option>
    </select>
</div>
<div class="form-group">
    <label for="anons_image" class="mb-2">{{ tr('Anons Image') }}</label>
    <div class="input-group">
        <input value="{{ old('anons_image', $news->anons_image) }}" id="thumbnail2" class="form-control" type="text"
               name="anons_image">
        <span class="input-group-btn">
            <a id="lfm2" data-input="thumbnail2" data-preview="holder" class="btn btn-primary">
                <i class="fas fa-images"></i>
                {{ tr('Choose') }}
            </a>
        </span>
    </div>
    @if($news->anons_image)
        <img class="p-2" src="{{ $news->anons_image }}" alt="" width="30%">
    @endif
</div>
<div class="form-group">
    <label for="body_image" class="mb-2">{{ tr('Body Image') }}</label>
    <div class="input-group">
        <input id="thumbnail3" class="form-control" type="text" value="{!! old('body_image', $news->body_image) !!}"
               name="body_image">
        <span class="input-group-btn">
            <a id="lfm3" data-input="thumbnail3" data-preview="holder" class="btn btn-primary">
                <i class="fas fa-images"></i>
                {{ tr('Choose') }}
            </a>
        </span>
    </div>
    @php
        $res = explode(',', $news->body_image);
    @endphp
    @foreach ($res as $i)
        @if ($i)
            <img class="p-2" width="30%" src="{{ $i }}" alt="">
        @endif
    @endforeach
</div>
<div class="form-group">
    <label for="order">{{ tr('Order') }}</label>
    <input type="number" name="order" class="form-control" id="order" value="{{ old('order', $news->order ?? '50') }}">
</div>
<div class="form-group">
    <label for="date">{{ tr('Date') }}</label>
    <input type="text" class="form-control date" name="date" value="{{ old('date', $news->date) }}"/>
</div>
<div class="form-group">
    <label for="parent_id">{{ tr('Main') }}</label>
    <select class="custom-select rounded-0 select2" name="parent_id" id="parent_id">
        <option value="2" {{ old('parent_id', $news->parent_id == "2" ? 'selected' : '') }}>{{ tr('Yes') }}</option>
        <option value="1" {{ old('parent_id', $news->parent_id == "1" ? 'selected' : '') }}>{{ tr('No') }}</option>
    </select>
</div>
<div class="form-group">
    <label for="right_menu">{{ tr('Right Menu') }}</label>
    <select class="custom-select rounded-0 select2" name="right_menu" id="right_menu">
        <option value="2" {{ old('right_menu', $news->right_menu) == '2' ? 'selected' : '' }}>{{ tr('Yes') }}</option>
        <option value="1" {{ old('right_menu', $news->right_menu) == '1' ? 'selected' : '' }}>{{ tr('No') }}</option>
    </select>
</div>
<div class="form-group">
    <label for="status">{{ tr('Status') }}</label>
    <select class="custom-select rounded-0 select2" name="status" id="status">
        <option value="2" {{ old('status', $news->status) == '2' ? 'selected' : '' }}>{{ tr('Active') }}</option>
        <option value="1" {{ old('status', $news->status) == '1' ? 'selected' : '' }}>{{ tr('Inactive') }}</option>
    </select>
</div>
<input type="hidden" class="form-control" name="list_type_id" value="1">
