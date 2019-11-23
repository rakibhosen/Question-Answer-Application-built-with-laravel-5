@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">All Questions</div>

            <div class="card-body">

                    @foreach ($questions as $question)
                  <div class="media mt-3">
                        <div class="d-flex flex-column counters">
                                <div class="vote">
                                    <strong>{{ $question->vote }} </strong>{{ str_plural('vote', $question->vote) }}
                                </div>

                                <div class="status {{$question->status}}">
                                        <strong>{{ $question->answer }} </strong>{{ str_plural('answer', $question->answer) }}
                                 </div>

                                 <div class="view">
                                        {{ $question->views  ." ". str_plural('view', $question->views) }}
                                </div>
                            </div>
                      <div class="media-body">
                      <h3 class="mt-0"><a href="{{$question->url}}">{{$question->title}}</a></h3>
                      <p class="lead">Ask by <a href="{{$question->user->url}}">{{$question->user->name}}</a> <small class="text-muted"> {{$question->created_date}} </small></p>
                     
                      {{str_limit($question->body,250)}}
                      </div>
                  </div>
                    @endforeach
                    <div class="mx-auto">
                        {{$questions->links()}}
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
