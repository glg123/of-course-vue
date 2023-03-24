
{{-- <a><i class="dripicons-document-edit"></i></a> --}}

@if (auth()->user()->can('meals-category-delete'))
    <a class="deleteBtn" data-bs-toggle="modal" data-route="{{ route('meal.category.destroy', $id) }}"
        data-bs-target=".delete-record">
        <i class="dripicons-trash"></i>
    </a>
@endif
