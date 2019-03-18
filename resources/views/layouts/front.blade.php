<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel Forum</title>

        <link rel="stylesheet" href="https://bootswatch.com/4/darkly/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    </head>



    <body>

        @include('layouts.partials.navbar')
        

        <div class="container">

                <div class="container">

                    <div class="row">
                        <div class="col-md-3"><h2>Category</h2></div>
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-6"><h3 class="main-content-heading">@yield('heading')</h3>
                                </div>
                                <div class="col-md-6 col-md-3">
                                    <a class="btn btn-primary" href="{{route('thread.create')}}">Create Thread</a>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-3">
                            <ul class="list-group">
                                <a href="{{route('thread.index')}}" class="list-group-item">
                                    <span class="badge">14</span>
                                      All Threads
                                </a>
                                 <a href="#" class="list-group-item">
                                         <span class="badge">2</span>
                                           PHP
                                  </a>
                             </ul>
                        </div>

                        <div class="col-md-9">       
                                <div class="content-wrap well">
                                        @yield('content')
                                </div>
                        </div>
            
                    </div>
                  
            
                 </div>






        </div>
       
    </body>

</html>