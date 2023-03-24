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
                        <h1 class="page-main-title">إضافة صلاحية</h1>
                    </div>

                    <div class="col-12">
                        <form action="{{route('roles.store')}}" method="POST">
                            @csrf
                            <div class="form-content">
                                <div class="row">
                                    <div class="col-lg-6 mb-5">
                                        <div>
                                            <label class="form-label">الدور الوظيفي</label>
                                            <input class="form-control" name="name" required type="text" placeholder="الدور الوظيفي"></input>
                                        </div>
                                    </div>

                                    <div class="col-12 nav-card-container p-0 py-3 row">
                                        <div class="col-12">
                                            <!-- Tabs Buttons -->
                                            <ul class="nav nav-pills nav-justified p-0" role="tablist">
                                                <li class="nav-item waves-effect waves-light mb-2 mb-lg-0">
                                                    <a class="nav-link p-2 text-center active" data-bs-toggle="tab"
                                                        href="#sales" role="tab" aria-selected="true">
                                                        <span>المبيعـات</span>
                                                    </a>
                                                </li>
                                                <li class="nav-item waves-effect waves-light mb-2 mb-lg-0">
                                                    <a class="nav-link p-2 text-center" data-bs-toggle="tab"
                                                        href="#operations" role="tab" aria-selected="true">
                                                        <span>العمليــات</span>
                                                    </a>
                                                </li>
                                                <li class="nav-item waves-effect waves-light mb-2 mb-lg-0">
                                                    <a class="nav-link p-2 text-center" data-bs-toggle="tab" href="#reports"
                                                        role="tab" aria-selected="true">
                                                        <span>التقارير</span>
                                                    </a>
                                                </li>
                                                <li class="nav-item waves-effect waves-light mb-2 mb-lg-0">
                                                    <a class="nav-link p-2 text-center" data-bs-toggle="tab"
                                                        href="#settings" role="tab" aria-selected="true">
                                                        <span>الإعــدادات</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-12">
                                            <!-- Tabs Content -->
                                            <div class="tab-content p-3 text-muted">
                                                <!-- First Tab -->

                                                <div class="tab-pane active row" id="sales" role="tabpanel">
                                                    @foreach ($salePermissions as $index => $salePermission)
                                                        <div class="col-12 my-4">
                                                            <div class="accordion-item">

                                                                <h2 class="accordion-header" id="{{ $index }}">
                                                                    <button class="accordion-button fw-medium collapsed"
                                                                        type="button" data-bs-toggle="collapse"
                                                                        data-bs-target="#{{ $index . $loop->iteration }}"
                                                                        aria-expanded="false"
                                                                        aria-controls="{{ $index . $loop->iteration }}">
                                                                        <h5 class="form-main-title m-0 mx-3 fw-bold">
                                                                            صلاحيـات {{ $index }} </h5>
                                                                    </button>
                                                                </h2>
                                                                <div id="{{ $index . $loop->iteration }}"
                                                                    class="accordion-collapse collapse p-3"
                                                                    aria-labelledby="{{ $index }}"
                                                                    data-bs-parent="#accordionFlushExample">
                                                                    <div class="row">
                                                                        @foreach ($salePermission->groupBy('section') as $titleType => $rolePermissions)
                                                                            <div class="col-12 d-flex">
                                                                                <img class="img-fluid"
                                                                                    src="{{ asset('back/assets/images/ofCourse-images/shape-1.png') }}"
                                                                                    width="10px" height="10px">
                                                                                <h6
                                                                                    class="form-main-title m-0 mx-3 fw-bold">
                                                                                    جميع صلاحيـات {{ $titleType }}</h5>
                                                                            </div>
                                                                            <div class="col-12 row "
                                                                                style="margin-bottom: 10px">
                                                                                @foreach ($rolePermissions as $permission)
                                                                                    {{-- {{ dd($permission) }} --}}
                                                                                    <div class="col-lg-4 mt-3">
                                                                                        <div
                                                                                            class="form-check form-check-right">
                                                                                            <input class="form-check-input"
                                                                                                type="checkbox"
                                                                                                value="{{ $permission->name }}"
                                                                                                name="permissions[]"
                                                                                                id="{{ $permission->name }}">
                                                                                            <label class="form-check-label"
                                                                                                for="{{ $permission->name }}">
                                                                                                {{ $permission->name }}
                                                                                            </label>
                                                                                        </div>
                                                                                    </div>
                                                                                @endforeach
                                                                            </div>
                                                                        @endforeach


                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                                <!-- second Tab -->
                                                <div class="tab-pane row" id="operations" role="tabpane2">
                                                    @foreach ($operationPermissions as $index => $operationPermission)
                                                        <div class="col-12 my-4">
                                                            <div class="accordion-item">

                                                                <h2 class="accordion-header" id="{{ $index }}">
                                                                    <button class="accordion-button fw-medium collapsed"
                                                                        type="button" data-bs-toggle="collapse"
                                                                        data-bs-target="#{{ $index . $loop->iteration }}"
                                                                        aria-expanded="false"
                                                                        aria-controls="{{ $index . $loop->iteration }}">
                                                                        <h5 class="form-main-title m-0 mx-3 fw-bold">
                                                                            صلاحيـات {{ $index }} </h5>
                                                                    </button>
                                                                </h2>
                                                                <div id="{{ $index . $loop->iteration }}"
                                                                    class="accordion-collapse collapse p-3"
                                                                    aria-labelledby="{{ $index }}"
                                                                    data-bs-parent="#accordionFlushExample">
                                                                    <div class="row">
                                                                        @foreach ($operationPermission->groupBy('section') as $titleType => $rolePermissions)
                                                                            <div class="col-12 d-flex">
                                                                                <img class="img-fluid"
                                                                                    src="{{ asset('back/assets/images/ofCourse-images/shape-1.png') }}"
                                                                                    width="10px" height="10px">
                                                                                <h6
                                                                                    class="form-main-title m-0 mx-3 fw-bold">
                                                                                    جميع صلاحيـات {{ $titleType }}</h5>
                                                                            </div>
                                                                            <div class="col-12 row "
                                                                                style="margin-bottom: 10px">
                                                                                @foreach ($rolePermissions as $permission)
                                                                                    {{-- {{ dd($permission) }} --}}
                                                                                    <div class="col-lg-4 mt-3">
                                                                                        <div
                                                                                            class="form-check form-check-right">
                                                                                            <input class="form-check-input"
                                                                                                type="checkbox"
                                                                                                value="{{ $permission->name }}"
                                                                                                name="permissions[]"
                                                                                                id="{{ $permission->name }}">
                                                                                            <label class="form-check-label"
                                                                                                for="{{ $permission->name }}">
                                                                                                {{ $permission->name }}
                                                                                            </label>
                                                                                        </div>
                                                                                    </div>
                                                                                @endforeach
                                                                            </div>
                                                                        @endforeach

                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                                <!-- third Tab -->
                                                <div class="tab-pane row" id="reports" role="tabpane3">
                                                    @foreach ($reportPermissions as $index => $reportPermission)
                                                        <div class="col-12 my-4">
                                                            <div class="accordion-item">

                                                                <h2 class="accordion-header" id="{{ $index }}">
                                                                    <button class="accordion-button fw-medium collapsed"
                                                                        type="button" data-bs-toggle="collapse"
                                                                        data-bs-target="#{{ $index . $loop->iteration }}"
                                                                        aria-expanded="false"
                                                                        aria-controls="{{ $index . $loop->iteration }}">
                                                                        <h5 class="form-main-title m-0 mx-3 fw-bold">
                                                                            صلاحيـات {{ $index }} </h5>
                                                                    </button>
                                                                </h2>
                                                                <div id="{{ $index . $loop->iteration }}"
                                                                    class="accordion-collapse collapse p-3"
                                                                    aria-labelledby="{{ $index }}"
                                                                    data-bs-parent="#accordionFlushExample">
                                                                    <div class="row">
                                                                        @foreach ($reportPermission->groupBy('section') as $titleType => $rolePermissions)
                                                                            <div class="col-12 d-flex">
                                                                                <img class="img-fluid"
                                                                                    src="{{ asset('back/assets/images/ofCourse-images/shape-1.png') }}"
                                                                                    width="10px" height="10px">
                                                                                <h6
                                                                                    class="form-main-title m-0 mx-3 fw-bold">
                                                                                    جميع صلاحيـات {{ $titleType }}</h5>
                                                                            </div>
                                                                            <div class="col-12 row "
                                                                                style="margin-bottom: 10px">
                                                                                @foreach ($rolePermissions as $permission)
                                                                                    {{-- {{ dd($permission) }} --}}
                                                                                    <div class="col-lg-4 mt-3">
                                                                                        <div
                                                                                            class="form-check form-check-right">
                                                                                            <input class="form-check-input"
                                                                                                type="checkbox"
                                                                                                value="{{ $permission->name }}"
                                                                                                name="permissions[]"
                                                                                                id="{{ $permission->name }}">
                                                                                            <label class="form-check-label"
                                                                                                for="{{ $permission->name }}">
                                                                                                {{ $permission->name }}
                                                                                            </label>
                                                                                        </div>
                                                                                    </div>
                                                                                @endforeach
                                                                            </div>
                                                                        @endforeach

                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                                <!-- forth Tab -->
                                                <div class="tab-pane row" id="settings" role="tabpane4">
                                                    @foreach ($settingPermissions as $index => $settingPermission)
                                                        <div class="col-12 my-4">
                                                            <div class="accordion-item">

                                                                <h2 class="accordion-header" id="{{ $index }}">
                                                                    <button class="accordion-button fw-medium collapsed"
                                                                        type="button" data-bs-toggle="collapse"
                                                                        data-bs-target="#{{ $index . $loop->iteration }}"
                                                                        aria-expanded="false"
                                                                        aria-controls="{{ $index . $loop->iteration }}">
                                                                        <h5 class="form-main-title m-0 mx-3 fw-bold">
                                                                            صلاحيـات {{ $index }} </h5>
                                                                    </button>
                                                                </h2>
                                                                <div id="{{ $index . $loop->iteration }}"
                                                                    class="accordion-collapse collapse p-3"
                                                                    aria-labelledby="{{ $index }}"
                                                                    data-bs-parent="#accordionFlushExample">
                                                                    <div class="row">
                                                                        @foreach ($settingPermission->groupBy('section') as $titleType => $rolePermissions)
                                                                            <div class="col-12 d-flex">
                                                                                <img class="img-fluid"
                                                                                    src="{{ asset('back/assets/images/ofCourse-images/shape-1.png') }}"
                                                                                    width="10px" height="10px">
                                                                                <h6
                                                                                    class="form-main-title m-0 mx-3 fw-bold">
                                                                                    جميع صلاحيـات {{ $titleType }}</h5>
                                                                            </div>
                                                                            <div class="col-12 row "
                                                                                style="margin-bottom: 10px">
                                                                                @foreach ($rolePermissions as $permission)
                                                                                    {{-- {{ dd($permission) }} --}}
                                                                                    <div class="col-lg-4 mt-3">
                                                                                        <div
                                                                                            class="form-check form-check-right">
                                                                                            <input class="form-check-input"
                                                                                                type="checkbox"
                                                                                                value="{{ $permission->name }}"
                                                                                                name="permissions[]"
                                                                                                id="{{ $permission->name }}">
                                                                                            <label class="form-check-label"
                                                                                                for="{{ $permission->name }}">
                                                                                                {{ $permission->name }}
                                                                                            </label>
                                                                                        </div>
                                                                                    </div>
                                                                                @endforeach
                                                                            </div>
                                                                        @endforeach

                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 text-start mt-3">
                                        <button type="submit"
                                            class="btn btn-light waves-effect waves-light form-btn px-5">
                                            حفظ </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
@push('scripts')
@endpush
