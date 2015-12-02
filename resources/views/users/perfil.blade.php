@extends('base')
@section('title', 'Usuarios')
@section('content')

<div class="main">
  <div class="main-inner">
    <div class="container alto">
      <div class="row">
        <div class="span12">

          <section class="content-header">
            <ol class="breadcrumb">
              <li><a href="{{ route('inicio') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
              <li><a href="{{ route('users.index') }}"><i class="fa fa-dashboard"></i> Usuarios</a></li>
              <li class="active"> Editar</li>
            </ol>
          </section>

          @include('flash::message')

          <div class="widget">
            <div class="widget-header">
                <i class="icon-user"></i>
                <h3>Perfil del Usuario</h3>
            </div> <!-- /widget-header -->
            <div class="widget-content">
              <div class="tabbable">
                <ul class="nav nav-tabs">
                  <li class="active">
                    <a href="#ver" data-toggle="tab">Ver Perfil</a>
                  </li>
                  <li>
                    <a href="#editar" data-toggle="tab">Editar Perfil</a>
                  </li>
                </ul>

                <div class="tab-content">
                  <div class="tab-pane active" id="ver">
                    <table class="table table-condensed table-hover">
                      <thead>
                        <tr>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td></td>
                          <td></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <div class="tab-pane" id="editar">
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
                    {!! Form::model($usuario, array('route' => array('users.update', $usuario->id), 'method' => 'PUT', 'class' => 'form-horizontal')) !!}
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
                        @if (Auth::user()->nivel === 'administrador')
                          <div class="control-group">
                            {!! Form::label('cedula', 'Cedula', ['class' => 'control-label']) !!}
                            <div class="controls">
                              {!! Form::text('cedula', null, ['class' => 'span6']) !!}
                            </div> <!-- /controls -->
                          </div> <!-- /control-group -->
                          <div class="control-group">
                            {!! Form::label('nivel', 'Nivel de usuario', ['class' => 'control-label']) !!}
                            <div class="controls">
                              {!! Form::select('nivel', ['cliente'=>'cliente', 'tecnico'=>'tecnico', 'administrador'=>'administrador'],null, ['class' => 'span6']) !!}
                            </div> <!-- /controls -->
                          </div> <!-- /control-group -->
                          <div class="control-group">
                            {!! Form::label('nivel', 'Estado de usuario', ['class' => 'control-label']) !!}
                            <div class="controls">
                              {!! Form::select('status', ['1'=>'activo', '2'=>'inactivo'],null, ['class' => 'span6']) !!}
                            </div> <!-- /controls -->
                          </div> <!-- /control-group -->
                        @endif


                        <div>
                          <button type="submit" class="btn btn-primary">Guardar</button>
                          <button type="reset" class="btn">Cancelar</button>
                        </div> <!-- /form-actions -->
                      </fieldset>
                    {!! Form::close() !!}
                  </div>
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