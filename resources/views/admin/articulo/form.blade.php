<div class="row">
    <div class="col-xs-12 col-sm-4">
        <div>
            {{ Form::label('art_codigo', 'Codigo de Artículo') }}    
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="ace-icon fa fa-bars"></i>
                </span>
                {{ Form::text('art_codigo',null, ['class' => 'form-control', 'placeholder' => 'codigo']) }}
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-4">
        <div>
            {{ Form::label('art_unidad', 'Unidad del Artículo') }}
            {{ Form::select('art_unidad', ['Cajas' => 'Cajas', 'Otro' => 'Otro'],null, ['class' => 'chosen-select form-control']) }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-4">
        <div>
            {{ Form::label('art_estado', 'Estado del Artículo') }}
            {{ Form::select('art_estado', ['1' => 'Activo', '0' => 'Bloqueado'],null, ['class' => 'chosen-select form-control']) }}
        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="col-xs-12 col-sm-12">
        <div>
            {{ Form::label('art_descripcion', 'Descripción de Artículo') }}    
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="ace-icon fa fa-bars"></i>
                </span>
                {{ Form::text('art_descripcion',null, ['class' => 'form-control', 'placeholder' => 'descripcion']) }}
            </div>
        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="col-xs-12 col-sm-12">
        <div>
            {{ Form::label('idproveedor', 'Nombre del Proveedor') }}
            {{ Form::select('idproveedor', $proveedor,null, ['class' => 'chosen-select form-control']) }}
        </div>
    </div>
</div>