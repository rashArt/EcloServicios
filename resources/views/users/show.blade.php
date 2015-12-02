@extends('base')
@section('title', 'Usuarios')
@section('usu', 'active')

@section('content')

<div class="main">
    <div class="main-inner">
        <div class="container">
            <div class="row">
                <div class="span12">

                <section class="content-header">
                  <ol class="breadcrumb">
                    <li><a href="{{ route('inicio') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
                    <li class="active">Usuarios</li>
                  </ol>
                </section>

                @include('flash::message')

                    <div class="widget ">
                        <div class="widget-header">
                            <i class="icon-user"></i>
                            <h3>Ver Usuario</h3>
                        </div> <!-- /widget-header -->
                        <div class="widget-content">
                            <div class="table-responsive">
                                <table class="table table-hover table-condensed">
                                    <tbody>
                                      <tr>
                                        <td>Numero de Usuario</td><td><strong>{{ $user->id }}</strong></td>
                                      </tr>
                                        <tr>
                                          <td>Nombres</td><td>{{ $user->nombre }} {{ $user->apellido }}</td>
                                        </tr>
                                          <td>Cédula</td><td>{{ $user->cedula }}</td>
                                        </tr>
                                          <td>Correo Electrónico</td><td>{{ $user->email }}</td>
                                        </tr>
                                          <td>Teléfono</td><td>{{ $user->telefono }}</td>
                                        </tr>
                                          <td>Nivel de Usuario</td><td>
                                            @if($user->nivel == 'cliente')
                                              <div class="badge">Cliente</div>

                                            @elseif($user->nivel == 'tecnico')
                                              <div class="badge badge-info">Tecnico</div>
                                            @else
                                              <div class="badge badge-success">Administrador</div>
                                            @endif
                                          </td>
                                        </tr>
                                        @if (Auth::user()->nivel === 'administrador')
                                          <tr>
                                          <td>Editar</td>
                                          <td>
                                              <a href="{{ URL::to('users/' . $user->id . '/edit') }}" class="btn btn-primary"><i class="icon-edit"></i></a>
                                          </td>
                                        </tr>
                                        <tr>
                                          <td>Eliminar</td>
                                          <td>
                                              <a href="{{ route('users.destroy', $user->id) }}" class="btn btn-danger"><i class="icon-trash"></i></a>
                                          </td>
                                        </tr>
                                      @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div> <!-- /span12 -->
            </div> <!-- /row -->
        </div> <!-- /container -->
    </div> <!-- /main-inner -->
</div> <!-- /main -->

@stop