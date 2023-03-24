@if (auth()->user()->can('plan-edit'))
    <a href="{{ route('package.editVarients', $id) }}"><i class="dripicons-document-edit"></i></a>
@endif
@if (auth()->user()->can('plan-delete'))
    <a class="deleteBtn" data-bs-toggle="modal" data-route="{{ route('package.destroyVarients', $id) }}"
        data-bs-target=".delete-record">
        <i class="dripicons-trash"></i>
    </a>
@endif
