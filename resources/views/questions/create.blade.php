@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
            <div class="d-flex align-items-center">
                   <div class="card-header">Question Form</div>
                        <div class="ml-auto">
                        <a href="{{route('questions.index')}}"  class="btn btn-outline-secondary">Back To Home</a>
                    </div>
                 
             </div>
               
                    <div class="card-body">
                        @include('partials.messages')
                    <form action="{{route('questions.store')}}" method="post">
                        @csrf
                                <div class="form-group">
                                  <label for="title">Question Title :</label>
                                <input type="title" class="form-control" id="title" name="title" vlaue="{{old('title')}}">
                                </div>

                                <div class="form-group">
                                        <label for="question_body">Question body :</label>
                                      <textarea class="form-control" name="body">
                                           
                                      </textarea>
                                 </div>
                   
                                <button type="submit" class="btn btn-primary">Submit</button>
                              </form>
                 
                    </div>
            </div>
        </div>
    </div>
</div>

@endsection
