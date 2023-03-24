<a href="{{ route('contacts.show', $row->id) }}" class="d-inline-block" title="@lang('crud.preview')"><i class="dripicons-preview"></i></a>

<a href="{{ route('contacts.edit', $row->id) }}" class="d-inline-block" title="@lang('crud.edit')"><i class="dripicons-document-edit"></i></a>

<a data-url="{{ route('contacts.destroy', $row->id) }}" title="@lang('crud.delete')" class="d-inline-block confirmActionItem"><i class="dripicons-trash"></i></a>
