@extends('dashboard.layouts.master')

@section('sidebar')
    @include('dashboard.incudes.back.setting_sidebar')
@endsection

@section('content')
    @include('dashboard.layouts.header', ['HEADER_TYPE' => 'SETTING'])

    @include('dashboard.incudes.alert')

    <div class="page-content" id="about">
        <div class="page-card container p-4">
            <h1 class="page-main-title mb-4">{{ $titlePage }}</h1>
            <form id="form-1" action="{{ route('about.update') }}" method="POST">
                @csrf
                <div class="form-header">
                    <img class="img-fluid" src="{{ asset('back/assets/images/ofCourse-images/shape-1.png') }}" width="10px" height="10px">
                    <h6 class="form-main-title"> {{ $titlePage }} </h6>
                    <div class="form-header-line"></div>
                </div>

                <div class="form-content container">
                    <div class="row">
                        @foreach($about as $key => $get)
                        <div class="col-lg-12 mb-5">
                            <div class="@error($key . '.value') is-invalid @enderror">
                                <label for="{{ $key }}" class="form-label">@lang('translation.' . $key)</label>
                                <textarea
                                    rows="7"
                                    id="{{ $key }}"
                                    name="{{ $key }}[value]"
                                    class="form-control k-form-input tinymce @error($key . '.value') is-invalid @enderror"
                                    type="text"
                                    placeholder="@lang('crud.enter') @lang('translation.' . $key)"
                                    data-validation="req"
                                >{{ old($key . '.value', $get->first()->value ?? '') }}</textarea>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="form-content container mt-4">
                    <div class="row">
                        <div class="col-lg-12 text-end">
                            <button type="submit" class="btn btn-light waves-effect waves-light form-btn px-5">@lang('translation.updating_data')</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- End Page-content -->
@endsection
