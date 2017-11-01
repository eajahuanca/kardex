@extends('layouts.init')

@section('styles')
@endsection

@section('actual','Usuario')
@section('titulo','Cambiar Contraseña de usuario')
@section('detalle','en esta seccion se visualiza el formulario para cambiar la contraseña')
@section('cuerpo')
    <div class="row">
        <div class="col-xs-12 col-sm-12">
            {!! Form::open(['url' => 'newp', 'method' => 'post']) !!}
            <div class="clearfix">
                <div class="pull-left">
                    <button class="btn btn-primary btn-round" type="submit">
                        <i class="ace-icon fa fa-save align-center"></i>
                        <b>Actualizar</b>
                    </button>
                    <a class="btn btn-danger btn-round" href="{{ url('/home') }}">
                        <i class="ace-icon fa fa-exchange align-center"></i>
                        <b>Cancelar</b>
                    </a>
                </div>
            </div>
            <br>
            <div class="col-xs-12 col-sm-12">
                <div class="widget-box">
                    <div class="widget-header">
                        <h4 class="widget-title">Contraseña a actualizar (Usuarios)</h4>
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
                                    <div class="form-group {{ $errors->has('password_actual')?' has-error':'' }}">
                                        {!! Form::label('password_actual', 'Contraseña Actual', ['class' => 'col-md-12']) !!}
                                        <div class="col-md-12">
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-key"></i>
                                                </div>
                                                {!! Form::password('password_actual', null, ['class' => 'form-control']) !!} 
                                            </div>
                                            @if($errors->has('password_actual'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('password_actual') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->has('password')?' has-error':'' }}">
                                        {!! Form::label('password', 'Contraseña Nueva', ['class' => 'col-md-12']) !!}
                                        <div class="col-md-12">
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-key"></i>
                                                </div>
                                                {!! Form::password('password', null, ['class' => 'form-control']) !!} 
                                            </div>
                                            @if($errors->has('password'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->has('password_confirm')?' has-error':'' }}">
                                        {!! Form::label('password_confirm', 'Confirmar Contraseña', ['class' => 'col-md-12']) !!}
                                        <div class="col-md-12">
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-key"></i>
                                                </div>
                                                {!! Form::password('password_confirm', null, ['class' => 'form-control']) !!} 
                                            </div>
                                            @if($errors->has('password_confirm'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('password_confirm') }}</strong>
                                                </span>
                                            @endif
                                        </div>
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