@extends('base')
@section('title', 'Usuarios')
@section('content')

<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <div class="span12">

          <section class="content-header">
            <ol class="breadcrumb">
              <li><a href="{{ route('inicio') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
              <li><a href="{{ route('servicios.tipos.index') }}"><i class="fa fa-dashboard"></i> Servicios</a></li>
              <li class="active"> Tipos</li>
            </ol>
          </section>

          <div class="widget ">
            <div class="widget-header">
                <i class="icon-user"></i>
                <h3>Registro de Tipo de Servicios</h3>
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
                {!! Form::open(['route' => 'servicios.tipos.store', 'method' => 'POST', 'class' => 'form-horizontal']) !!}
                  <fieldset>
                    <div class="control-group">
                      {!! Form::label('nombre', 'Nombre', ['class' => 'control-label']) !!}
                      <div class="controls">
                        {!! Form::text('nombre', null, ['class' => 'span6']) !!}
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