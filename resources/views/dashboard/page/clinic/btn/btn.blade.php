@if (auth()->user()->can('e-clinic-edit'))
    {{-- <a><i class="dripicons-document-edit"></i></a> --}}
@endif
@if (auth()->user()->can('e-clinic-delete'))
    <a class="deleteBtn" data-bs-toggle="modal" data-route="{{ route('clinic.destroy', $id) }}"
        data-bs-target=".delete-record">
        <i class="dripicons-trash"></i>
    </a>
@endif
