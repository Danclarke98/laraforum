@extends('layouts.front')

@section('content')

@if (session('message'))
    <div class="alert alert-success">
        {{session('message')}}
    </div>
@endif

<div class="row">
    <div class="well">
     <form class="form-vertical" action="{{route('thread.store')}}" method="post" role="form" id="createThread">
      {{ csrf_field() }}
      <div class="form-group">
            <label for="subject">Subject</label>
         <input type="text" class="form-control" name="title" value="{{old('title')}}">

        </div>
     <div class="form-group">
          <label for="subject">Type</label>
           <input type="text" class="form-control" name="type" value="{{old('type')}}">

     </div>
      <div class="form-group">
          <label for="subject">Content</label>
         <input type="text" class="form-control" name="content" value="{{old('content')}}">

        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>
</div>

    
@endsection