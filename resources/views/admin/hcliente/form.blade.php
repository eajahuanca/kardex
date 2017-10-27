<div class="row">
    <div class="col-xs-12 col-sm-12">
        <div>
            {{ Form::label('idpcliente', 'Cliente Padre') }}
            {{ Form::select('idpcliente', $pcliente,null, ['class' => 'chosen-select form-control']) }}
        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="col-xs-12 col-sm-3">
        <div class="{{ $errors->has('cli_ci')?' has-error':'' }}">
            {{ Form::label('cli_ci', 'Nro. Doc. CI') }}    
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="ace-icon fa fa-bars"></i>
                </span>
                {{ Form::text('cli_ci',null, ['class' => 'form-control', 'placeholder' => 'carnet', 'id' => 'cli_ci']) }}
            </div>
            @if($errors->has('cli_ci'))
                <span style="color:red;">
                    <strong>{{ $errors->first('cli_ci') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="col-xs-12 col-sm-1">
        <div>
            {{ Form::label('cli_exp', 'Expedido') }}
            {{ Form::select('cli_exp', ['LP' => 'LP',
                                        'CBBA' => 'CBBA',
                                        'OR' => 'OR',
                                        'PT' => 'PT',
                                        'CH' => 'CH',
                                        'TJ' => 'TJ',
                                        'SC' => 'SC',
                                        'BN' => 'BN',
                                        'PA' => 'PA'],null, ['class' => 'chosen-select form-control']) }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-4">
        <div class="{{ $errors->has('cli_nombre')?' has-error':'' }}">
            {{ Form::label('cli_nombre', 'Nombre del Cliente Hijo(a)') }}
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="ace-icon fa fa-user"></i>
                </span>
                {{ Form::text('cli_nombre',null, ['class' => 'form-control', 'placeholder' => 'nombre del cliente hijo']) }}
            </div>
            @if($errors->has('cli_nombre'))
                <span style="color:red;">
                    <strong>{{ $errors->first('cli_nombre') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="col-xs-12 col-sm-4">
        <div class="{{ $errors->has('cli_nit')?' has-error':'' }}">
            {{ Form::label('cli_nit', 'NIT del Cliente Hijo(a)') }}
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="ace-icon fa fa-bars"></i>
                </span>
                {{ Form::text('cli_nit',null, ['class' => 'form-control', 'placeholder' => 'NIT del cliente', 'id' => 'cli_nit']) }}
            </div>
            @if($errors->has('cli_nit'))
                <span style="color:red;">
                    <strong>{{ $errors->first('cli_nit') }}</strong>
                </span>
            @endif
        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="col-xs-12 col-sm-12">
        <div class="{{ $errors->has('cli_direccion')?' has-error':'' }}">
            {{ Form::label('cli_direccion', 'Dirección del Cliente Hijo(a)') }}
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="ace-icon fa fa-bars"></i>
                </span>
                {{ Form::text('cli_direccion',0, ['class' => 'form-control', 'placeholder' => 'direccion']) }}
            </div>
            @if($errors->has('cli_direccion'))
                <span style="color:red;">
                    <strong>{{ $errors->first('cli_direccion') }}</strong>
                </span>
            @endif
        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="col-xs-12 col-sm-8">
        <div class="{{ $errors->has('cli_contacto')?' has-error':'' }}">
            {{ Form::label('cli_contacto', 'Nro. de Contacto') }}
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="ace-icon fa fa-phone"></i>
                </span>
                {{ Form::text('cli_contacto',0, ['class' => 'form-control', 'placeholder' => 'Contacto']) }}
            </div>
            @if($errors->has('cli_contacto'))
                <span style="color:red;">
                    <strong>{{ $errors->first('cli_contacto') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="col-xs-12 col-sm-4">
        <div>
            {{ Form::label('cli_estado', 'Estado del Cliente Hijo(a)') }}
            {{ Form::select('cli_estado', ['1' => 'Activo', '0' => 'Bloqueado'],null, ['class' => 'chosen-select form-control']) }}
        </div>
    </div>
</div>



