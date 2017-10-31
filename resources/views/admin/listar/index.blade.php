@extends('layouts.init')

@section('styles')
@endsection

@section('actual','Listar Kardex')
@section('titulo','Kardex')
@section('detalle','en esta parte se observan los articulos registrados en kardex')

@section('cuerpo')
    <div class="row">
        <div class="col-xs-12">
            <div class="clearfix">
                <div class="pull-right tableTools-container"></div>
            </div>
            <div class="table-header">
                Articulos en movimiento (Kardex)
            </div>
            <div>
                <?php $cont = 0; ?>
                <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Fecha</th>
                            <th>Cliente</th>
                            <th>Nro. Factura</th>
                            <th>Artículo</th>
                            <th>Entrada</th>
                            <th>Salida</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($kardex as $item)
                        <tr>
                            <td>{{ $item->created_at }}</td>
                            <td>{{ $item->hclientes->cli_nombre.', NIT: '.$item->hclientes->cli_nit }}</td>
                            <td align="center"><b>{{ $item->mov_factura }}</b></td>
                            <td>{{ $item->articulos->art_codigo.' - '.$item->articulos->art_descripcion }}</td>
                            <td style="color:green;text-align:right;"><b>{{ $item->mov_entrada }}</b></td>
                            <td style="color:red;text-align:right;"><b>{{ $item->mov_salida }}</b></td>
                            <td style="color:blue;text-align:right;"><b>{{ $item->mov_total }}</b></td>
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
