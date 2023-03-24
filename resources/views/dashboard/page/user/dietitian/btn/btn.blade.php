
{{-- <a><i class="dripicons-document-edit"></i></a> --}}

@if (auth()->user()->can('manager-dietitian-delete'))
<a class="deleteBtn" data-bs-toggle="modal" data-route="{{ route('users.dietitian.destroy', $id) }}"
        data-bs-target=".delete-record">
        <i class="dripicons-trash"></i>
    </a>
@endif
