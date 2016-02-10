@extends('base')
@section('title', 'Servicios')

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

                @include('flash::message')

                    <div class="widget ">
                        <div class="widget-header">
                            <i class="icon-user"></i>
                            <h3>Listado de Servicios</h3>
                        </div> <!-- /widget-header -->
                        <div class="widget-content">
                            <div class="text-right"><a href="{{ route('servicios.tipos.create') }}" class="btn btn-primary"><span class="icon-plus"></span> Agregar Tipo</a></div>
                            <hr>
                            <div class="table-responsive">
                                <table class="table table-hover table-condensed">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th><i class="icon-edit"></i></th>
                                            <th><i class="icon-trash"></i></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($tipo as $tipo)
                                        <tr>
                                            <td>{{ $tipo->nombre }}</td>
                                            <td>
                                                <a href="{{ URL::to('servicios/tipos/' . $tipo->id . '/edit') }}" class="btn btn-primary"><i class="icon-edit"></i></a>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#del{!!$tipo->id!!}"><i class="icon-trash"></i></button>
                                            </td>
                                        </tr>
                                        <!-- Modal -->
                                        <div class="modal fade" id="del{!!$tipo->id!!}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
                                                <a href="{{ URL::to('servicios/tipos/' . $tipo->id . '/destroy') }}" class="btn btn-danger">Eliminar <i class="icon-trash"></i></a>
                                              </div>
                                            </div>
                                          </div>
                                        </div> <!-- / Modal -->
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