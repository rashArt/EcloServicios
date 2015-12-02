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
              <li class="active"> Actualizar</li>
            </ol>
          </section>

          <div class="widget ">
            <div class="widget-header">
                <i class="icon-user"></i>
                <h3>Actualización de Servicios</h3>
            </div> <!-- /widget-header -->
            <div class="widget-content">
                @if (count($errors) > 0)
                  <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <ul>
                        @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                        @endforeach
                      </ul>
                  </div>
                @endif
                {!! Form::model($servicio, array('route' => array('servicios.update', $servicio->id), 'method' => 'PUT', 'files' => true, 'class' => 'form-horizontal')) !!}
                  <fieldset>
                    <p>
                      Servicio Solicitado por el Usuario:
                      <a href="{{ URL::to('users/' . $cliente->id ) }}">
                        <strong> Cliente-0{{ $servicio->cliente_id }}</strong>
                      </a>
                      <small> {{ $cliente->apellido }} {{$cliente->nombre}}</small>
                    </p>
                    <div class="control-group">
                      {!! Form::label('tipo_id', 'Tipo de Servicio', ['class' => 'control-label']) !!}
                      <div class="controls">
                        {!! Form::select('tipo_id', $tipo, null,['class' => 'span6']) !!}
                      </div> <!-- /controls -->
                    </div> <!-- /control-group -->
                    <div class="control-group">
                      {!! Form::label('tecnico_id', 'Seleccione el Tecnico', ['class' => 'control-label']) !!}
                      <div class="controls">
                        {!! Form::select('tecnico_id', $tecnico, null,['class' => 'span6']) !!}
                      </div> <!-- /controls -->
                    </div> <!-- /control-group -->
                    <div class="control-group">
                      {!! Form::label('razon', 'Razon del servicio', ['class' => 'control-label']) !!}
                      <div class="controls">
                        {!! Form::text('razon', null, ['class' => 'span6']) !!}
                      </div> <!-- /controls -->
                    </div> <!-- /control-group -->
                    <div class="control-group">
                      {!! Form::label('status', 'Seleccione el Estado del Servicio', ['class' => 'control-label']) !!}
                      <div class="controls">
                        {!! Form::radio('status', '1') !!}
                        <p class="text-warning"><strong>Solicitado</strong></p>
                      </div> <!-- /controls -->
                      <div class="controls">
                        {!! Form::radio('status', '2') !!}
                        <p class="text-primary"><strong>Procesado</strong></p>
                      </div> <!-- /controls -->
                      <div class="controls">
                        {!! Form::radio('status', '3') !!}
                        <p class="text-success"><strong>Finalizado</strong></p>
                      </div> <!-- /controls -->
                    </div> <!-- /control-group -->
                    <div class="control-group">
                      {!! Form::label('img1', 'Imagen de solicitud', ['class' => 'control-label']) !!}
                      <div class="controls">
                        {!! Form::file('img1'); !!}
                      </div>
                    </div>
                    <div class="control-group">
                      {!! Form::label('img2', 'Imagen del proceso', ['class' => 'control-label']) !!}
                      <div class="controls">
                        {!! Form::file('img2'); !!}
                      </div>
                    </div>
                    <div class="control-group">
                      {!! Form::label('img3', 'Imagen al finalizar', ['class' => 'control-label']) !!}
                      <div class="controls">
                        {!! Form::file('img3'); !!}
                      </div>
                    </div>

                    <div>
                      <button type="submit" class="btn btn-primary">Guardar</button>
                      <button type="reset" class="btn">Cancelar</button>
                    </div> <!-- /form-actions -->
                  </fieldset>
                {!! Form::close() !!}

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