@csrf
<div class="form-content">
    <div class="row">
        @foreach(config('app.supported_locales') as $locale)
            <div class="col-lg-6 mb-3">
                <div>
                    <label for="name_{{ $locale }}" class="form-label me-0">@lang("translation.feature_name_{$locale}") <span class="text-danger">*</span></label>
                    <input id="name_{{ $locale }}"
                           name="name[{{ $locale }}]"
                           value="{{ old('name.' . $locale, optional($feature ?? '')->getTranslation('name', $locale) ?? '') }}"
                           class="form-control @error('name.' . $locale) is-invalid @enderror k-form-input"
                           type="text"
                           placeholder="@lang('translation.enter') @lang("translation.feature_name_{$locale}")"
                           data-validation="req"
                    >
                </div>
            </div>
        @endforeach

        @foreach(config('app.supported_locales') as $locale)
            <div class="col-lg-6 mb-3">
                <div>
                    <label for="description_{{ $locale }}" class="form-label me-0">@lang("translation.feature_description_{$locale}") <span class="text-danger">*</span></label>
                    <textarea
                        rows="5"
                        id="description_{{ $locale }}"
                        name="description[{{ $locale }}]"
                        class="form-control @error('description.' . $locale) is-invalid @enderror k-form-input"
                        placeholder="@lang('translation.enter') @lang("translation.feature_description_{$locale}")"
                        data-validation="req"
                    >{{ old('description.' . $locale, optional($feature ?? '')->getTranslation('description', $locale) ?? '') }}</textarea>
                </div>
            </div>
        @endforeach

        <div class="col-lg-12 mb-3">
            <div>
                <label class="form-label">
                    @lang('translation.image')
                    @if(!isset($feature)) <span class="text-danger">*</span> @endif
                </label>

                @isset($feature)
                    <p><img width="100" src="{{ $feature->image_path }}"></p>
                @endisset

                <div class="position-relative">
                    <div class="uploadFileLayout p-2 @error('image') is-invalid @enderror">
                        <button class="btn btn-sm btn-secondary">@lang('crud.choose') @lang('translation.file')</button>
                        <h6 class="m-0 mx-3">@lang('translation.no_image_selected')</h6>
                    </div>

                    <input
                        name="image"
                        class="form-control k-form-input is-invalid @error('image') is-invalid @enderror"
                        type="file"
                        data-validation="req">
                </div>
            </div>
        </div>

    </div>
</div>

<div class="form-content mt-4">
    <div class="row">
        <div class="col-lg-12 text-end">
            <button type="submit" class="btn btn-light waves-effect waves-light form-btn px-5">@lang('translation.updating_data')</button>
        </div>
    </div>
</div>
