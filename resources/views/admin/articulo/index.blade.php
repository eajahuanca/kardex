@extends('layouts.init')

@section('styles')
@endsection

@section('actual','Articulos')
@section('titulo','Datos del Articulo')
@section('detalle','en esta parte se observan los datos registrados de los articulos')

@section('cuerpo')
    <div class="row">
        <div class="col-xs-12">
            <div class="clearfix">
                <div class="pull-left">
                    <a class="btn btn-success btn-round" href="{{ route('articulo.create') }}">
                        <i class="ace-icon fa fa-plus align-center"></i>
                        <b>Nuevo Articulo</b>
                    </a>
                </div>
                <div class="pull-right tableTools-container"></div>
            </div>
            <div class="table-header">
                Datos Registrados (Articulos)
            </div>
            <div>
                <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th class="center">
                                <label class="pos-rel">
                                    <input type="checkbox" class="ace" />
                                    <span class="lbl"></span>
                                </label>
                            </th>
                            <th>Código</th>
                            <th>Descripción del Articulo</th>
                            <th>Unidad</th>
                            <th>Proveedor</th>
                            <th>Estado</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($articulo as $item)
                        <tr>
                            <td class="center">
                                <label class="pos-rel">
                                    <input type="checkbox" class="ace" id="{{ $item->art_codigo }}"/>
                                    <span class="lbl"></span>
                                </label>
                            </td>
                            <td>{{ $item->art_codigo }}</td>
                            <td>{{ $item->art_descripcion }}</td>
                            <td>{{ $item->art_unidad }}</td>
                            <td>{{ $item->proveedors->pro_nombre }}</td>
                            <td>
                                @if($item->art_estado)
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

                                    <a class="green tooltip-success" data-rel="tooltip" title="Editar" href="{{ route('articulo.edit',$item->id) }}">
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
