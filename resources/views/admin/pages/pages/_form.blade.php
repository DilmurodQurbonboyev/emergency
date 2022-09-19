<div class="form-group">
    <label for="lists_category_id">{{ tr('Category') }}</label>
    <select class="custom-select rounded-0 select2 @error('lists_category_id') is-invalid @enderror"
            name="lists_category_id" id="lists_category_id">
        <option value>{{ tr('Select Category') }}</option>
        @foreach ($pagesCategories as $pagesCategory)
            <option value="{{ $pagesCategory->id }}" {{ old('lists_category_id', $pages->lists_category_id) ==
            $pagesCategory->id ? 'selected' : '' }}>{{ $pagesCategory->title }}</option>
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
                       class="form-control @error('title_'.$lang) is-invalid @enderror"
                       id="title_{{ $lang }}" value="{{ old('title_'.$lang, $pages->translate($lang)->title ?? '') }}">
                @error('title_'.$lang)
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <x-admin.form.description name="description_{{ $lang }}"
                                      value="{!! old('description_'.$lang, $pages->translate($lang)->description ?? '') !!}"/>
            <x-admin.form.content name="content_{{ $lang }}"
                                  value="{!! old('content_'.$lang, $pages->translate($lang)->content ?? '') !!}"/>
            <div class="row">
                <div class="form-group col-6">
                    <label for="pdf_title_{{ $lang }}">{{ tr('Pdf title') }}</label>
                    <input type="text" class="form-control @error('pdf_title_'.$lang) is-invalid @enderror"
                           name="pdf_title_{{ $lang }}" id="pdf_title_{{ $lang }}"
                           value="{{ $pages->translate($lang)->pdf_title ?? '' }}">
                    @error('pdf_title_'.$lang)
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-6">
                    <label for="pdf" class="mb-2">{{ tr('Pdf') }}</label>
                    <div class="input-group">
                        <input id="thumbnail_{{ $lang }}" class="form-control" type="text" name="pdf_{{ $lang }}"
                               value="{{ old('pdf_', $pages->translate($lang)->pdf ?? '') }}"/>
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
            <div class="row">
                <div class="form-group col-6">
                    <label for="pdf_title_2_{{ $lang }}">{{ tr('Pdf title 2') }}</label>
                    <input type="text" class="form-control @error('pdf_title_2_'.$lang) is-invalid @enderror"
                           name="pdf_title_2_{{ $lang }}" id="pdf_title_2_{{ $lang }}"
                           value="{{ $pages->translate($lang)->pdf_title_2 ?? '' }}">
                    @error('pdf_title_2_'.$lang)
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-6">
                    <label for="pdf_2_{{$lang}}" class="mb-2">{{ tr('Pdf 2') }}</label>
                    <div class="input-group">
                        <input id="thumbnail_pdf2_{{ $lang }}" class="form-control" type="text" name="pdf_2_{{ $lang }}"
                               value="{{ old('pdf_2', $pages->translate($lang)->pdf_2 ?? '') }}"/>
                        <span class="input-group-btn">
                    <a id="lfm_pdf2_{{ $lang }}" data-input="thumbnail_pdf2_{{ $lang }}" data-preview="holder"
                       class="btn btn-primary">
                        {{ tr('Choose') }}
                    </a>
                </span>
                    </div>
                    @error('pdf_2_'.$lang)
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
    @endforeach
</div>
<div class="form-group">
    <label for="pdf_type">{{ tr('Pdf Type') }}</label>
    <select class="custom-select rounded-0 select2" name="pdf_type" id="pdf_type">
        <option value="2" {{ old('pdf_type', $pages->pdf_type == "2" ? 'selected' : '') }}>{{ tr('Download') }}</option>
        <option value="1" {{ old('pdf_type', $pages->pdf_type == "1" ? 'selected' : '') }}>{{ tr('Show') }}</option>
    </select>
</div>
<div class="row">
    <div class="form-group col-6">
        <label for="video_code">{{ tr('Video Code') }}</label>
        <input type="text" name="video_code" class="form-control" id="video_code"
               value="{{ $pages->video_code }}">
    </div>
    <div class="form-group col-6">
        <label for="video" class="mb-2">{{ tr('Video') }}</label>
        <div class="input-group">
            <input id="thumbnail" class="form-control" type="text" name="video"
                   value="{{ $pages->video }}">
            <span class="input-group-btn">
                <a id="lfm4" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                    <i class="fas fa-file-video"></i>
                    {{ tr('Choose') }}
                </a>
            </span>
        </div>
        @if($pages->video)
            <img class="p-2" src="{{ $pages->video }}" alt="" width="30%">
        @endif
    </div>
