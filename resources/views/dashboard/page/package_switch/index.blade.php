@extends('dashboard.layouts.master')
@section('css')
    <style>
        table,
        th,
        td {
            border: 3px solid white;
            border-collapse: hor;
        }
    </style>
@endsection
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
                        <h1 class="page-main-title">تبديل الخطة</h1>
                    </div>

                    <div class="col-12 col-lg-8">
                        <div class="page-card-btn-groub">
                            @if (auth()->user()->can('plan-switch-swap'))
                                <button type="button"
                                    class="btn btn-danger waves-effect waves-light d-flex align-items-center"
                                    data-bs-toggle="modal" data-bs-target=".plan-switch-alert"> <i
                                        class="bx bx-transfer mx-1"></i> <span>تبديل الحزم</span> </button>
                            @endif
                            @if (auth()->user()->can('plan-switch-add'))
                                <button type="button"
                                    class="btn btn-black waves-effect waves-light d-flex align-items-center"
                                    data-bs-toggle="modal" data-bs-target=".plan-switch-add"> <i
                                        class="bx bx-plus-circle mx-1"></i> <span>انشاء تبديل خطة</span> </button>
                            @endif
                            <button type="button"
                                class="btn btn-success waves-effect waves-light d-flex align-items-center"> <i
                                    class="bx bx-move-vertical mx-1"></i> <span>جروب التبديل</span> </button>
                        </div>
                    </div>



                    <div
                        class="col-12 my-3 d-flex justify-content-between align-items-center border-bottom border-dark pb-1">
                        <div class="table-title-container">
                            <h3 class="table-title"> جدول تبديل الخطط الغذائية </h3>
                        </div>

                    </div>

                    <div class=" col-12 table-container">
                        <div class="table-content mt-3">
                            <div class="table-responsive">
                                <table class="table table-striped mb-0 plan-switch-table">
                                    <thead>
                                        <tr>
                                            <th colspan="3" class="bg-secondary"> من </th>
                                            <th colspan="3" class="bg-secondary"> الي </th>
                                            <th colspan="3" class="bg-secondary"> الإجـــراء </th>
                                        </tr>
                                        <tr>
                                            <th>الحزمة </th>
                                            <th>الخطة</th>
                                            <th>المتغير</th>

                                            <th>الحزمة </th>
                                            <th>الخطة</th>
                                            <th>المتغير</th>

                                            <th>تبديل </th>
                                            <th>جروب </th>
                                            <th>الحذف</th>
                                        </tr>


                                    </thead>
                                    <tbody>
                                        @forelse ($packageSwitches as $packageSwitch)
                                            <tr>
                                                {{-- from --}}
                                                <td>{{ $packageSwitch->packageFrom->name }}</th>
                                                <td>{{ $packageSwitch->varientFrom->name }}</td>
                                                <td>{{ $packageSwitch->varientFrom->name }}</td>

                                                {{-- to --}}
                                                <td> {{ $packageSwitch->packageTo->name }}</th>
                                                <td> {{ $packageSwitch->varientTo->name }}</td>
                                                <td>{{ $packageSwitch->varientTo->name }} </td>

                                                {{-- action --}}
                                                <td>
                                                    @if (auth()->user()->can('plan-switch-swap'))
                                                        <a
                                                            href="{{ route('switch.swap', ['ids' => [$packageSwitch->id]]) }}"><i
                                                                class="dripicons-swap"></i></a>
                                                    @endif
                                                    </th>
                                                <td><input type="checkbox" name="groupswap[]"
                                                        value="{{ $packageSwitch->id }}"> </td>
                                                <td>
                                                    @if (auth()->user()->can('plan-switch-delete'))
                                                        <a class="deleteBtn" data-bs-toggle="modal"
                                                            data-route="{{ route('switch.destroy', $packageSwitch->id) }}"
                                                            data-bs-target=".delete-record"> <i class="dripicons-trash"></i>
                                                        </a>
                                                    @endif
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>

                                                <td colspan="9">لا يوجد</th>
                                            </tr>
                                        @endforelse

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>

    </div>
    <!-- End Page-content -->

    <!-- plan-switch-add modal -->
    <div class="modal fade  plan-switch-add" tabindex="-1" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">إضـافة خطة غذائية</h3>
                </div>
                <div class="modal-body">
                    <form action="{{ route('switch.store') }}" method="POST">
                        @csrf
                        <div class="row align-items-center justify-content-evenly">

                            <div class="col-lg-5 bg-secondary py-2">
                                <h4 class="m-0 border-bottom border-dark text-center pb-2"> من </h4>
                                <div class="row">

                                    <div class="col-12 mt-3">
                                        <div>
                                            <label class="form-label">اختر الحزمة</label>
                                            <select name="package_id_from" required class="form-control package-from">
                                                <option value=""> -- اختر الحزمة -- </option>
                                                @foreach ($packages as $package)
                                                    <option value="{{ $package->id }}"> {{ $package->name }} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-12 mt-3">
                                        <div>
                                            <label class="form-label">(المتغير)اختر الخطة</label>
                                            <select name="package_varient_id_from" required
                                                class="form-control package-varient-from">
                                                <option value=""> -- اختر الخطة -- </option>
                                            </select>
                                        </div>
                                    </div>



                                </div>
                            </div>

                            <div class="col-lg-5 bg-secondary py-2">
                                <h4 class="m-0 border-bottom border-dark text-center pb-2"> إلي </h4>
                                <div class="row">

                                    <div class="col-12 mt-3">
                                        <div>
                                            <label class="form-label">اختر الحزمة</label>
                                            <select name="package_id_to" required class="form-control package-to">
                                                <option value=""> -- اختر الحزمة -- </option>
                                                @foreach ($packages as $package)
                                                    <option value="{{ $package->id }}"> {{ $package->name }} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-12 mt-3">
                                        <div>
                                            <label class="form-label">(المتغير)اختر الخطة</label>
                                            <select name="package_varient_id_to" required
                                                class="form-control package-varient-to">
                                                <option value=""> -- اختر الخطة -- </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-lg-12 text-start mt-3">
                                <button type="submit"
                                    class="btn btn-primary waves-effect waves-light form-btn px-5">إضافة</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
    <!-- plan-switch-add modal -->
    <div class="modal fade  plan-switch-alert" tabindex="-1" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title text-center">هل تود بالفعل تبديل كافة الحزمة؟</h3>
                </div>
                <div class="modal-body">
                    <form action="{{ route('switch.swap') }}" method="POST">
                        @csrf
                        <input type="hidden" name="type" value="all">
                        <div class="row align-items-center justify-content-evenly">
                            <div class="col-lg-12 text-start">

                                <button type="submit"
                                    class="btn btn-primary waves-effect waves-light form-btn px-5">نعم</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
@endsection
@push('scripts')
    {{-- {{ $dataTable->scripts() }} --}}
    <script>
        $(function() {

            $('.package-from').on('change', function() {
                var url = '{{ route('switch.getVarients', ':id') }}';
                url = url.replace(':id', $(this).val());
                $.ajax({
                    url,
                    dataType: 'text',
                    success: function(data) {
                        $(".package-varient-from").empty();
                        $(".package-varient-from").html(data);
                    }
                })
            });

            $('.package-to').on('change', function() {
                var url = '{{ route('switch.getVarients', ':id') }}';
                url = url.replace(':id', $(this).val());
                $.ajax({
                    url,
                    dataType: 'text',
                    success: function(data) {
                        $(".package-varient-to").empty();
                        $(".package-varient-to").html(data);
                    }
                })
            });
        });
    </script>
@endpush
