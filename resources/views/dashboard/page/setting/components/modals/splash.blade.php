<div class="modal fade" id="splashSettings" tabindex="-1" aria-labelledby="splashSettingsLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="splashSettingsLabel">@lang('translation.splash_settings')</h5>
                <button type="button" class="btn-close m-0" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="form-1" action="{{ route('settings.splash.update') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="modal-body">
                    <div class="form-content container">
                        <div class="row">
                            @foreach($settings as $index => $get)
                                <div class="col-lg-6 mb-3">
                                    <div>
                                        <label for="{{ $index }}" class="form-label me-0">@lang('translation.' . $index) <span class="text-danger">*</span></label>
                                        <textarea id="{{ $index }}" rows="6" name="{{ $index }}[value]" class="form-control @error($index.'.value') is-invalid @enderror k-form-input" type="text" placeholder="@lang('translation.enter') @lang('translation.' . $index)" data-validation="req">{{ old($index.'.value', $settings[$index]->first()->value ?? '') }}</textarea>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('translation.cancel')</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light form-btn">@lang('translation.updating_data')</button>
                </div>
            </form>
        </div>
    </div>
</div>
