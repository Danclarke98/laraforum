@extends('layouts.front')

@section('content')

    <h2>{{$thread->title}}</h2>

    <div class="thread-details">
        {{$thread->content}}
    </div>

    <div class="actions">
        <a href="{{route('thread.edit',$thread->id)}}" class="btn btn-info">Edit</a>

        <form action="{{route('thread.destroy',$thread->id)}}" method="POST">
            {{ csrf_field() }}
            {{method_field('DELETE')}}
            <input class="btn btn-danger" type="submit" value="Delete">

        </form>

    </div>
    

    
@endsection