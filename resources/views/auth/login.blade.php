<!DOCTYPE html>
<html>
<head>
  <title>DIRECTORATE OF DEGREE PROGRAMMES (EKITI STATE UNIVERSITY AOCOED) | PORTAL MANAGEMENT SYSTEM | LOGIN</title>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, 
      initial-scale=1, maximum-scale=1, user-scalable=no">
      <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet" />
      <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet" />
      {{-- <link href="{{ asset('sass/modules/_typography.scss') }}" rel="stylesheet" /> --}}
</head>
<body>

  <nav class="navbar navbar-default">
    <div class="container">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href=""><i class="glyphicon glyphicon-globe"></i> DIRECTORATE OF DEGREE PROGRAMMES </a>
      </div>
    </div><!-- /.container-fluid -->
  </nav>
  
  <div class="container">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading text-center">Director's Login</div>
                <div class="panel-body">
                    <form method="POST" action="{{ route('login.process') }}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="">Email</label>
                            <input type="email" class="form-control" name="email" value="{{ old('email') }}">

                            @if($errors->has('email'))
                                <strong>
                                    <span class="help-block">{{ $errors->first('email') }}</span>
                                </strong>
                            @endif
                        </div>
                    
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="">Password</label>
                            <input type="password" class="form-control" name="password">

                            @if($errors->has('password'))
                                <strong>
                                    <span class="help-block">{{ $errors->first('password') }}</span>
                                </strong>
                            @endif
                        </div>  
                        <div class="form-group">
                            <button class="btn btn-default" type="submit">Login</button>
                        </div> 
                    </form>
                </div>
                <div class="panel-footer text-center">Developed by <a href="#">Buildit.com.ng</a></div>
            </div>

            
        </div>
    </div>
  </div>

  <script src="{{ asset('js/jquery.min.js') }}"></script>
  <script src="{{ asset('js/app.js') }}"></script>
  <script src="{{ asset('js/toastr.min.js') }}"></script>
  @yield('scripts')
    <script>

    @if(Session::has('success'))
        toastr.success("{{ Session::get('success') }}")
    @endif

    @if(Session::has('info'))
        toastr.info("{{ Session::get('info') }}")
    @endif

    @if(Session::has('error'))
        toastr.error("{{ Session::get('error') }}")
    @endif
    
</script>
</body>
</html>