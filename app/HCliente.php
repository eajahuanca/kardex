<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HCliente extends Model
{
	protected $table = 'hclientes';
	protected $fillable = ['id','cli_ci','cli_exp','cli_nombre','cli_nit','cli_direccion','cli_contacto','cli_estado','created_at','updated_at','idpcliente'];

	public function pclientes(){
		return $this->belongsTo('App\PCliente','idpcliente','id');
	}

	public function movimientos(){
		return $this->hasMany('App\Movimiento');
	}
}
