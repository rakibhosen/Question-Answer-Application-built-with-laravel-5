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
                       <div class="d-fex flex-column vote-controls">
                               <a title="this answer isnuseful" class="vote-up">
                                  <i class="fa fa-caret-up fa-3x"></i>
                               </a>
                               <span class="votes-count">1230</span>
                               <a title="this answer is not useful" class="vote-down off">
                                       <i class="fa fa-caret-down fa-3x"></i>
                                   </a>
                                   @can('accept',$answer)
                                   <a title="mark as best answer (click again to undo)" class="{{$answer->status}} mt-2" onclick="event.preventDefault(); document.getElementById('accept-answer-{{ $answer->id }}').submit();">
                                           <i class="fa fa-check fa-2x"></i>
                                          
                                   </a>
                                <form id="accept-answer-{{$answer->id}}" action="{{route('answers.accept',$answer->id)}}" method="post" style="display: none;">
                                    @csrf

                                   </form>
                                   @else
                                     @if($answer->is_best)
                                     <a title="mark as best answer (click again to undo)" class="{{$answer->status}} mt-2">
                                        <i class="fa fa-check fa-2x"></i>
                                       
                                </a>
                                     @endif
                                   @endcan
                                  
                           </div>
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
                            <div class="float-right">
                                <span class="text-muted">Answered {{$question->created_date}}</span>
                                <div class="media">
                                    <a href="{{$question->user->url}}" class="pr-2">
                                            <img src="{{$answer->user->avatar}}">
                                        </a>
                                        
                                            <a href="{{$answer->user->url}}">{{$answer->user->name}}</a>
                                    
                                
                                </div>
                            </div>
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
