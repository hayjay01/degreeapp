<!DOCTYPE html>
<html>
<head>
  <title>DIRECTORATE OF DEGREE PROGRAMMES (EKITI STATE UNIVERSITY AOCOED) | PORTAL MANAGEMENT SYSTEM</title>
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
        <a class="navbar-brand" href=""><i class="glyphicon glyphicon-globe"></i> DIRECTORATE OF DEGREE PROGRAMMES  </a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        
        @if(Auth::check())
          <ul class="nav navbar-nav navbar-right">
            <li><a href=""></a></li>
            {{-- <li><a href="">Update Profile</a></li> --}}
            <li><a href="{{ route('logout') }}">Log Out</a></li>
          </ul>
        @endif
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>
  
  <div class="container">
    @yield('content')
  </div>

  <script src="{{ asset('js/jquery.min.js') }}"></script>
  <script src="{{ asset('js/bootstrap.js') }}"></script>
  <script src="{{ asset('js/main.js') }}"></script>
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