@csrf
<div class="form-content">
    <div class="row">
        <div class="col-lg-12 mb-3">
            <div>
                <label for="question" class="form-label me-0">@lang('translation.question') <span class="text-danger">*</span></label>
                <textarea id="question"
                          name="question"
                          class="form-control @error('question') is-invalid @enderror k-form-input"
                          type="text"
                          placeholder="@lang('translation.enter') @lang('translation.question')"
                          data-validation="req"
                          rows="6"
                >{{ old('question', $faq->question ?? '') }}</textarea>
            </div>
        </div>

        <div class="col-lg-12 mb-3">
            <div>
                <label for="answer" class="form-label me-0">@lang('translation.answer') <span class="text-danger">*</span></label>
                <textarea id="answer"
                          name="answer"
                          class="form-control @error('answer') is-invalid @enderror k-form-input"
                          type="text"
                          placeholder="@lang('translation.enter') @lang('translation.answer')"
                          data-validation="req"
                          rows="6"
                >{{ old('answer', $faq->answer ?? '') }}</textarea>
            </div>
        </div>

        <div class="col-lg-12 mb-3">
            <div>
                <label for="status-item" class="form-label me-0">@lang('translation.status') <span class="text-danger">*</span></label>
                <select id="status-item" name="status" class="form-select primary-select @error('status') is-invalid @enderror">
                    <option selected disabled value="">@lang('translation.select') @lang('translation.status')</option>

                    @foreach($status as $get)
                        <option {{ old('status', $faq->status ?? '') == $loop->index ? 'selected' : '' }} value="{{ $loop->index }}">@lang('status.' . $get)</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-lg-12 mb-3">
            <div>
                <label for="show_order" class="form-label me-0">@lang('translation.show_order') <span class="text-danger">*</span></label>
                <input id="show_order"
                       name="show_order"
                       value="{{ old('show_order', $faq->show_order ?? '') }}"
                       class="form-control @error('show_order') is-invalid @enderror k-form-input right-placeholder"
                       type="number"
                       placeholder="@lang('translation.enter') @lang('translation.show_order')"
                       data-validation="req"
                >
            </div>
        </div>

        <div class="col-lg-12 text-start">
            <button type="submit" class="btn btn-light waves-effect waves-light form-btn px-5">@lang('translation.updating_data')</button>
        </div>
    </div>
</div>
