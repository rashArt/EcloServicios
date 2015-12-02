<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Eclosoft | @yield('title')</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<link href="{{ asset('lib/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('lib/css/bootstrap-responsive.min.css') }}" rel="stylesheet">
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600"
        rel="stylesheet">
<link href="{{ asset('lib/css/font-awesome.css') }}" rel="stylesheet">
<link href="{{ asset('lib/css/style.css') }}" rel="stylesheet">
<link href="{{ asset('lib/css/pages/dashboard.css') }}" rel="stylesheet">


<link href="{{ asset('lib/css/pages/signin.css') }}" rel="stylesheet" type="text/css">

<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>
<div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container">
      <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
      <a class="brand" href="{{route('login')}}"> Eclosoft - Servicios </a>
      <div class="nav-collapse">
        <ul class="nav pull-right">
          @if (Auth::check())
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="icon-cog"></i> Account <b class="caret"></b>
              </a>
              <ul class="dropdown-menu">
                <li><a href="javascript:;">Settings</a></li>
                <li><a href="javascript:;">Help</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="icon-user"></i> {{ Auth::user()->email }} <b class="caret"></b>
              </a>
              <ul class="dropdown-menu">
                <li><a href="{{route('users.perfil')}}">Perfil</a></li>
                <li><a href="{{route('logout')}}">Salir</a></li>
              </ul>
            </li>
          @else
            <li class="">
              <a href="{{route('registro')}}" class="">
                No posees Cuenta?
              </a>
            </li>
          @endif
        </ul>
      </div>
      <!--/.nav-collapse -->
    </div>
    <!-- /container -->
  </div>
  <!-- /navbar-inner -->
</div>
<!-- /navbar -->
@if (Auth::check())

<div class="subnavbar">
  <div class="subnavbar-inner">
    <div class="container">
      <ul class="mainnav">
        <li class="@yield('ini')" ><a href="{{ route('inicio')}}"><i class="icon-dashboard"></i><span>Panel Principal</span> </a> </li>
        @if (Auth::user()->nivel === 'administrador')
          <li class="@yield('usu')" ><a href="{{ route('users.index') }}"><i class="icon-user"></i><span>Usuarios</span> </a> </li>
        @endif
        @if (Auth::user()->nivel === 'administrador')
          <li class="@yield('serv')" ><a href="{{ route('servicios.index') }}"><i class="icon-credit-card"></i><span>Servicios</span> </a></li>
        @endif
        @if (Auth::user()->nivel === 'tecnico')
          <li class="@yield('serv')" ><a href="{{ route('servicios.index') }}"><i class="icon-credit-card"></i><span>Servicios</span> </a></li>
        @endif
        <li class="@yield('rep')" ><a href="reports.html"><i class="icon-list-alt"></i><span>Reportes</span> </a> </li>
        <li><a href="charts.html"><i class="icon-bar-chart"></i><span>Charts</span> </a> </li>
        <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-long-arrow-down"></i><span>Drops</span> <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="icons.html">Icons</a></li>
            <li><a href="faq.html">FAQ</a></li>
            <li><a href="pricing.html">Pricing Plans</a></li>
            <li><a href="login.html">Login</a></li>
            <li><a href="signup.html">Signup</a></li>
            <li><a href="error.html">404</a></li>
          </ul>
        </li>
      </ul>
    </div>
    <!-- /container -->
  </div>
  <!-- /subnavbar-inner -->
</div>
<!-- /subnavbar -->

@endif
@yield('content')

@if (Auth::check())
<div class="footer">
  <div class="footer-inner">
    <div class="container">
      <div class="row">
        <div class="span12"> &copy; 2015 - 2016 <a href="http://www.egrappler.com/">Eclosoft C.A.</a>. </div>
        <!-- /span12 -->
      </div>
      <!-- /row -->
    </div>
    <!-- /container -->
  </div>
  <!-- /footer-inner -->
</div>
<!-- /footer -->
@endif
<!-- Le javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="{{ asset('lib/js/jquery-1.7.2.min.js')}}"></script>
<script src="{{ asset('lib/js/excanvas.min.js')}}"></script>
<script src="{{ asset('lib/js/chart.min.js" type="text/javascript')}}"></script>
<script src="{{ asset('lib/js/bootstrap.js')}}"></script>
<script src="{{ asset('lib/js/base.js')}}"></script>

<script src="{{ asset('lib/js/signin.js')}}"></script>
</body>
</html>