@extends('layouts.init')

@section('styles')
@endsection

@section('actual','Salidas del artículo')
@section('titulo','Salidas del artículo')
@section('detalle','seleccione un cliente hijo e ingrese el nro. de factura correspondiente')

@section('cuerpo')
    <div class="row">
        <div class="col-xs-12 col-sm-12">
            {!! Form::open(['route' => 'salida.store', 'method' => 'post']) !!}
            <div class="clearfix">
                <div class="pull-left">
                    <button class="btn btn-primary btn-round" type="submit">
                        <i class="ace-icon fa fa-shopping-cart align-center"></i>
                        <b>Seleccionar Articulos</b>
                    </button>
                </div>
            </div>
            <br>
            <div class="col-xs-12 col-sm-12">
                <div class="widget-box">
                    <div class="widget-header">
                        <h4 class="widget-title">Seleccionar Cliente Hijo(a)</h4>
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
                                <div class="col-xs-12 col-sm-4">
                                    <div class="{{ $errors->has('mov_factura')?' has-error':'' }}">
                                        {{ Form::label('mov_factura', 'Nro. Factura') }}    
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="ace-icon fa fa-bars"></i>
                                            </span>
                                            {{ Form::number('mov_factura',null, ['class' => 'form-control']) }}
                                        </div>
                                        @if($errors->has('mov_factura'))
                                            <span style="color:red;">
                                                <strong>{{ $errors->first('mov_factura') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-xs-12 col-sm-8">
                                    <div>
                                        {{ Form::label('idhcliente', 'Nombre del Cliente') }}
                                        {{ Form::select('idhcliente', $cliente,null, ['class' => 'chosen-select form-control']) }}
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