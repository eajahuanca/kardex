@extends('layouts.init')

@section('styles')
@endsection

@section('actual','Entrada del artículo')
@section('titulo','Entrada del artículo')
@section('detalle','seleccione un articulo e ingrese la cantidad correspondiente, luego presione el botón adicionar')

@section('cuerpo')
    <div class="row">
        <div class="col-xs-12 col-sm-12">
            {!! Form::open(['route' => 'kardexin.store', 'method' => 'post']) !!}
            <div class="clearfix">
                    <div class="pull-right">
                        <a href="{{ route('articulo.create') }}" class="btn btn-warning btn-round"><i class="fa fa-shopping-cart"></i> Nuevo Artículo</a>
                    </div>
            </div>
            <br>
            <div class="col-xs-12 col-sm-12">
                <div class="widget-box">
                    <div class="widget-header">
                        <h4 class="widget-title">Registrar entrada del artículo</h4>
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
                                    <div class="{{ $errors->has('mov_entrada')?' has-error':'' }}">
                                        {{ Form::label('mov_entrada', 'Cantidad') }}    
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="ace-icon fa fa-shopping-cart"></i>
                                            </span>
                                            {{ Form::number('mov_entrada',null, ['class' => 'form-control']) }}
                                        </div>
                                        @if($errors->has('mov_entrada'))
                                            <span style="color:red;">
                                                <strong>{{ $errors->first('mov_entrada') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-xs-12 col-sm-9">
                                    <div class="{{ $errors->has('mov_obs')?' has-error':'' }}">
                                        {{ Form::label('mov_obs', 'Observaciones') }}
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="ace-icon fa fa-bars"></i>
                                            </span>
                                            {{ Form::text('mov_obs',null, ['class' => 'form-control']) }}
                                        </div>
                                        @if($errors->has('mov_obs'))
                                            <span style="color:red;">
                                                <strong>{{ $errors->first('mov_obs') }}</strong>
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