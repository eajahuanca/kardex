@extends('layouts.init')

@section('styles')
@endsection

@section('actual','Usuario')
@section('titulo','Datos del usuario')
@section('detalle','en esta seccion se visualiza los datos del usuario')
@section('cuerpo')
    <div class="row">
        <div class="col-xs-12 col-sm-12">
            <div class="clearfix">
                <div class="pull-left alert alert-success no-margin alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert">
                        <i class="ace-icon fa fa-times"></i>
                    </button>

                    <i class="ace-icon fa fa-user bigger-120 blue"></i>
                    Bienvenido <b>{{ Auth::user()->us_nombre.' '.Auth::user()->us_paterno.' '.Auth::user()->us_materno }}</b>
                </div>
                <div class="pull-right">
                    <span class="green middle bolder">Mis Datos: &nbsp;</span>
                    <div class="btn-toolbar inline middle no-margin">
                        <div data-toggle="buttons" class="btn-group no-margin">
                            <label class="btn btn-sm btn-yellow active">
                                <span class="bigger-110">{{ Auth::user()->id }}</span>
                                <input type="radio" value="{{ Auth::user()->id }}" />
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hr dotted"></div>
            <div>
                <div id="user-profile-1" class="user-profile row">
                    <div class="col-xs-12 col-sm-3 center">
                        <div>
                            <span class="profile-picture">
                                @if(Auth::user()->us_genero=='Femenina')
                                    <img class="img-responsive" src="{{asset('plugin/assets/images/avatars/avatarFem.png')}}" width="180px" height="200px" />
                                @else
                                    <img class="img-responsive" src="{{asset('plugin/assets/images/avatars/profile-pic.jpg')}}" width="180px" height="200px"/>
                                @endif
                            </span>
                            <div class="space-4"></div>
                            <div class="width-80 label label-info label-xlg arrowed-in arrowed-in-right">
                                <div class="inline position-relative">
                                    <a href="#" class="user-title-label dropdown-toggle" data-toggle="dropdown">
                                        <i class="ace-icon fa fa-circle light-green"></i>
                                        &nbsp;
                                        <span class="white">{{ Auth::user()->us_nombre.' '.Auth::user()->us_paterno.' '.Auth::user()->us_materno }}</b></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="space-6"></div>
                        <div class="profile-contact-info">
                            <div class="profile-contact-links align-left">
                                <a href="#" class="btn btn-link">
                                    <i class="ace-icon fa fa-envelope bigger-120 pink"></i>
                                    {{ Auth::user()->email }}
                                </a>
                            </div>
                            <div class="space-6"></div>
                        </div>
                        <div class="hr hr12 dotted"></div>
                        <div class="center">
                            <a href="{{ url('/pnew') }}" class="btn btn-sm btn-primary btn-white btn-round">
                                <i class="ace-icon fa fa-lock bigger-150 middle orange2"></i>
                                <span class="bigger-110">Cambiar Contraseña</span>
                                <i class="icon-on-right ace-icon fa fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-9">
                        <div class="center">
                            <span class="btn btn-app btn-sm btn-light no-hover">
                                <span class="line-height-1 bigger-170 blue"> 0 </span>
                                <br />
                                <span class="line-height-1 smaller-90"> Vistas </span>
                            </span>
                            <span class="btn btn-app btn-sm btn-yellow no-hover">
                                <span class="line-height-1 bigger-170"> Aux</span>
                                <br />
                                <span class="line-height-1 smaller-90"> Almacen </span>
                            </span>
                            <span class="btn btn-app btn-sm btn-pink no-hover">
                                <span class="line-height-1 bigger-170"> Aux </span>
                                <br />
                                <span class="line-height-1 smaller-90"> Ventas </span>
                            </span>
                            <span class="btn btn-app btn-sm btn-primary no-hover">
                                <span class="line-height-1 bigger-170"> Ger. </span>
                                <br />
                                <span class="line-height-1 smaller-90"> General</span>
                            </span>
                            <span class="btn btn-app btn-sm btn-success no-hover">
                                <span class="line-height-1 bigger-170"> Adm </span>
                                <br />
                                <span class="line-height-1 smaller-90"> Sistemas </span>
                            </span>
                        </div>
                        <div class="space-12"></div>
                        <div class="profile-user-info profile-user-info-striped">
                            <div class="profile-info-row">
                                <div class="profile-info-name" style="width: 200px !important;"> Nombre Completo </div>
                                <div class="profile-info-value">
                                    <span class="editable" id="username">{{ Auth::user()->us_nombre.' '.Auth::user()->us_paterno.' '.Auth::user()->us_materno }}</span>
                                </div>
                            </div>
                            <div class="profile-info-row">
                                <div class="profile-info-name"> Género </div>
                                <div class="profile-info-value">
                                    <i class="fa fa-user light-orange bigger-110"></i>
                                    <span class="editable" id="country">{{ Auth::user()->us_genero }}</span>
                                </div>
                            </div>
                            <div class="profile-info-row">
                                <div class="profile-info-name"> Correo electrónico </div>
                                <div class="profile-info-value">
                                    <span class="editable" id="age">{{ Auth::user()->email }}</span>
                                </div>
                            </div>
                            <div class="profile-info-row">
                                <div class="profile-info-name"> Cuenta de Usuario </div>
                                <div class="profile-info-value">
                                    <span class="editable" id="signup"><b>{{ Auth::user()->us_cuenta }}</b></span>
                                </div>
                            </div>
                            <div class="profile-info-row">
                                <div class="profile-info-name"> Tipo de Usuario </div>
                                <div class="profile-info-value">
                                    <span class="editable" id="login">{{ Auth::user()->us_tipo }}</span>
                                </div>
                            </div>
                            <div class="profile-info-row">
                                <div class="profile-info-name"> Observaciones </div>
                                <div class="profile-info-value">
                                    <span class="editable" id="about">{{ Auth::user()->us_obs }}</span>
                                </div>
                            </div>
                            <div class="profile-info-row">
                                <div class="profile-info-name"> Estado </div>
                                <div class="profile-info-value">
                                    <span class="editable" id="about">
                                        @if(Auth::user()->us_estado)
                                            <span class="label label-sm label-warning">Activo</span>
                                        @else
                                            <span class="label label-sm label-danger">Bloqueado</span>
                                        @endif
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection