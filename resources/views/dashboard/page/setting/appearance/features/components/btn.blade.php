<a href="{{ route('settings.appearance.features.show', $row->id) }}" class="d-inline-block" title="@lang('crud.preview')"><i class="dripicons-preview"></i></a>

<a href="{{ route('settings.appearance.features.edit', $row->id) }}" class="d-inline-block" title="@lang('crud.edit')"><i class="dripicons-document-edit"></i></a>

<a data-url="{{ route('settings.appearance.features.destroy', $row->id) }}" title="@lang('crud.delete')" class="d-inline-block confirmActionItem"><i class="dripicons-trash"></i></a>
