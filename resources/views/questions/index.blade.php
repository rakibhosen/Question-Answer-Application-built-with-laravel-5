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
                          <div class="d-flex mt-4">
                            <h3 class="mt-0"><a href="{{$question->url}}">{{$question->title}}</a></h3>

                            <div class="ml-auto mt-3 mr-3">
                                <a href="{{route('questions.edit',$question->id)}}"  class="btn btn-sm btn-outline-info">Edit</a>
                            <form class="form-delete" action="{{ route('questions.destroy',$question->id) }}" method="post">
                               @method('DELETE')
                                @csrf
                              <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are You sure?')">Delete</button>
                                </form>
                            </div>
                          </div>
                    
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
