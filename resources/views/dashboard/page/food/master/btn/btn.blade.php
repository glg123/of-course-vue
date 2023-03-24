@if (auth()->user()->can('master-data-edit'))
    {{-- <a><i class="dripicons-document-edit"></i></a> --}}
@endif
@if (auth()->user()->can('master-data-delete'))
    <a class="deleteBtn" data-bs-toggle="modal" data-route="{{ route('food.destroy', $id) }}"
        data-bs-target=".delete-record">
        <i class="dripicons-trash"></i>
    </a>
@endif
