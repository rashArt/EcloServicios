@extends('base')
@section('title', 'Panel Principal')

@section('content')

<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <div class="span6">
          <div class="widget widget-nopad">
            <div class="widget-header">
              <i class="icon-bar-chart"></i>
              <h3>Estadisticas del día</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <div class="widget big-stats-container">
                <div class="widget-content">
                  <h6 class="bigstats">Contador de registros totales realizados dentro del sistema de servicios de <a href="eclosoft.net" target="_BLANK">Eclosoft C.A.</a></h6>
                  <div id="big_stats" class="cf">

                    <div class="stat"> <i class="icon-wrench"></i> <span class="value">2</span> </div>
                    <!-- .stat -->

                    <div class="stat"> <i class="icon-user"></i> <span class="value">3</span> </div>
                    <!-- .stat -->

                    <div class="stat"> <i class="icon-credit-card"></i> <span class="value">23</span> </div>
                    <!-- .stat -->

                    <div class="stat"> <i class="icon-refresh"></i> <span class="value">25</span> </div>
                    <!-- .stat -->

                  </div>
                </div>
                <!-- /widget-content -->
              </div>
            </div>
          </div>
          <!-- /widget -->
        </div>
        <!-- /span6 -->
        <div class="span6">
          <div class="widget">
            <div class="widget-header"> <i class="icon-sitemap"></i>
              <h3>Modulos</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <div class="shortcuts">
                <a href="{{ route('users.index') }}" class="shortcut">
                    <i class="shortcut-icon icon-user"></i>
                    <span class="shortcut-label">Usuarios</span>
                </a>
                <a href="{{ route('servicios.tipos.index') }}" class="shortcut">
                    <i class="shortcut-icon icon-list-alt"></i>
                    <span class="shortcut-label">Tipos de Servicios</span>
                </a>
                <a href="javascript:;" class="shortcut">
                    <i class="shortcut-icon icon-credit-card"></i>
                    <span class="shortcut-label">Registro de Servicios</span>
                </a>
                <a href="javascript:;" class="shortcut">
                    <i class="shortcut-icon icon-copy"></i>
                    <span class="shortcut-label">Reportes</span>
                </a>
                {{-- <a href="javascript:;" class="shortcut">
                    <i class="shortcut-icon icon-comment"></i>
                    <span class="shortcut-label">Comments</span>
                </a>
                <a href="javascript:;" class="shortcut">
                    <i class="shortcut-icon icon-file"></i>
                    <span class="shortcut-label">Notes</span>
                </a>
                <a href="javascript:;" class="shortcut">
                    <i class="shortcut-icon icon-picture"></i>
                    <span class="shortcut-label">Photos</span>
                </a>
                <a href="javascript:;" class="shortcut">
                    <i class="shortcut-icon icon-tag"></i>
                    <span class="shortcut-label">Tags</span>
                </a> --}}
              </div>
              <!-- /shortcuts -->
            </div>
            <!-- /widget-content -->
          </div>
          <!-- /widget -->
        </div>
        <!-- /span6 --> 
      </div>
      <!-- /row --> 
    </div>
    <!-- /container --> 
  </div>
  <!-- /main-inner --> 
</div>

@stop
