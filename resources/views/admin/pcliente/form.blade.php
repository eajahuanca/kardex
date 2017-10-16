<div class="row">
    <div class="col-xs-12 col-sm-3">
        <div>
            {{ Form::label('cli_ci', 'Nro. Doc. CI') }}    
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="ace-icon fa fa-bars"></i>
                </span>
                {{ Form::text('cli_ci',null, ['class' => 'form-control', 'placeholder' => 'carnet']) }}
            </div>
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
        <div>
            {{ Form::label('cli_nombre', 'Nombre del Cliente Padre') }}
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="ace-icon fa fa-user"></i>
                </span>
                {{ Form::text('cli_nombre',null, ['class' => 'form-control', 'placeholder' => 'nombre del cliente']) }}
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-4">
        <div>
            {{ Form::label('cli_nit', 'NIT del Cliente Padre') }}
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="ace-icon fa fa-bars"></i>
                </span>
                {{ Form::text('cli_nit',null, ['class' => 'form-control', 'placeholder' => 'NIT del cliente']) }}
            </div>
        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="col-xs-12 col-sm-12">
        <div>
            {{ Form::label('cli_direccion', 'Dirección del Cliente Padre') }}
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="ace-icon fa fa-bars"></i>
                </span>
                {{ Form::text('cli_direccion',null, ['class' => 'form-control', 'placeholder' => 'direccion']) }}
            </div>
        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="col-xs-12 col-sm-8">
        <div>
            {{ Form::label('cli_contacto', 'Nro. de Contacto') }}
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="ace-icon fa fa-phone"></i>
                </span>
                {{ Form::text('cli_contacto',null, ['class' => 'form-control', 'placeholder' => 'Contacto']) }}
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-4">
        <div>
            {{ Form::label('cli_estado', 'Estado del Cliente Padre') }}
            {{ Form::select('cli_estado', ['1' => 'Activo', '0' => 'Bloqueado'],null, ['class' => 'chosen-select form-control']) }}
        </div>
    </div>
</div>



