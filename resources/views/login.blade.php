<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/main.css')}}">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>{{$title}} - Practice Task</title>
  </head>
  <body>
    <section class="material-half-bg">
      <div class="cover"></div>
    </section>
    <section class="login-content">
      <div class="logo">
        <h1>Practice Task</h1>
      </div>
      <div class="login-box">
        <form class="login-form" method="post" id="login_form" action="{{route('login')}}">
            @csrf
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>SIGN IN</h3>
            @if(Session::get('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{Session::get('error')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            @if(Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{Session::get('success')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
          <div class="form-group">
            <label class="control-label" for="username">USERNAME</label>
            <input class="form-control" type="text" id="username" autocomplete="off" placeholder="Enter Username" value="{{old('username')}}" autofocus name="username" />
            @error('username')
                <small class="form-text  text-danger">{{ $message }}</small>
            @enderror
          </div>
          <div class="form-group">
            <label class="control-label" for="password">PASSWORD</label>
            <input class="form-control" type="password" id="password" autocomplete="off" placeholder="Enter Password" value="{{old('password')}}" name="password" />
            @error('password')
                <small class="form-text  text-danger">{{ $message }}</small>
            @enderror
          </div>
          <div class="form-group btn-container">
            <button type="submit" id="submit_btn" class="btn btn-primary btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i>SIGN IN</button>
          </div>
        </form>
      </div>
    </section>
    <!-- Essential javascripts for application to work-->
    <script src="{{asset('assets/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <script>
        $("#login_form").on('submit', function() {
            let spinner = `
                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                Loading...`;
            $("#submit_btn").html(spinner);
            $('#submit_btn').prop('disabled', true);
        });
    </script>
  </body>
  </body>
</html>