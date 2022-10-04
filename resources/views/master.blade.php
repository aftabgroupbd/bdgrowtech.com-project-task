<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <title>{{$title}} - Practice Task</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/main.css')}}">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    @yield('extra_css')
</head>
  <body class="app sidebar-mini">

    <!-- Navbar-->
    @include('layouts.header')
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    @include('layouts.sidebar')
    <main class="app-content">
        @yield('body')
    </main>


    <!-- Essential javascripts for application to work-->
    <script src="{{asset('/')}}assets/js/jquery-3.3.1.min.js"></script>
    <script src="{{asset('/')}}assets/js/popper.min.js"></script>
    <script src="{{asset('/')}}assets/js/bootstrap.min.js"></script>
    <script src="{{asset('/')}}assets/js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="{{asset('/')}}assets/js/plugins/pace.min.js"></script>
    <script>
        const logout = (e) => {
                if(confirm("Are you sure you want to logout?")){
                    var url = '{{route('logout')}}';
                    window.location = url;
                }
            }
    </script>
    @yield('extra_js')
  </body>
</html>