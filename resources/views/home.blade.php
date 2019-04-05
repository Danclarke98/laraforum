@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Statistics Dashboard</div>

                <div style="width:100%;">
                    {!! $totalUserChart->container() !!}
                </div>
                
               
        
                {!! $totalUserChart->script() !!}
               
            </div>
        </div>
    </div>
</div>
@endsection
