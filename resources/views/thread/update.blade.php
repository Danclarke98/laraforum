@extends('layouts.front')

@section('content')

@if (session('message'))
    <div class="alert alert-success">
        {{session('message')}}
    </div>
@endif

<div class="row">
    <div class="well">
     <form class="form-vertical" action="{{route('thread.update',$thread->id)}}" method="post" role="form" id="create-thread-form">
      {{ csrf_field() }}
      {{method_field('PUT')}}
      
      <div class="form-group">
            <label for="subject">Subject</label>
         <input type="text" class="form-control" name="title" value="{{$thread->title}}">

        </div>
     <div class="form-group">
          <label for="subject">Type</label>
           <input type="text" class="form-control" name="type" value="{{$thread->type}}">

     </div>
      <div class="form-group">
          <label for="subject">Content</label>
         <input type="text" class="form-control" name="content" value="{{$thread->content}}">

        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>
</div>

    
@endsection