<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

     
      <link rel="stylesheet" href="{{asset('css/app.css')}}">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
    <body class="antialiased">
        
      <div id="app">  
      




        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
          
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
<li class="nav-item">
  <router-link to='/' class="nav-link">Home</router-link>
</li>                       
      
            @if (Route::has('login'))
                    @auth
                    {{-- <li class="nav-item">

                        <router-link to='/' class="nav-link">Home</router-link>
                    </li> --}}
                        @else
                     <li class="nav-item">
                        <a href="{{url('login')}}" class="nav-link">Log in</a>
                    </li>
                        @if (Route::has('register'))
                        <li class="nav-item"> 
                        <a href="{{url('register')}}" class="nav-link">Register</a>
                    </li>
                        @endif
                    @endauth
            @endif

                 
             
                <li class="nav-item">
                  <router-link class="nav-link" to='/tasks'>Tasks</router-link>
                </li>
             
              </ul>
           
            </div>
          </nav>






     

        <div class="container pt-5">
            <router-view></router-view>
        </div>

    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
   <script src="{{asset('js/app.js')}}">

   </script>
   
    </body>
</html>
