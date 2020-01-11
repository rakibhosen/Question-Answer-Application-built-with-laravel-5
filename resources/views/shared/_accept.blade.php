@can('accept',$model)
<a title="mark as best answer (click again to undo)" class="{{$model->status}} mt-2" onclick="event.preventDefault(); document.getElementById('accept-answer-{{ $model->id }}').submit();">
        <i class="fa fa-check fa-2x"></i>
       
</a>
<form id="accept-answer-{{$model->id}}" action="{{route('answers.accept',$model->id)}}" method="post" style="display: none;">
 @csrf

</form>
@else
  @if($model->is_best)
  <a title="mark as best answer (click again to undo)" class="{{$model->status}} mt-2">
     <i class="fa fa-check fa-2x"></i>
    
</a>
  @endif
@endcan