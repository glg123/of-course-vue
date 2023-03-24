@if (auth()->user()->can('promo-code-edit'))
    {{-- <a><i class="dripicons-document-edit"></i></a> --}}
@endif

@if (auth()->user()->can('promo-code-delete'))
    <a class="deleteBtn" data-bs-toggle="modal" data-route="{{ route('copouns.destroy', $id) }}"
        data-bs-target=".delete-record">
        <i class="dripicons-trash"></i>
    </a>
@endif
