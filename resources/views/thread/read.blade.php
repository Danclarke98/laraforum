@extends('layouts.front')

@section('content')

    <h2>{{$thread->title}}</h2>

    <div class="thread-details">
        {{$thread->content}}
    </div>

    <!-- check user owns thread -->
    
    @if (auth()->user()!=null)
        @if (auth()->user()->id==$thread->user_id)
         <div class="actions">
               <a href="{{route('thread.edit',$thread->id)}}" class="btn btn-info">Edit</a>
    
               <form action="{{route('thread.destroy',$thread->id)}}" method="POST">
                 {{ csrf_field() }}
                 {{method_field('DELETE')}}
                 <input class="btn btn-danger" type="submit" value="Delete">
    
                </form>
    
         </div>
        
         @endif

    @endif

    <div class="comment-list">
        @foreach ($thread->comments as $comment)
            <h4>{{$comment->body}}</h4>
            <lead>{{$comment->user->name}}</lead>
        @endforeach
    </div>
    <div class="comment-form">
    <form action="{{route('threadcomment.store',$thread->id)}}" method="POST" role="form">
        {{ csrf_field() }}
        <legend>Reply</legend>
        <div class="form-group">
            <input type="text" class="form-control" name="body" id="">
        </div>
        <button type="submit" class="btn btn-primary">Reply</button>
    </form>
    </div>
    
    
    


    
@endsection