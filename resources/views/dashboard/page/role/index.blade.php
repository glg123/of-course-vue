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
                        <h1 class="page-main-title"> صلاحيات الموظفين</h1>
                    </div>
                    @if (auth()->user()->can('manager-add-permission'))
                        <div class="col-12 col-lg-5">
                            <div class="page-card-btn-groub">
                                <a href="{{ route('roles.create') }}" type="button"
                                    class="btn btn-light waves-effect waves-light d-flex align-items-center"> <i
                                        class="bx bx-plus-circle mx-1"></i> <span>إضــافة صلاحيات</span> </a>
                                <a type="button"
                                    class="btn btn-light disabled waves-effect waves-light d-flex align-items-center"> <i
                                        class="bx bx-file-blank mx-1"></i> <span>سجل تدقيق</span> </a>
                            </div>
                        </div>
                    @endif

                    <div
                        class="col-12 my-3 d-flex justify-content-between align-items-center border-bottom border-dark pb-1">
                        <div class="table-title-container">
                            <h3 class="table-title"> جدول الصلاحيات</h3>
                        </div>
                        <div class="btn-group" role="group">
                            <button id="btnAction" type="button"
                                class="btn btn-primary waves-effect waves-light form-btn px-5 dropdown-toggle"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bx bxs-file-plus font-size-16 mx-2"></i> @lang('crud.export')
                            </button>
                            <ul class="dropdown-menu btn-dt-actions" aria-labelledby="btnAction">
                            </ul>
                        </div>
                    </div>

                    <div class="col-12 table-container">
                        <div class="table-content mt-3">
                            <div class="table-responsive">
                            {!! $dataTable->table(['class' => 'table table-striped mb-0']) !!}
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
    {{ $dataTable->scripts() }}
  
@endpush
