<a href="{{ route('customer.edit', $id) }}"><i class="dripicons-document-edit"></i></a>
<a href="{{ route('customer.addresses', ['user_id' => $id]) }}"><i class="dripicons-location"></i></a>
{{-- 
@if (auth()->user()->can('e-clinic-delete'))
    <a class="deleteBtn" data-bs-toggle="modal" data-route="{{ route('clinic.destroy', $id) }}"
        data-bs-target=".delete-record">
        <i class="dripicons-trash"></i>
    </a>
@endif --}}
