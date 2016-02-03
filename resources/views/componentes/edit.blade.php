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
              <li class="active"> Componentes</li>
            </ol>
          </section>

          @include('flash::message')

          <div class="widget ">
            <div class="widget-header">
                <i class="icon-user"></i>
                <h3>Agregar componentes al servicio</h3>
            </div> <!-- /widget-header -->
            <div class="widget-content">
              {!! Form::open(['route' => 'servicio.componentes.store', 'method' => 'POST', 'class' => 'form-horizontal']) !!}
                <fieldset>
                  <div class="control-group">
                    <div class="controls">
                      {!! Form::hidden('servicio_id[]', $id, ['class' => 'span4']) !!}
                    </div> <!-- /controls -->
                  </div> <!-- /control-group -->
                  <div class="control-group">
                    {!! Form::label('nombre', 'Nombre', ['class' => 'control-label']) !!}
                    <div class="controls">
                      {!! Form::text('nombre', null, ['class' => 'span4']) !!}
                    </div> <!-- /controls -->
                  </div> <!-- /control-group -->
                  <div class="control-group">
                    {!! Form::label('descripcion', 'descripcion o condicion actual del componente', ['class' => 'control-label']) !!}
                    <div class="controls">
                      {!! Form::text('descripcion', null, ['class' => 'span8']) !!}
                    </div> <!-- /controls -->
                  </div> <!-- /control-group -->
                  <div class="control-group">
                    {!! Form::label('serial', 'Numero de Serie o codigo', ['class' => 'control-label']) !!}
                    <div class="controls">
                      {!! Form::text('serial', null, ['class' => 'span4']) !!}
                    </div> <!-- /controls -->
                  </div> <!-- /control-group -->
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
                  <div>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <button type="reset" class="btn">Cancelar</button>
                  </div> <!-- /form-actions -->
                </fieldset>


            </div>
          </div>
        </div> <!-- /span12 -->
      </div> <!-- /row -->
    </div> <!-- /container -->
  </div> <!-- /main-inner -->
</div> <!-- /main -->

@stop