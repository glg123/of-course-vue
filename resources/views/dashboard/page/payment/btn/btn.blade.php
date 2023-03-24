
@if($row->is_created=='1')
    <a href="{{url($row->pdf_file)}}"  class="btn btn-info">{{__('views.download_invoice')}}</a>
@else
    <a href="{{route('print.invoice',$row->id)}}" target="_blank" class="btn btn-info">{{__('views.create_invoice')}}</a>
@endif

