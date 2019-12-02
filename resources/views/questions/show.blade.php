@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                        <div class="card-title">
                                <div class="d-flex align-items-center">
                                {{$question->title}}
                                <div class="ml-auto">
                                        <a href="{{route('questions.index')}}"  class="btn btn-outline-secondary">Back</a>
                                        </div>
                                </div>
                      
                         </div>
                         <hr>
                    <div class="media">
                            <div class="d-flex flex-column vote-controls">
                                    <a title="this question isnuseful" class="vote-up">
                                       <i class="fa fa-caret-up fa-3x"></i>
                                    </a>
                                    <span class="votes-count">1230</span>
                                    <a title="this question is not useful" class="vote-down off">
                                            <i class="fa fa-caret-down fa-3x"></i>
                                        </a>
                                        <a title="Click to mark as favourite question (click again to undo)" class="favorite mt-2 favorited">
                                                <i class="fa fa-star fa-3x"></i>
                                                <span class="favorites-count">1230</span>
                                        </a>
                                       
                                </div>
                        <div class="media-body">
                            {!! $question->body_html !!}
                            <div class="float-right  mt-3">
                                    <span class="text-muted">Question By{{$question->created_date}}</span>
                                    <div class="media">
                                        <a href="{{$question->user->url}}" class="pr-2">
                                                <img src="{{$question->user->avatar}}">
                                            </a>
                                            <div class="media-body">
                                                <a href="{{$question->user->url}}">{{$question->user->name}}</a>
                                            </div>
                                    
                                    </div>
                              </div>
                        </div>
                        </div>
                </div>
            </div>
        </div>
 
    
@include('answers.index')
@include('answers.create')
</div>

@endsection