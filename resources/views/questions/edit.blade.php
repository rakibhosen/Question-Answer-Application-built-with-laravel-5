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
                <form action="{{route('questions.update',$question->id)}}" method="post">
                    {{ method_field('PUT') }}
                    @include('questions._form',['buttonText' => "Update Question"])
                </form>
            
            </div>

            </div>
        </div>
    </div>
</div>

@endsection
