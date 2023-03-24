@if (auth()->user()->can('meal-edit'))
    <a href="{{ route('meal.edit', $id) }}"><i class="dripicons-document-edit"></i></a>
@endif
@if (auth()->user()->can('meal-delete'))
    <a class="deleteBtn" data-bs-toggle="modal" data-route="{{ route('meal.destroy', $id) }}"
        data-bs-target=".delete-record">
        <i class="dripicons-trash"></i>
    </a>
@endif
