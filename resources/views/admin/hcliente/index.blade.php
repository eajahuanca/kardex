@extends('layouts.init')

@section('styles')
@endsection

@section('actual','Cliente Hijo')
@section('titulo','Datos del Cliente Hijo')
@section('detalle','en esta parte se observan los datos registrados de Clientes Hijos')

@section('cuerpo')
    <div class="row">
        <div class="col-xs-12">
            <div class="clearfix">
                <div class="pull-left">
                    <a class="btn btn-success btn-round" href="{{ route('hcliente.create') }}">
                        <i class="ace-icon fa fa-plus align-center"></i>
                        <b>Nuevo Cliente Hijo</b>
                    </a>
                </div>
                <div class="pull-right tableTools-container"></div>
            </div>
            <div class="table-header">
                Datos Registrados (Clientes Hijos)
            </div>
            <div>
                <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Cliente Padre</th>
                            <th>Nro. Carnet</th>
                            <th>Nombre del Cliente Hijo</th>
                            <th>NIT</th>
                            <th>Dirección y Contacto</th>
                            <th>Estado</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cliente as $item)
                        <tr>
                            <td>{{ $item->clientePadre->cli_nombre }}</td>
                            <td>{{ $item->cli_ci.' - '.$item->cli_exp }}</td>
                            <td>{{ $item->cli_nombre }}</td>
                            <td>{{ $item->cli_nit }}</td>
                            <td>{{ $item->cli_direccion.', Contacto: '.$item->cli_contacto }}</td>
                            <td>
                                @if($item->cli_estado)
                                    <span class="label label-sm label-warning">Activo</span>
                                @else
                                    <span class="label label-sm label-danger">Bloqueado</span>
                                @endif
                            </td>
                            <td>
                                <div class="hidden-sm hidden-xs action-buttons">
                                    <a class="blue tooltip-info" data-rel="tooltip" title="Ver" href="#">
                                        <i class="ace-icon fa fa-search-plus bigger-130"></i>
                                    </a>

                                    <a class="green tooltip-success" data-rel="tooltip" title="Editar" href="{{ route('hcliente.edit',$item->id) }}">
                                        <i class="ace-icon fa fa-pencil bigger-130"></i>
                                    </a>

                                    <a class="red" href="#">
                                        <i class="ace-icon fa fa-trash-o bigger-130"></i>
                                    </a>
                                </div>

                                <div class="hidden-md hidden-lg">
                                    <div class="inline pos-rel">
                                        <button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
                                            <i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
                                        </button>

                                        <ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
                                            <li>
                                                <a href="#" class="tooltip-info" data-rel="tooltip" title="View">
                                                    <span class="blue">
                                                        <i class="ace-icon fa fa-search-plus bigger-120"></i>
                                                    </span>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="#" class="tooltip-success" data-rel="tooltip" title="Edit">
                                                    <span class="green">
                                                        <i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
                                                    </span>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="#" class="tooltip-error" data-rel="tooltip" title="Delete">
                                                    <span class="red">
                                                        <i class="ace-icon fa fa-trash-o bigger-120"></i>
                                                    </span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('plugin/assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugin/assets/js/jquery.dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('plugin/assets/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('plugin/assets/js/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('plugin/assets/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('plugin/assets/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('plugin/assets/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('plugin/assets/js/dataTables.select.min.js') }}"></script>
    @include('admin.scriptDataTable')
@endsection
