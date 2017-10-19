@extends('layouts.init')

@section('styles')
@endsection

@section('actual','Salidas del artículo')
@section('titulo','Salidas del artículo')
@section('detalle','seleccione un articulo e ingrese la cantidad correspondiente, luego presione en el botón adicionar')

@section('cuerpo')
    <div class="row">
        <div class="col-xs-12 col-sm-12">
            {!! Form::open(['route' => 'kardexout.store', 'method' => 'post']) !!}
            <div class="clearfix">
                    <div class="col-xs-12 col-sm-12">
                    <div class="row">
                        <table>
                            <tr>
                                <td width="90%"><label class="btn btn-warning btn-round">Nombre del Cliente Padre : <b>{{ strtoupper(Session::get('pcliente')) }}</b></label>
                                </td>
                                <td align="rigth">
                                    <a href="{{ url('/salida') }}" class="btn btn-primary btn-round"><i class="fa fa-user"></i> Nuevo Cliente Hijo(a)</a>
                                </td>
                            </tr>
                        </table><br>
                        <table class="btn btn-success btn-round" width="100%">
                            <tr>
                                <td width="60%">Nombre del Cliente Hijo(a) : <b>{{ strtoupper(Session::get('hcliente')) }}</b></td>
                                <td width="20%">NIT : <b>{{ Session::get('nit') }}</b></td>
                                <td width="20%">FACTURA NRO.: <b>{{ Session::get('factura') }}</b></td>
                            </tr>
                        </table>
                    </div>
                    </div>
            </div>
            <br>
            <div class="col-xs-12 col-sm-12">
                <div class="widget-box">
                    <div class="widget-header">
                        <h4 class="widget-title">Registrar salida del artículo</h4>
                        <span class="widget-toolbar">
                            <a href="#" data-action="settings">
                                <i class="ace-icon fa fa-cog"></i>
                            </a>
                            <a href="#" data-action="reload">
                                <i class="ace-icon fa fa-refresh"></i>
                            </a>
                            <a href="#" data-action="collapse">
                                <i class="ace-icon fa fa-chevron-up"></i>
                            </a>
                        </span>
                    </div>
                    <div class="widget-body">
                        <div class="widget-main">
                            <div class="row">
                                <div class="col-xs-12 col-sm-6">
                                    <div>
                                        {{ Form::label('idarticulo', 'Descripción del artículo') }}
                                        {{ Form::select('idarticulo', $articulo,null, ['class' => 'chosen-select form-control']) }}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-3">
                                    <div class="{{ $errors->has('mov_salida')?' has-error':'' }}">
                                        {{ Form::label('mov_salida', 'Cantidad') }}    
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="ace-icon fa fa-shopping-cart"></i>
                                            </span>
                                            {{ Form::number('mov_salida',null, ['class' => 'form-control']) }}
                                        </div>
                                        @if($errors->has('mov_salida'))
                                            <span style="color:red;">
                                                <strong>{{ $errors->first('mov_salida') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-3">
                                    <div>
                                        {{ Form::label('mov_op', 'Opción') }}
                                        <br>
                                        <button class="btn btn-primary btn-round" type="submit">
                                            <i class="ace-icon fa fa-save align-center"></i><b>Adicionar Artículo</b>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>  

            {!! Form::close() !!}
        </div>
    </div>
@endsection

@section('scripts')
@endsection