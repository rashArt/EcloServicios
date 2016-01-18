@extends('base')
@section('title', 'Servicios')
@section('serv', 'active')
@section('content')

<div class="main">
  <div class="main-inner">
    <div class="container alto">
      <div class="row">
        <div class="span12">

          <section class="content-header">
            <ol class="breadcrumb">
              <li><a href="{{ route('inicio') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
              <li><a href="{{ route('cliente.crear_servicio') }}"><i class="fa fa-dashboard"></i> Servicios</a></li>
              <li class="active"> Nuevo</li>
            </ol>
          </section>
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

          <div class="widget ">
            <div class="widget-header">
                <i class="icon-user"></i>
                <h3>Registro de Servicios</h3>
            </div> <!-- /widget-header -->
            <div class="widget-content">
                {!! Form::open(['route' => 'servicio.guardar', 'method' => 'POST', 'class' => 'form-horizontal']) !!}
                  <fieldset>
                    <div class="control-group">
                      {!! Form::label('tipo_id', 'Tipo de Servicio', ['class' => 'control-label']) !!}
                      <div class="controls">
                        {!! Form::select('tipo_id', $tipo, null,['class' => 'span6']) !!}
                      </div> <!-- /controls -->
                    </div> <!-- /control-group -->
                    <div class="control-group">
                      {!! Form::label('cliente_id', 'Seleccione el Cliente', ['class' => 'control-label']) !!}
                      <div class="controls">
                        {!! Form::select('cliente_id', $cliente, null,['class' => 'span6']) !!}
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

                    <div>
                      <button type="submit" class="btn btn-primary">Guardar</button>
                      <button type="reset" class="btn">Cancelar</button>
                    </div> <!-- /form-actions -->
                  </fieldset>
                {!! Form::close() !!}

            </div>
          </div>
        </div> <!-- /span12 -->
      </div> <!-- /row -->
    </div> <!-- /container -->
  </div> <!-- /main-inner -->
</div> <!-- /main -->

@stop