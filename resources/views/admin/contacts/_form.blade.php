<div class="tab-content my-tab-content">
    @foreach (Config::get('translatable.locales') as $lang)
        <div class="tab-pane fade show" id="{{ $lang }}" role="tabpanel" aria-labelledby="{{ $lang }}">
            <div class="form-group">
                <label for="title_{{ $lang }}" class="@error('address_'.$lang) text-danger @enderror">
                    {{ tr('Address') }}
                </label>
                <input type="text" name="address_{{ $lang }}"
                       class="form-control @error('address_'.$lang) is-invalid @enderror"
                       id="address_{{ $lang }}"
                       value="{{ old('address_'.$lang, $contacts->translate($lang)->address ?? '') }}">
                @error('address_'.$lang)
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="reception_{{ $lang }}" class="@error('reception_'.$lang) text-danger @enderror">
                    {{ tr('Reception') }}
                </label>
                <input type="text" name="reception_{{ $lang }}"
                       class="form-control @error('reception_'.$lang) is-invalid @enderror"
                       id="reception_{{ $lang }}"
                       value="{{ old('reception_'.$lang, $contacts->translate($lang)->reception ?? '') }}">
                @error('reception_'.$lang)
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="working_time_{{ $lang }}" class="@error('working_time_'.$lang) text-danger @enderror">
                    {{ tr('Working Time') }}
                </label>
                <input type="text" name="working_time_{{ $lang }}"
                       class="form-control @error('working_time_'.$lang) is-invalid @enderror"
                       id="working_time_{{ $lang }}"
                       value="{{ old('working_time_'.$lang, $contacts->translate($lang)->working_time ?? '') }}">
                @error('working_time_'.$lang)
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
    @endforeach
</div>
<div class="form-group">
    <label for="phone">{{ tr('Phone') }}</label>
    <textarea id="phone" name="phone" class="form-control">{{ old('phone', $contacts->phone ?? '') }}</textarea>
</div>
<div class="form-group">
    <label for="email">{{ tr('Email') }}</label>
    <textarea name="email" id="" class="form-control">{{ old('phone', $contacts->email ?? '') }}</textarea>
</div>
