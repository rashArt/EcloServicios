@extends('base')
@section('title', 'Servicios')
@section('des', 'active')
@section('content')

<div class="main">
  <div class="main-inner">
    <div class="container alto">
      <div class="row">
        <div class="span12">

          <section class="content-header">
            <ol class="breadcrumb">
              <li><a href="{{ route('inicio') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
              <li><a href="{{ route('servicios.index') }}"><i class="fa fa-dashboard"></i> Servicios</a></li>
              <li class="active"> Nuevo</li>
            </ol>
          </section>

          <div class="widget-content">
            <div class="pricing-plans plans-4">
              <div class="plan-container">
                <div class="plan">
                  <div class="plan-header">
                    <div class="plan-title">
                      Total Clientes
                    </div> <!-- /plan-title -->
                    <div class="plan-price">
                      {{ $clientes }}<span class="term">Registrados</span>
                    </div> <!-- /plan-price -->
                  </div> <!-- /plan-header -->                  <div class="plan-actions">
                    <a href="{{ route('descargas.clientes') }}" class="btn" target="_BLANK">Descargar Listado</a>
                  </div> <!-- /plan-actions -->
                </div> <!-- /plan -->
              </div> <!-- /plan-container -->
              <div class="plan-container">
                <div class="plan blue">
                  <div class="plan-header">
                    <div class="plan-title">
                      Total Tecnicos
                    </div> <!-- /plan-title -->
                    <div class="plan-price">
                      {{ $tecnicos }}<span class="term">Registrados</span>
                    </div> <!-- /plan-price -->
                  </div> <!-- /plan-header -->
                  <div class="plan-actions">
                    <a href="{{ route('descargas.tecnicos') }}" class="btn" target="_BLANK">Descargar Listado</a>
                  </div> <!-- /plan-actions -->
                </div> <!-- /plan -->
              </div> <!-- /plan-container -->
              <div class="plan-container">
                <div class="plan green">
                  <div class="plan-header">
                    <div class="plan-title">
                      Total Administradores
                    </div> <!-- /plan-title -->
                    <div class="plan-price">
                      {{ $admin }}<span class="term">Registrados</span>
                    </div> <!-- /plan-price -->
                  </div> <!-- /plan-header -->
                  <div class="plan-actions">
                    <a href="{{ route('descargas.administradores') }}" class="btn" target="_BLANK">Descargar Listado</a>
                  </div> <!-- /plan-actions -->
                </div> <!-- /plan -->
              </div> <!-- /plan-container -->
              <div class="plan-container">
                <div class="plan purple">
                  <div class="plan-header">
                    <div class="plan-title">
                      Servicios Ofrecidos
                    </div> <!-- /plan-title -->
                    <div class="plan-price">
                      {{ $tipos }}<span class="term">Registrados</span>
                    </div> <!-- /plan-price -->
                  </div> <!-- /plan-header -->
                  <div class="plan-actions">
                    <a href="{{ route('descargas.serviciosTipo') }}" class="btn" target="_BLANK">Descargar Listado</a>
                  </div> <!-- /plan-actions -->
                </div> <!-- /plan -->
              </div> <!-- /plan-container -->
            </div> <!-- /pricing-plans -->

          </div> <!-- /widget-content -->

        </div> <!-- /span12 -->
      </div> <!-- /row -->
    </div> <!-- /container -->
  </div> <!-- /main-inner -->
</div> <!-- /main -->

@stop