</div>
<div class="form-group">
    <label for="image" class="mb-2">{{ tr('Video Image') }}</label>
    <div class="input-group">
        <input id="thumbnail2" class="form-control" type="text" name="image" value="{{ $pages->image }}">
        <span class="input-group-btn">
            <a id="lfm5" data-input="thumbnail2" data-preview="holder"
               class="btn btn-primary">
                 <i class="fas fa-photo-video"></i>
                {{ tr('Choose') }}
            </a>
        </span>
    </div>
    @if($pages->image)
        <img class="p-2" src="{{ $pages->image }}" alt="" width="30%">
    @endif
</div>
<div class="form-group">
    <label for="media_type">{{ tr('Video Type') }}</label>
    <select class="custom-select select2" name="media_type" id="media_type">
        <option value="1" {{ old('media_type', $pages->media_type) == '1' ? 'selected' : '' }}>
            {{ tr('Inactive') }}
        </option>
        <option value="2" {{ old('media_type', $pages->media_type) == '2' ? 'selected' : '' }}>
            {{ tr('Image') }}
        </option>
        <option value="3" {{ old('media_type', $pages->media_type) == '3' ? 'selected' : '' }}>
            {{ tr('Video from this site') }}
        </option>
        <option value="4" {{ old('media_type', $pages->media_type) == '4' ? 'selected' : '' }}>
            {{ tr('Video from utube.uz') }}
        </option>
        <option value="5" {{ old('media_type', $pages->media_type) == '5' ? 'selected' : '' }}>
            {{ tr('Video from youtube.com') }}</option>
    </select>
</div>
<div class="form-group">
    <label for="anons_image" clasfs="mb-2">{{ tr('Anons Image') }}</label>
    <div class="input-group">
        <input value="{{ old('anons_image', $pages->anons_image) }}" id="thumbnail_anons_image" class="form-control" type="text"
               name="anons_image">
        <span class="input-group-btn">
            <a id="lfm2" data-input="thumbnail_anons_image" data-preview="holder" class="btn btn-primary">
                <i class="fas fa-images"></i>
                {{ tr('Choose') }}
            </a>
        </span>
    </div>
    @if($pages->anons_image)
        <img class="p-2" src="{{ $pages->anons_image }}" alt="" width="30%">
    @endif
</div>
<div class="form-group">
    <label for="body_image" class="mb-2">{{ tr('Body Image') }}</label>
    <div class="input-group">
        <input id="thumbnail3" class="form-control" type="text" value="{!! old('body_image', $pages->body_image) !!}"
               name="body_image">
        <span class="input-group-btn">
            <a id="lfm3" data-input="thumbnail3" data-preview="holder" class="btn btn-primary">
                <i class="fas fa-images"></i>
                {{ tr('Choose') }}
            </a>
        </span>
    </div>
    @php
        $res = explode(',', $pages->body_image);
    @endphp
    @foreach ($res as $i)
        @if ($i)
            <img class="p-2" width="30%" src="{{ $i }}" alt="">
        @endif
    @endforeach
</div>
<div class="form-group">
    <label for="order">{{ tr('Order') }}</label>
    <input type="number" name="order" class="form-control" id="order" value="{{ old('order', $pages->order ?? '50') }}">
</div>
<div class="form-group">
    <label for="date">{{ tr('Date') }}</label>
    <input type="text" class="form-control date" name="date" value="{{ old('date', $pages->date) }}"/>
</div>
<div class="form-group">
    <label for="parent_id">{{ tr('Main') }}</label>
    <select class="custom-select rounded-0 select2" name="parent_id" id="parent_id">
        <option value="2" {{ old('parent_id', $pages->parent_id == "2" ? 'selected' : '') }}>{{ tr('Yes') }}</option>
        <option value="1" {{ old('parent_id', $pages->parent_id == "1" ? 'selected' : '') }}>{{ tr('No') }}</option>
    </select>
</div>
<div class="form-group">
    <label for="right_menu">{{ tr('Right Menu') }}</label>
    <select class="custom-select rounded-0 select2" name="right_menu" id="right_menu">
        <option value="2" {{ old('right_menu', $pages->right_menu) == '2' ? 'selected' : '' }}>{{ tr('Yes') }}</option>
        <option value="1" {{ old('right_menu', $pages->right_menu) == '1' ? 'selected' : '' }}>{{ tr('No') }}</option>
    </select>
</div>
<div class="form-group">
    <label for="status">{{ tr('Status') }}</label>
    <select class="custom-select rounded-0 select2" name="status" id="status">
        <option value="2" {{ old('status', $pages->status) == '2' ? 'selected' : '' }}>{{ tr('Active') }}</option>
        <option value="1" {{ old('status', $pages->status) == '1' ? 'selected' : '' }}>{{ tr('Inactive') }}</option>
    </select>
</div>
<input type="hidden" class="form-control" name="list_type_id" value="5">
