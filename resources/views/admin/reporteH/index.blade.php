@extends('layouts.init')

@section('styles')
@endsection

@section('actual','Reporte de Kardex')
@section('titulo','Reporte Kardex de Clientes Hijos')
@section('detalle','en esta sección se deben de seleccionar las fechas para obtener el reporte respectivo')

@section('cuerpo')

	<div class="row">
		<div class="col-xs-12 col-sm-12">
			<div class="row">
				<div class="col-xs-12 col-sm-6">
					{!! Form::label('start','Fecha Inicial',['class' => 'pull-right']) !!}
				</div>
				<div class="col-xs-12 col-sm-6">
					{!! Form::label('end','Fecha Final') !!}
				</div>
			</div>
		</div>
		{!! Form::open(['route' => 'reporteh.store', 'method' => 'post']) !!}
		<div class="col-xs-12 col-sm-12">
			<div class="input-daterange input-group">
				<div class="pull-right">
					<div class="input-group">
	                    <span class="input-group-addon">
	                        <i class="ace-icon fa fa-calendar"></i>
	                    </span>
	                    {{ Form::text('start',null, ['class' => 'input-sm form-control pull-right']) }}
	                </div>
	                @if($errors->has('start'))
	                    <span style="color:red;">
	                        <strong>{{ $errors->first('start') }}</strong>
	                    </span>
	                @endif
				</div>
				<span class="input-group-addon"></span>
				<div class="pull-left">
					<div class="input-group">
	                    <span class="input-group-addon">
	                        <i class="ace-icon fa fa-calendar"></i>
	                    </span>
	                    {{ Form::text('end',null, ['class' => 'input-sm form-control']) }}
	                </div>
	                @if($errors->has('end'))
	                    <span style="color:red;">
	                        <strong>{{ $errors->first('end') }}</strong>
	                    </span>
	                @endif
                </div>
			</div>
		</div>
		<div class="row">
			<center>
            	{!! Form::label('start','Fecha Inicial',['class' => 'pull-center']) !!}
				<div class="input-group">
	                {{ Form::select('articulo', $articulo, null, ['class' => 'chosen-select form-control col-md-12', 'id' => 'articulo']) }}
	            </div>
            </center>
		</div><br>
		<div class="row">
			<center>
				<input type="submit" name="btnEnviar" value="Obtener Reporte" class="btn btn-primary btn-round pull center">
			</center>
		</div>
		{!! Form::close() !!}
	</div>

@endsection

@section('scripts')
	<script type="text/javascript">
		$(document).ready(function(eve){
			$('#articulo').append('<option value="todo" selected="selected">Todo</option>');
		});
	</script>
@endsection