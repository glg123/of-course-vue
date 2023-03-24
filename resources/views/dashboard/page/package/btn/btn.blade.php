@if (auth()->user()->can('plan-delete'))
    <a class="deleteBtn" data-bs-toggle="modal" data-route="{{ route('package.destroy', $id) }}"
        data-bs-target=".delete-record">
        <i class="dripicons-trash"></i>
    </a>
@endif
@if (auth()->user()->can('plan-edit'))
    <a href="{{ route('package.edit', $id) }}"><i class="dripicons-document-edit"></i></a>
@endif
<a href="{{ route('package.showVarients', ['package_id' => $id]) }}"><i class="dripicons-preview"></i></a>
