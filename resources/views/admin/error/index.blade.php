@extends('layouts.init')

@section('styles')
@endsection

@section('actual','Denegado')
@section('titulo','Acceso Denegado')
@section('detalle','acceso denegado')

@section('cuerpo')
    <div class="row">
        <div class="col-xs-12">
            <div class="error-container">
                <div class="well">
                    <h1 class="grey lighter smaller">
                        <span class="blue bigger-125">
                            <i class="ace-icon fa fa-sitemap"></i>
                            ACCESO DENEGADO
                        </span>
                        Pagina no disponible, para el usuario
                    </h1>
                    <hr />
                    <h3 class="lighter smaller">Usted no cuenta con los permisos necesarios</h3>
                    <div>
                        <ul class="list-unstyled spaced inline bigger-110 margin-15">
                            <li>
                                <i class="ace-icon fa fa-hand-o-right blue"></i>
                                Póngase en contacto con el jefe de tecnologias.
                            </li>
                        </ul>
                    </div>
                    <hr />
                    <div class="center">
                        <a href="javascript:history.back()" class="btn btn-grey">
                            <i class="ace-icon fa fa-arrow-left"></i>
                            Regresar
                        </a>
                        <a href="{{ url('/home') }}" class="btn btn-primary">
                            <i class="ace-icon fa fa-home"></i>
                            Pantalla Principal
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
