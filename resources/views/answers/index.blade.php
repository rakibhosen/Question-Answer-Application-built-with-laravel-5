<div class="row mt-3">
    <div class="col-md-12">
       <div class="card">
           <div class="card-body">
               <div class="card-title">
                   <h2>{{$question->answers_count." ".str_plural('Answer',$question->answers_count)}}</h2>                   
               </div>
               <hr>
               @include('partials.messages')
             
               @foreach ($question->answers as $answer)
                  <div class="media">

                   @include('shared._vote',[
                       'model' => $answer
                   ])
                  
                                  
                        
                    <div class="media-body">   
                          {{ $answer->body }}
                      <div class="row">
                        <div class="col-4">
                            <div class="ml-auto mt-3">
                                    @can('update-answer',$answer)
                                    <a href="{{route('questions.answers.edit',[$question->id,$answer->id])}}"  class="btn btn-sm btn-outline-info">Edit</a>
                                @endcan
                                    
                                @can('delete-answer',$answer)
                                <form class="form-delete" action="{{ route('questions.answers.destroy',[$question->id,$answer->id]) }}" method="post">
                                   @method('DELETE')
                                    @csrf
                                  <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are You sure?')">Delete</button>
                                    </form>
                                    @endcan
                            </div>
                        </div>

                        <div class="col-4"></div>
                        <div class="col-4">
                            @include('shared._author',[
                                'model'=> $answer,
                                'label'=> 'answered'
                            ])
                            </div>
                        </div>
                        
                       

                           </div>       
                       </div> 
                           <hr>
                       @endforeach
           
               </div>
           </div>
        </div>
    </div>
