
<div class="row mt-3">
    <div class="col-lg-12">
       <div class="card">
           <div class="card-body">
               <div class="card-title">
                   <h2>Your Answer</h2>                   
               </div>
               <hr>
               @include('partials.messages')
            <form action="{{route('questions.answers.store',$question->id)}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="question_body">Question body :</label>
                            <textarea class="form-control" name="body"></textarea>
                            </div>
                        <button type="submit" class="btn btn-outline">Submit</button>
                  </form>

           
               </div>
           </div>
        </div>
    </div>

