@extends('base')
@section('title', 'Usuarios')
@section('usu', 'active')

@section('content')

<div class="main">
    <div class="main-inner">
        <div class="container alto">
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
                                        <tr>
                                          <td>Cédula</td><td>{{ $user->cedula }}</td>
                                        </tr>
                                        <tr>
                                          <td>Correo Electrónico</td><td>{{ $user->email }}</td>
                                        </tr>
                                        <tr>
                                          <td>Teléfono</td><td>{{ $user->telefono }}</td>
                                        </tr>
                                        <tr>
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
                                            <button type="button" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#del{!!$user->id!!}"><i class="icon-trash"></i></button>
                                          </td>
                                        </tr>
                                        <!-- Modal -->
                                        <div class="modal fade" id="del{!!$user->id!!}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                          <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title" id="myModalLabel">Desea Eliminar?</h4>
                                              </div>
                                              <div class="modal-body">
                                                Se eliminará de forma permanente
                                              </div>
                                              <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                                <a href="{{ route('users.destroy', $user->id) }}" class="btn btn-danger">Eliminar <i class="icon-trash"></i></a>
                                              </div>
                                            </div>
                                          </div>
                                        </div> <!-- / Modal -->
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