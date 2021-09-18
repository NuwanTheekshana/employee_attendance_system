<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Styles -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl"
      crossorigin="anonymous"
    />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     <link href="https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css" rel="stylesheet"/>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/js/bootstrap-datetimepicker.min.js"></script>

     <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>


</head>
<style>
    body{
        background-color: #FFFFFF;
    }
</style>

<body>
    <div id="app">
      
         <!-- Side-Nav -->
    <div class="side-navbar justify-content-between flex-wrap flex-column" id="sidebar">

    <ul class="nav flex-column text-white w-100">
      <a href="#" class="nav-link h3 text-white my-2">
        
      <center>
        <img src="{{asset('img/logo.png')}}" alt="" style="border-radius: 50%;width: 50%;height: 50%;">
        <p>{{ Auth::user()->f_name }} {{ Auth::user()->l_name }}</p>
      </center>
      </a>
      <li class="nav-link">
        <a href="{{ route('home') }}" style="color: white;text-decoration: none;">
        <i class="fa fa-home"></i>
        <span class="mx-2">Home</span>
        </a>
      </li>
      <li class="nav-link">
        <a href="{{ route('profile') }}" style="color: white;text-decoration: none;">
        <i class="fa fa-user"></i>
        <span class="mx-2">Profile</span>
        </a>
      </li>
      <li class="nav-link">
        <a href="{{ route('shift_summery') }}" style="color: white;text-decoration: none;">
          <i class="fa fa-power-off"></i>
          <span class="mx-2">Shifts</span>
        </a>
      </li>
      <li class="nav-link">
        <a href="{{ route('time_off_home') }}" style="color: white;text-decoration: none;">
        <i class="fa fa-times-circle"></i>
        <span class="mx-2">Time off</span>
        </a>
      </li>

      <li class="nav-link" style="margin-top: 100%">
        <a href="{{ route('logout') }}" onclick="event.preventDefault();
        document.getElementById('logout-form').submit();" style="color: white;text-decoration: none;">
          <i class="fa fa-sign-out"></i>
          <span class="mx-2">Log out</span>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
          @csrf
      </form>
      </li>
    </ul>

       


  </div>

     

        <main class="p-1 my-container">

            <!-- Top Nav -->
     <nav class="navbar top-navbar navbar-light bg-light px-5">
        <a class="btn border-0" id="menu-btn"><i class="bx bx-menu"></i></a>
      </nav>
      <!--End Top Nav -->
       

            @yield('content')
        </main>
    
</div>

 <!-- bootstrap js -->
 <script
 src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
 integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0"
 crossorigin="anonymous"
></script>
<!-- custom js -->
<script>
 var menu_btn = document.querySelector("#menu-btn");
 var sidebar = document.querySelector("#sidebar");
 var container = document.querySelector(".my-container");
 menu_btn.addEventListener("click", () => {
   sidebar.classList.toggle("active-nav");
   container.classList.toggle("active-cont");
 });
</script>

</body>




</html>
