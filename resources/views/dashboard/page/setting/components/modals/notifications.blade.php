<div class="modal fade" id="notificationsSettings" tabindex="-1" aria-labelledby="notificationsSettingsLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="notificationsSettingsLabel">@lang('translation.notifications_settings')</h5>
                <button type="button" class="btn-close m-0" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="form-1" action="{{ route('settings.notifications.update') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="modal-body">
                    <div class="form-content container">
                        <div class="row">
                            @foreach($settings as $index => $get)
                                @if($index == 'enable_sms')
                                    @break
                                @endif
                                <div class="col-lg-6 mb-3">
                                    <div>
                                        <label for="{{ $index }}" class="form-label me-0">@lang('translation.' . $index) <span class="text-danger">*</span></label>
                                        <input id="{{ $index }}" name="{{ $index }}[value]" value="{{ old($index.'.value', $settings[$index]->first()->value ?? '') }}" class="form-control @error($index.'.value') is-invalid @enderror k-form-input" type="text" placeholder="@lang('translation.enter') @lang('translation.' . $index)" data-validation="req">
                                    </div>
                                </div>
                            @endforeach

                            <div class="col-lg-12 mb-3">
                                <div>
                                    <label for="enable_sms" class="form-label me-0">@lang('translation.enable_sms') <span class="text-danger">*</span></label>
                                    <select id="enable_sms" name="enable_sms[value]" class="form-select primary-select @error('enable_sms.value') is-invalid @enderror">
                                        <option selected disabled value="">@lang('translation.select') @lang('translation.enable_sms')</option>
                                        <option {{ old('enable_sms.value', optional($settings['enable_sms'] ?? '')->first()->value ?? '') == '0' ? 'selected' : '' }} value="0">@lang('translation.disable')</option>
                                        <option {{ old('enable_sms.value', optional($settings['enable_sms'] ?? '')->first()->value ?? '') == '1' ? 'selected' : '' }} value="1">@lang('translation.enable')</option>
                                    </select>
                                </div>
                            </div>
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
