
<div class="row">
    <div class="col-xs-12 col-sm-4">
        <div class="{{ $errors->has('us_nombre')?' has-error':'' }}">
            {{ Form::label('us_nombre', 'Nombre completo') }}    
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="ace-icon fa fa-user"></i>
                </span>
                {{ Form::text('us_nombre',null, ['class' => 'form-control', 'placeholder' => 'nombre']) }}
            </div>
            @if($errors->has('us_nombre'))
                <span style="color:red;">
                    <strong>{{ $errors->first('us_nombre') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="col-xs-12 col-sm-4">
        <div class="{{ $errors->has('us_paterno')?' has-error':'' }}">
            {{ Form::label('us_paterno', 'Apellido Paterno') }}
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="ace-icon fa fa-user"></i>
                </span>
                {{ Form::text('us_paterno',null, ['class' => 'form-control', 'placeholder' => 'Ap. paterno']) }}
            </div>
            @if($errors->has('us_paterno'))
                <span style="color:red;">
                    <strong>{{ $errors->first('us_paterno') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="col-xs-12 col-sm-4">
        <div class="{{ $errors->has('us_materno')?' has-error':'' }}">
            {{ Form::label('us_materno', 'Apellido Materno') }}
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="ace-icon fa fa-user"></i>
                </span>
                {{ Form::text('us_materno',null, ['class' => 'form-control', 'placeholder' => 'Ap. materno']) }}
            </div>
            @if($errors->has('us_materno'))
                <span style="color:red;">
                    <strong>{{ $errors->first('us_materno') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="col-xs-12 col-sm-4">
        <div>
            {{ Form::label('us_genero', 'Género') }}
            {{ Form::select('us_genero', ['Masculino' => 'Masculino', 'Femenina' => 'Femenina'],null, ['class' => 'chosen-select form-control']) }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-4">
        <div class="{{ $errors->has('email')?' has-error':'' }}">
            {{ Form::label('email', 'Correo Electrónico') }}
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="ace-icon fa fa-send"></i>
                </span>
                {{ Form::text('email',null, ['class' => 'form-control', 'placeholder' => 'example@dominio.com']) }}
            </div>
            @if($errors->has('email'))
                <span style="color:red;">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="col-xs-12 col-sm-4">
        <div class="{{ $errors->has('us_cuenta')?' has-error':'' }}">
            {{ Form::label('us_cuenta', 'Cuenta de Usuario') }}
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="ace-icon fa fa-user"></i>
                </span>
                {{ Form::text('us_cuenta',null, ['class' => 'form-control', 'placeholder' => 'nombre.apellido']) }}
            </div>
            @if($errors->has('us_cuenta'))
                <span style="color:red;">
                    <strong>{{ $errors->first('us_cuenta') }}</strong>
                </span>
            @endif
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-4">
        <div>
            {{ Form::label('us_tipo', 'Tipo de Usuario') }}
            {{ Form::select('us_tipo', ['VENTA' => 'VENTA',
                                        'ALMACEN' => 'ALMACEN',
                                        'GERENTE' => 'GERENTE',
                                        'ADMINISTRADOR' => 'ADMINISTRADOR'],null, ['class' => 'chosen-select form-control']) }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-4">
        <div>
            {{ Form::label('us_estado', 'Estado') }}
            {{ Form::select('us_estado', [true => 'Activo', false => 'Bloqueado'],null, ['class' => 'chosen-select form-control']) }}
        </div>
    </div>
    <?php error_reporting(0); ?>
    @if(!$user->id)
    <div class="col-xs-12 col-sm-4">
        <div class="{{ $errors->has('password')?' has-error':'' }}">
            {{ Form::label('password', 'Contraseña') }}
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="ace-icon fa fa-lock"></i>
                </span>
                {{ Form::password('password',null, ['class' => 'form-control', 'placeholder' => '123456']) }}
            </div>
            @if($errors->has('password'))
                <span style="color:red;">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>
    </div>
    @endif
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12">
        <div class="{{ $errors->has('us_obs')?' has-error':'' }}">
            {{ Form::label('us_obs', 'Observaciones') }}
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="ace-icon fa fa-bars"></i>
                </span>
                {{ Form::textarea('us_obs',null, ['class' => 'form-control', 'placeholder' => 'Observaciones', 'rows' => 5]) }}
            </div>
            @if($errors->has('us_obs'))
                <span style="color:red;">
                    <strong>{{ $errors->first('us_obs') }}</strong>
                </span>
            @endif
        </div>
    </div>
</div>
