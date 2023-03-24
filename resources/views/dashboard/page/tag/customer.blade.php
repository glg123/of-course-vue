@extends('dashboard.layouts.master')
@section('sidebar')
    @include('dashboard.incudes.back.operation_sidebar')
@endsection


@section('content')
    @include('dashboard.layouts.header', ['HEADER_TYPE' => 'OPERATION'])
    @include('dashboard.incudes.alert')


    <div class="page-content">

        <div class="page-card container p-4">
            <div class="container">
                <div class="row justify-content-between align-items-center">
                    <div class="col-12 col-lg-3">
                        <h1 class="page-main-title">الإشارة الى العملاء </h1>
                    </div>

                    <div class="col-12 mt-4 bg-secondary py-3 mx-auto">
                        <div class="d-flex justify-content-between align-items-center">
                            <h3 class="m-0 fw-bold">الإشارة الى العملاء</h4>
                                {{-- <button type="button"
                                    class="btn btn-dark  waves-effect waves-light d-flex align-items-center"> <span>انشاء
                                        إشارة Tag </span> </button> --}}
                        </div>
                        <div class="row mt-5 mx-0 p-0">
                            <div class="col-12 row tag-items-container">
                                @foreach ($tags as $tag)
                                    <form method="POST" action="{{ route('tags.update', $tag->id) }}"
                                        class="col-6 col-lg-5 row tag-item">
                                        @csrf
                                        <div class="col-2">
                                            <img src="{{ asset('back/assets/images/ofCourse-images/tag-icon.png') }}"
                                                class="img-fluid tag-item-icon" width="50px">
                                        </div>
                                        <div class="col-7">
                                            <input class="m-0 form-control" name="name" required
                                                value="{{ $tag->name }}" placeholder="أسم الاشارة">
                                        </div>
                                        <div class="col-1">
                                            @if (auth()->user()->can('customer-tag-delete'))
                                                <a class="deleteBtn" data-bs-toggle="modal"
                                                    data-route="{{ route('tags.destroy', $tag->id) }}"
                                                    data-bs-target=".delete-record">
                                                    <i class="bx bx-trash font-size-24 text-danger"></i>
                                                </a>
                                            @endif
                                        </div>
                                        <div class="col-1">
                                            @if (auth()->user()->can('customer-tag-edit'))
                                                <button type="submit" class="btn  xs-btn"><i
                                                        class="bx bx-edit font-size-24 text-info"></i></button>
                                            @endif

                                        </div>
                                    </form>
                                @endforeach
                                @if (auth()->user()->can('customer-tag-add'))
                                    <form action="{{ route('tags.store') }}" method="POST"
                                        class="col-6 col-lg-5 row tag-item">
                                        @csrf
                                        <input type="hidden" name="type" value="2">
                                        <div class="col-2">
                                            <img src="{{ asset('back/assets/images/ofCourse-images/tag-icon.png') }}"
                                                class="img-fluid tag-item-icon" width="50px">
                                        </div>
                                        <div class="col-7">
                                            <input class="m-0 form-control" name="name" required
                                                placeholder="أسم الاشارة">
                                        </div>
                                        <div class="col-1">
                                            <i class="bx bx-trash font-size-24 text-danger"></i>
                                        </div>
                                        <div class="col-1">
                                            <button type="submit" class="btn  xs-btn"><i
                                                    class="bx bx-plus font-size-24 text-info"></i></button>
                                        </div>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>

    </div>
    <!-- End Page-content -->
@endsection
@push('scripts')
@endpush
