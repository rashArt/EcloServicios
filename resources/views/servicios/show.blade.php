@extends('base')
@section('title', 'Servicios')
@section('serv', 'active')
@section('content')

<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <div class="span12">

          <section class="content-header">
            <ol class="breadcrumb">
              <li><a href="{{ route('inicio') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
              <li><a href="{{ route('servicios.index') }}"><i class="fa fa-dashboard"></i> Servicios</a></li>
              <li class="active"> Visualizar</li>
            </ol>
          </section>

          <div class="widget ">
            <div class="widget-header">
                <i class="icon-user"></i>
                <h3>Visualización de Servicios</h3>
            </div> <!-- /widget-header -->
            <div class="widget-content">
              <div class="text-center">
                <a href="{{ URL::to('/descargas/servicio/' . $servicio->id) }}" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Imprimir" target="_BLANK"><i class="icon-download-alt"></i> Informe</a>
                @if (Auth::user()->nivel === 'tecnico')
                  <a href="{{URL::to('servicios/' . $servicio->id . '/edit')}}" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Imprimir"><i class="icon-download-alt"></i> Actualizar</a>
                @endif
              </div>
              <br>
              <table class="table table-condensed table-hover">
                <thead>
                  <tr>
                    <th>Tecnico</th>
                    <th>Tipo de Servicio</th>
                    <th>Registrado</th>
                    <th>Actualizado</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>{{ $tecnico->nombre }} {{ $tecnico->apellido }}</td>
                    <td>{{ $servicio->tipo->nombre }}</td>
                    <td>{{ $servicio->created_at }}</td>
                    <td>{{ $servicio->updated_at->diffForHumans() }}</td>
                  </tr>
                </tbody>
              </table>
              <h4>
                El estado de su servicio se encuentra actualmente
                @if ($servicio->status == 1)
                  <span class="text-warning">Solicitado</span>
                @elseif ($servicio->status == 2)
                  <span class="text-primary">Procesando</span>
                @else
                  <span class="text-success">Finalizado</span>
                @endif
              </h4>

              <h6 class="page-header">
                Las imagenes a continuación muestran cada uno de los procesos realizados a nuetros servicios
              </h6>

              <div class="row">
                <div class="span3">
                    <?php
                      $img1 = 'imagenes/servicios/servicio_0'.$servicio->id.'_img1.jpg';
                    ?>
                    @if (file_exists($img1))
                      <div class="thumbnail">
                        <img class="img-responsive" src="{{ asset('/imagenes/servicios/servicio_0'.$servicio->id.'_img1.jpg') }}" >
                      </div>
                      <p>Servicio Solicitado</p>
                    @else
                      <div class="thumbnail">
                        <img class="img-responsive" src="{{ asset('/imagenes/no_disponible.jpg') }}">
                      </div>
                      <p>No ha sido cargada una imagen del servicio solicitado</p>
                    @endif
                </div>
                <div class="span3">
                    <?php
                      $img1 = 'imagenes/servicios/servicio_0'.$servicio->id.'_img2.jpg';
                    ?>
                    @if (file_exists($img1))
                      <div class="thumbnail">
                        <img class="img-responsive" src="{{ asset('/imagenes/servicios/servicio_0'.$servicio->id.'_img2.jpg') }}" >
                      </div>
                      <p>Servicio Solicitado</p>
                    @else
                      <div class="thumbnail">
                        <img class="img-responsive" src="{{ asset('/imagenes/no_disponible.jpg') }}">
                      </div>
                      <p>No ha sido cargada una imagen durante el proceso</p>
                    @endif
                </div><div class="span3">
                    <?php
                      $img1 = 'imagenes/servicios/servicio_0'.$servicio->id.'_img3.jpg';
                    ?>
                    @if (file_exists($img1))
                      <div class="thumbnail">
                        <img class="img-responsive" src="{{ asset('/imagenes/servicios/servicio_0'.$servicio->id.'_img3.jpg') }}" >
                      </div>
                      <p>Servicio Solicitado</p>
                    @else
                      <div class="thumbnail">
                        <img class="img-responsive" src="{{ asset('/imagenes/no_disponible.jpg') }}">
                      </div>
                      <p>No ha sido cargada una imagen al finalizar el servicio</p>
                    @endif
                </div>
              </div>
            </div>
          </div>
        </div> <!-- /span12 -->
      </div> <!-- /row -->
    </div> <!-- /container -->
  </div> <!-- /main-inner -->
</div> <!-- /main -->

@stop