<div class = "list-group">
    @forelse ($threads as $thread)
        
         <a href="{{route('thread.show',$thread->id)}}" class="list-group-item">
         <h4 class="list-group-item-heading">{{$thread->title}}</h4>
         <p class="list-group-item-text">{{str_limit($thread->thread,100)}}</p>
         </a>
 
 
 
    @empty
         <h2>No Threads</h2>
        
    @endforelse
 </div>  