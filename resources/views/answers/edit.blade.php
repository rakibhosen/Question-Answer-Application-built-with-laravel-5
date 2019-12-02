@extends('layouts.app')

@section('content')
<div class="container">
<div class="row mt-3">
        <div class="col-md-12">
           <div class="card">
               <div class="card-body">
                   <div class="card-title">
                   <h2>Editing Answer for question:<strong>{{$question->title}}</strong></h2>                   
                   </div>
                   <hr>
                   @include('partials.messages')
                <form action="{{route('questions.answers.update',[$question->id,$answer->id])}}" method="post">
                    @csrf
                           @method('PATCH')
                            <div class="form-group">
                                <label for="question_body">Question body :</label>
                            <textarea class="form-control" name="body">{{$answer->body}}</textarea>
                                </div>
                          <button type="submit" class="btn btn-outline-primary"> Update</button>
                      </form>
    
               
                   </div>
               </div>
            </div>
         <div>
      </div>
    </div>
</div>
@endsection