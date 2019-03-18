@extends('layouts.front')


@section('heading')
   
   <a class="btn btn-primary block" href="{{route('thread.create')}}">Create Thread</a>
   <br>
@endsection

@section('content')
    

   

   @include('thread.partials.threadlist')
   


@endsection