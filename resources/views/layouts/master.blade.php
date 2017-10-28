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
        <ul class="nav navbar-nav">
          <li><a href="">Timeline</a></li>
          
            <li><a href="">Friends</a></li>
            <li><a href="">Friends <span class="badge"></span></a></li>
        </ul>
        <form class="navbar-form navbar-left" action="">
          <!--<div class="form-group">-->
          <!--  <input type="text" class="form-control" name="query" placeholder="Find Friends">-->
          <!--</div>-->
          <!--<button type="submit" class="btn btn-default">Search</button>-->
          <div class="form-group">
            <input type="text" class="form-control" id="querySelector" name="query" placeholder="Find Someone Closeby....">
          </div>
          <button type="submit" class="btn btn-default">Search</button>
          <div class="dropdown">
                  <!--Trigger-->
                  <!--Menu-->
                  <div class="dropdown-menu dropdown-dark animated fadeIn" style="background-color: rgba(51,51,51,0.60); width: 100%; max-height: 150px; overflow-y: scroll; padding-left: 10px; ">
                      
                  </div>
          </div>
          
        </form>
        {{-- <ul class="nav navbar-nav navbar-right">
          <li><a href=""></a></li>
          <li><a href="">Update Profile</a></li>
          <li><a href="">Sign Out</a></li>
          <!--<li><a href="http://www.aocoedsu.org/developer">Developers</a></li>-->
          <li><a href="http://www.aocoedsu.org/developer">Developers</a></li>
        </ul> --}}
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>
  
  <div class="container">
    @yield('content')
  </div>

  <script src="{{ asset('js/jquery.min.js') }}"></script>
  <script src="{{ asset('js/bootstrap.js') }}"></script>
  <script src="{{ asset('js/toastr.min.js') }}"></script>
  @yield('scripts')
</body>
</html>