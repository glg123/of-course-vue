@csrf
<div class="form-content">
    <div class="row">
        @foreach(config('app.supported_locales') as $locale)
        <div class="col-lg-12 mb-3">
            <div>
                <label for="name_{{ $locale }}" class="form-label me-0">@lang("translation.contact_method_{$locale}") <span class="text-danger">*</span></label>
                <input id="name_{{ $locale }}"
                       name="name[{{ $locale }}]"
                       value="{{ old('name.' . $locale, optional($contact ?? '')->getTranslation('name', $locale) ?? '') }}"
                       class="form-control @error('name.' . $locale) is-invalid @enderror k-form-input"
                       type="text"
                       placeholder="@lang('translation.enter') @lang("translation.contact_method_{$locale}")"
                       data-validation="req"
                >
            </div>
        </div>
        @endforeach

        <div class="col-lg-12 text-start">
            <button type="submit" class="btn btn-light waves-effect waves-light form-btn px-5">@lang('translation.updating_data')</button>
        </div>
    </div>
</div>
