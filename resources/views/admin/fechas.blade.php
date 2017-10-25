<?php
	function day($fecha){
		$arrayFecha = explode('-', $fecha);
		$arrayDia = explode(' ', $arrayFecha[2]);
		return (int)$arrayDia[0];
	}

	function month($fecha){
		$arrayFecha = explode('-', $fecha);
		return (int)$arrayFecha[1];	
	}

	function year($fecha){
		$arrayFecha = explode('-', $fecha);
		return (int)$arrayFecha[0];	
	}
?>