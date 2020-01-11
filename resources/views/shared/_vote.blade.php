@if ($model instanceof App\Question)
  @php
      $name = 'question';
      $firstURIsegment = 'questions';
  @endphp
  
  @elseif ($model instanceof App\Answer)
  @php
      $name = 'answer';
      $firstURIsegment = 'answers';
  @endphp
@endif


<div class="d-fex flex-column vote-controls">
    {{-- up vote section --}}
    <a title="This {{ $name }} is useful" class="vote-up {{ Auth::guest() ? 'off' : '' }}" onclick="event.preventDefault(); document.getElementById('up-vote-{{ $name}}-{{$model->id }}').submit();">
        <i class="fa fa-caret-up fa-3x"></i>
    </a>
    <form id="up-vote-{{ $name}}-{{$model->id }}" action="/{{ $firstURIsegment }}/{{ $model->id}}/vote" method="POST" style="display:none;">
        @csrf
        <input type="hidden" name="vote" value="1">
    </form>

    <span class="votes-count">{{ $model->votes_count }}</span>
    
    {{-- down vote section----- --}}

    <a title="This {{ $name }} is not useful" class="vote-down {{ Auth::guest() ? 'off' : '' }}" onclick="event.preventDefault(); document.getElementById('down-vote-{{ $name }}-{{ $model->id }}').submit();">
    <i class="fa fa-caret-down fa-3x"></i>
</a>
    <form id="down-vote-{{ $name}}-{{$model->id }}" action="/{{ $firstURIsegment }}/{{ $model->id }}/vote" method="POST" style="display:none;">
        @csrf
        <input type="hidden" name="vote" value="-1">
    </form>

    @if ($model instanceof App\Question)
        @include('shared._favorite',[
            'model' => $model,
        ])
        @elseif($model instanceof App\Answer)
        @include('shared._accept',[
            'model' => $model,
        ])
    @endif


</div>