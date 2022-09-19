<div class="tab-content my-tab-content">
    @foreach (Config::get('translatable.locales') as $lang)
        <div class="tab-pane fade show" id="{{ $lang }}" role="tabpanel" aria-labelledby="{{ $lang }}">
            <div class="form-group">
                <label for="title_{{ $lang }}" class="@error('title_'.$lang) text-danger @enderror">{{
                            tr('Title') }}</label>
                <input type="text" name="title_{{ $lang }}"
                       class="form-control @error('title_'.$lang) is-invalid @enderror"
                       id="title_{{ $lang }}"
                       value="{{ old('title_'.$lang, $menusCategory->translate($lang)->title ?? '') }}">
                @error('title_'.$lang)
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
    @endforeach
</div>
<div class="form-group">
    <label for="status">{{ tr('Status') }}</label>
    <select class="custom-select rounded-0 select2" name="status" id="status">
        <option
            value="2" {{ old('status', $menusCategory->status) == '2' ? 'selected' : '' }}>{{tr('Active')}}</option>
        <option
            value="1" {{ old('status', $menusCategory->status) == '1' ? 'selected' : '' }}>{{tr('Inactive')}}</option>
    </select>
</div>
