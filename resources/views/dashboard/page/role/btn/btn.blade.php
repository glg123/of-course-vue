@if (auth()->user()->can('manager-edit-permission'))
    <a href="{{ route('roles.edit', $id) }}"><i class="dripicons-document-edit"></i></a>
@endif
@if (auth()->user()->can('manager-delete-permission'))
    <a class="deleteBtn" data-bs-toggle="modal" data-route="{{ route('clinic.destroy', $id) }}"
        data-bs-target=".delete-record">
        <i class="dripicons-trash"></i>
    </a>
@endif
