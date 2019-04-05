@extends('layouts.front')

@section('category')
    <div class="col-md-3" >
    <div class="dp">

    </div>
        <h3>
            {{$user->name}}
        </h3>

        <img src="{{ Auth::user()->avatar }}" height="64" width="64">
    </div>

@endsection

@section('content')
<div>
    
    <h4>{{$user->name}}'s latest Threads</h3>

    @forelse($threads as $thread)
        <h5>{{$thread->title}}</h5>

    @empty
        <h5>No threads yet</h5>

    @endforelse
    <br>
    <hr>

    <h4>{{$user->name}}'s latest Comments</h3>

    @forelse($comments as $comment)
        <h5>{{$user->name}} commented "{{$comment->body}}"  {{$comment->created_at->diffForHumans()}}</h5>
    @empty
    <h5>No comments yet</h5>
    @endforelse

    
</div>

@endsection