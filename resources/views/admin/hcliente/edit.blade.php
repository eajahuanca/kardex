@extends('layouts.init')

@section('styles')
@endsection

@section('actual','Cliente Hijo')
@section('titulo','Actualizar datos de Cliente Hijo(a)')
@section('detalle','en esta seccion se visualiza el formulario de actualización del Cliente Hijo(a)')

@section('cuerpo')
    <div class="row">
        <div class="col-xs-12 col-sm-12">
            {!! Form::model($cliente,['route' => ['hcliente.update',$cliente->id], 'method' => 'put']) !!}

            <div class="clearfix">
                <div class="pull-left">
                    <button class="btn btn-primary btn-round" type="submit">
                        <i class="ace-icon fa fa-edit align-center"></i>
                        <b>Actualizar</b>
                    </button>
                    <a class="btn btn-danger btn-round" href="{{ route('hcliente.index') }}">
                        <i class="ace-icon fa fa-exchange align-center"></i>
                        <b>Cancelar</b>
                    </a>
                </div>
            </div>
            <br>
            <div class="col-xs-12 col-sm-12">
                <div class="widget-box">
                    <div class="widget-header">
                        <h4 class="widget-title">Datos a Actualizar (Clientes Hijos)</h4>
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
                        @include('admin.hcliente.form')
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