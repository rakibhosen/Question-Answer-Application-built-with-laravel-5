@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="d-flex align-items-center">
                        <div class="card-header">All Questions</div>
                        <div class="ml-auto">
                        <a href="{{route('questions.create')}}"  class="btn btn-outline-secondary">Ask question</a>
                        </div>
                </div>
               

            <div class="card-body">
                    @include('partials.messages')

                    @foreach ($questions as $question)
                  <div class="media mt-3">
                        <div class="d-flex flex-column counters">
                                <div class="vote">
                                    <strong>{{ $question->votes_count }} </strong>{{ str_plural('vote', $question->vote_count) }}
                                </div>

                                <div class="status {{$question->status}}">
                                        <strong>{{ $question->answers_count }} </strong>{{ str_plural('answer', $question->answers_count) }}
                                 </div>

                                 <div class="view">
                                        {{ $question->views  ." ". str_plural('view', $question->views) }}
                                </div>
                            </div>
                      <div class="media-body">
                          <div class="d-flex mt-4">
                            <h3 class="mt-0"><a href="{{$question->url}}">{{$question->title}}</a></h3>

                            <div class="ml-auto mt-3 mr-3">
                            @can('update-question',$question)
                                <a href="{{route('questions.edit',$question->id)}}"  class="btn btn-sm btn-outline-info">Edit</a>
                            @endcan
                                
                            @can('delete-question',$question)
                            <form class="form-delete" action="{{ route('questions.destroy',$question->id) }}" method="post">
                               @method('DELETE')
                                @csrf
                              <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are You sure?')">Delete</button>
                                </form>
                                @endcan
                            </div>
                          </div>
                    
                      <p class="lead">Ask by <a href="{{$question->user->url}}">{{$question->user->name}}</a> <small class="text-muted"> {{$question->created_date}} </small></p>
                     
                      {{str_limit($question->body,250)}}
                      </div>
                  </div>
                  <hr>
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
