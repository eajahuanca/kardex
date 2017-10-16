<div class="row">
                <div class="col-xs-12 col-sm-4">
                    <div>
                        {{ Form::label('pro_codigo', 'Codigo de Proveedor') }}    
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="ace-icon fa fa-bars"></i>
                            </span>
                            {{ Form::text('pro_codigo',null, ['class' => 'form-control', 'placeholder' => 'codigo']) }}
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4">
                    <div>
                        {{ Form::label('pro_nombre', 'Nombre de Proveedor') }}
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="ace-icon fa fa-user"></i>
                            </span>
                            {{ Form::text('pro_nombre',null, ['class' => 'form-control', 'placeholder' => 'nombre']) }}
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4">
                    <div>
                        {{ Form::label('pro_estado', 'Estado del Proveedor') }}
                        {{ Form::select('pro_estado', ['1' => 'Activo', '0' => 'Bloqueado'],null, ['class' => 'chosen-select form-control']) }}
                    </div>
                </div>
            </div>