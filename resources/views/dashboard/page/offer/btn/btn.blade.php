@if (auth()->user()->can('offer-edit'))
    {{-- <a><i class="dripicons-document-edit"></i></a> --}}
@endif
@if (auth()->user()->can('offer-delete'))
    <a class="deleteBtn" data-bs-toggle="modal" data-route="{{ route('offers.destroy', $id) }}"
        data-bs-target=".delete-record">
        <i class="dripicons-trash"></i>
    </a>
@endif
