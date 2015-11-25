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
              <li><a href="{{ route('users.index') }}"><i class="fa fa-dashboard"></i> Usuarios</a></li>
              <li class="active"> Crear</li>
            </ol>
          </section>

          <div class="widget ">
            <div class="widget-header">
                <i class="icon-user"></i>
                <h3>Registro de Usuarios</h3>
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
                {!! Form::open(['route' => 'users.store', 'method' => 'POST', 'class' => 'form-horizontal']) !!}
                  <fieldset>
                    <div class="control-group">
                      {!! Form::label('nombre', 'Nombre', ['class' => 'control-label']) !!}
                      <div class="controls">
                        {!! Form::text('nombre', null, ['class' => 'span6']) !!}
                      </div> <!-- /controls -->
                    </div> <!-- /control-group -->
                    <div class="control-group">
                      {!! Form::label('apellido', 'Apellido', ['class' => 'control-label']) !!}
                      <div class="controls">
                        {!! Form::text('apellido', null, ['class' => 'span6']) !!}
                      </div> <!-- /controls -->
                    </div> <!-- /control-group -->
                    <div class="control-group">
                      {!! Form::label('cedula', 'Cedula', ['class' => 'control-label']) !!}
                      <div class="controls">
                        {!! Form::text('cedula', null, ['class' => 'span6']) !!}
                      </div> <!-- /controls -->
                    </div> <!-- /control-group -->
                    <div class="control-group">
                      {!! Form::label('telefono', 'Telefono', ['class' => 'control-label']) !!}
                      <div class="controls">
                        {!! Form::text('telefono', null, ['class' => 'span6']) !!}
                      </div> <!-- /controls -->
                    </div> <!-- /control-group -->
                    <div class="control-group">
                      {!! Form::label('email', 'Correo Electronico', ['class' => 'control-label']) !!}
                      <div class="controls">
                        {!! Form::email('email', null, ['class' => 'span6']) !!}
                      </div> <!-- /controls -->
                    </div> <!-- /control-group -->
                    <div class="control-group">
                      {!! Form::label('password', 'Contraseña', ['class' => 'control-label']) !!}
                      <div class="controls">
                        {!! Form::password('password', ['class' => 'span6']) !!}
                      </div> <!-- /controls -->
                    </div> <!-- /control-group -->
                    <div class="control-group">
                      {!! Form::label('nivel', 'Nivel de usuario', ['class' => 'control-label']) !!}
                      <div class="controls">
                        {!! Form::select('nivel', ['cliente'=>'cliente', 'tecnico'=>'tecnico', 'administrador'=>'administrador'],null, ['class' => 'span6']) !!}
                      </div> <!-- /controls -->
                    </div> <!-- /control-group -->
                    <div class="control-group">
                      {!! Form::label('nivel', 'Nivel de usuario', ['class' => 'control-label']) !!}
                      <div class="controls">
                        {!! Form::select('status', ['1'=>'activo', '2'=>'inactivo'],null, ['class' => 'span6']) !!}
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