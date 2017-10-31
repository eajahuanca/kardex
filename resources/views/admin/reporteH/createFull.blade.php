<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Reporte Kardex de Clientes Hijos</title>
	<style type="text/css" media="screen">
		.saltoPagina{
			page-break-after: always;
		}
		body{
			margin-top: -1em;
			margin-left: 0em;
			margin-right: 0em;
			margin-bottom: 0em;
		}
		table{
			width: 100%;
			font-family: sans-serif;
		}
		.miTabla{
			border: 1px #6E6E6E solid;
			border-color: #6E6E6E;
			border-collapse: collapse;
		}
		.miTitulo{
			font-size: 40px;
			font-weight: bold;
		}
		.miFecha{
			font-family: sans-serif;
			font-size: 12px;
			text-align: center;
			width: 100%
		}
		.miSubTitulo, .miSubTitulo2{
			font-size: 11px;
			font-weight: bold;
			vertical-align: middle;
		}
		.miSubTitulo2{
			text-align: center;
		}
		.contenido1, .contenidoDatos, .contenidoDetalle{
			font-size: 11px;
			vertical-align: middle;
		}
		.contenidoDatos{
			text-align: center;
		}
	</style>
</head>
<body>
	@include('admin.fechas')
	@foreach($cabecera as $cab)
	<table>
		<thead>
			<tr>
				<td ><img src="{{ asset('plugin/login/img/logo.jpg') }}" width="110px" height="67px"></td>
				<td class="miTitulo">KARDEX</td>
			</tr>
		</thead>
	</table>
	<div class="miFecha"><b>DE</b> {{ $fechaIncial }} <b>AL</b> {{ $fechaFinal }}</div>
	<div class="miFecha">Fecha y Hora de Impresion <b>{{ date('d/m/Y h:i:s') }}</b></div>
	<div style="height: 8px;"></div>
	<table class="miTabla" cellpadding="3px" border="1">
		<tbody>
			<tr>
				<td colspan="4" class="miSubTitulo">CODIGO</td>
				<td class="contenido1">{{ $cab->articulos->art_codigo }}</td>
				<td class="miSubTitulo">PROVEEDOR</td>
				<td colspan="2" class="contenido1">{{ $cab->articulos->proveedors->pro_nombre }}</td>
			</tr>
			<tr>
				<td colspan="4" class="miSubTitulo">ARTICULO</td>
				<td class="contenido1">{{ $cab->articulos->art_descripcion }}</td>
				<td class="miSubTitulo">METODO</td>
				<td colspan="2" class="contenido1">P.E.P.S.</td>
			</tr>

			<tr class="miSubTitulo2">
				<td rowspan="2" width="6%">Nro.</td>
				<td colspan="3">FECHA</td>
				<td rowspan="2">DETALLE</td>
				<td>ENTRADA</td>
				<td>SALIDA</td>
				<td>SALDO</td>
			</tr>
			<tr class="miSubTitulo2">
				<td width="5%">D</td>
				<td width="5%">M</td>
				<td width="5%">A</td>
				<td width="12%">CANTIDAD</td>
				<td width="12%">CANTIDAD</td>
				<td width="12%">CANTIDAD</td>
			</tr>
			
			<?php 
				$cont = 1; $totalEntrada = 0; $totalSalida = 0; $totalSaldo = 0; 
				$kardex = App\Movimiento::whereDate('created_at','>=',$nuevaFechaStart)
                                    ->whereDate('created_at','<=',$nuevaFechaEnd)
                                    ->where('idarticulo','=',$cab->idarticulo)
                                    ->orderBy('idarticulo','ASC')
                                    ->orderBy('created_at','ASC')
                                    ->get();
                                    
			?>
			@foreach($kardex as $item)
			<tr>
				<td class="contenidoDatos">{{ $cont++ }}</td>
				<td class="contenidoDatos">{{ day($item->created_at) }}</td>
				<td class="contenidoDatos">{{ month($item->created_at) }}</td>
				<td class="contenidoDatos">{{ year($item->created_at) }}</td>
				<td class="contenidoDetalle">
					@if($item->mov_entrada>0 && $item->mov_salida==0)
						{!! 'Empresa: <b>'.$item->hclientes->cli_nombre.'</b>, '.$item->mov_obs !!}
					@else
						{!! 'Factura N°: <b>'.$item->mov_factura.'</b>, NIT: <b>'.$item->hclientes->cli_nit.'</b> Cliente: '.$item->hclientes->cli_nombre !!}
					@endif
				</td>
				<td class="contenidoDatos">{{ $item->mov_entrada }}</td>
				<td class="contenidoDatos">{{ $item->mov_salida }}</td>
				<td class="contenidoDatos"><b>{{ $item->mov_total }}</b></td>
				<?php $totalEntrada += $item->mov_entrada; $totalSalida += $item->mov_salida; $totalSaldo = $item->mov_total; ?>
			</tr>
			@endforeach
			<tr class="miSubTitulo2">
				<td colspan="5"><b>TOTALES</b></td>
				<td>{{ $totalEntrada }}</td>
				<td>{{ $totalSalida }}</td>
				<td>{{ $totalSaldo }}</td>
			</tr>
		</tbody>
	</table>
	<div style="text-align: right;font-size: 12px;font-family: sans-serif;"><br>{{ $fechaImpresion }}</div>
	<br><br><br><br><br>
	<div>
		<table>
			<tr>
				<td align="center">____________________</td>
				<td align="center">____________________</td>
				<td align="center">____________________</td>
			</tr>
			<tr>
				<td class="contenidoDatos"><b>AUXILIAR DE VENTAS</b></td>
				<td class="contenidoDatos"><b>ENCARGADO DE ALMACEN</b></td>
				<td class="contenidoDatos"><b>GERENTE GENERAL</b></td>
			</tr>
		</table>	
	</div>
	<div class="saltoPagina"></div>
	@endforeach
</body>
</html>