<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel Forum</title>

        <link rel="stylesheet" href="https://bootswatch.com/paper/bootstrap.min.css">
        <link rel="stylesheet" href="{{asset('css/main.css')}}">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <link rel="stylesheet" href="https://bootswatch.com/4/darkly/bootstrap.min.css">
    </head>



    <body>

        @include('layouts.partials.navbar')
        

        <div class="container">

                

            <div class="row">
                @section('category')
                    @include('layouts.partials.category')
                @show



                <div class="col-md-9">       
                    <div class="row content-heading">@yield('heading')</div>
                         <div class="content-wrap well">
                                   @yield('content')
                        </div>
                </div>
            
             </div>
                  
            
         </div>


        <script src="{{asset('js/main.js')}}"></script>
        <script src="{{asset('js/app.js')}}"></script>
        @yield('js')

    </body>

</html>