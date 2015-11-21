@extends('base')
@section('title', 'Usuarios')

@section('content')

<div class="main">
    <div class="main-inner">
        <div class="container">
            <div class="row">
                <div class="span12">

                    <div class="widget ">
                        <div class="widget-header">
                            <i class="icon-user"></i>
                            <h3>Listado de Usuarios</h3>
                        </div> <!-- /widget-header -->
                        <div class="widget-content">
                            <div class="table-responsive">
                                <table class="table table-hover table-condensed">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nombre y Apellido</th>
                                            <th>Cedula</th>
                                            <th>Correo</th>
                                            <th>Telefono</th>
                                            <th>Nivel</th>
                                            <th><i class="icon-edit"></i></th>
                                            <th><i class="icon-trash"></i></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($usuario as $user)
                                        <tr>
                                            <td>{{ $user->id }}</td>
                                            <td>{{ $user->nombre }} {{ $user->apellido }}</td>
                                            <td>{{ $user->cedula }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->telefono }}</td>
                                            <td>
                                                @if($user->nivel = 'cliente')
                                                  <div class="badge">Cliente</div>

                                                @elseif($user->nivel = 'tecnico')
                                                  <div class="badge badge-info">Tecnico</div>
                                                @else
                                                  <div class="badge badge-success">Administrador</div>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ URL::to('users/' . $user->id . '/edit') }}" class="btn btn-primary"><i class="icon-edit"></i></a>
                                            </td>
                                            <td>
                                                <a href="{{ route('users.destroy', $user->id) }}" class="btn btn-danger"><i class="icon-trash"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
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