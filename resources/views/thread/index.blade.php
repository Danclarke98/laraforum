@extends('layouts.front')

@section('content')
    

   <h1>Threads</h1>

   <div class = "list-group">
   @forelse ($threads as $thread)
       
        <a href="#" class="list-group-item">
        <h4 class="list-group-item-heading">{{$thread->title}}</h4>
        <p class="list-group-item-text">{{str_limit($thread->thread,100)}}</p>
        </a>



   @empty
        <h2>No Threads</h2>
       
   @endforelse
    </div>  




@endsection