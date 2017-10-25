<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Reporte Kardex de Clientes Hijos</title>
	<link rel="stylesheet" href="">
</head>
<body>
	<table border="1">
		<thead>
			<tr>
				<td colspan="4"><img src="{{ asset('plugin/login/img/zaire.jpg') }}" width="100px" height="65px"></td>
				<td colspan="5"><h2>KARDEX</h2></td>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td colspan="9">DE 10 de octubre de 2017 AL 15 octubre de 2017</td>
			</tr>
			<tr>
				<td colspan="9">Fecha y Hora de Impresion {{ date('d/m/Y h:i:s') }}</td>
			</tr>
			<tr>
				<td colspan="4">CODIGO :</td>
				<td>IC000125</td>
				<td>PROVEEDOR :</td>
				<td colspan="2">KT&G</td>
			</tr>
			<tr>
				<td colspan="4">ARTICULO :</td>
				<td>Cigarrillos This Blue KSB 20s 10M</td>
				<td>METODO :</td>
				<td colspan="2">P.E.P.S.</td>
			</tr>

			<tr>
				<td rowspan="2">Nro.</td>
				<td colspan="3">FECHA</td>
				<td rowspan="2">DETALLE</td>
				<td>ENTRADA</td>
				<td>SALIDA</td>
				<td>SALDO</td>
			</tr>
			<tr>
				<td>D</td>
				<td>M</td>
				<td>A</td>
				<td>CANTIDAD</td>
				<td>CANTIDAD</td>
				<td>CANTIDAD</td>
			</tr>
			@include('admin.fechas')
			<?php $cont=1; ?>
			@foreach($kardex as $item)
			<tr>
				<td>{{ $cont++ }}</td>
				<td>{{ day($item->created_at) }}</td>
				<td>{{ month($item->created_at) }}</td>
				<td>{{ year($item->created_at) }}</td>
				<td>{{ 'Factura N°: '.$item->mov_factura.' Cliente: '.$item->idhcliente }}</td>
				<td>{{ $item->entrada }}</td>
				<td>{{ $item->salida }}</td>
				<td>{{ $item->total }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</body>
</html>