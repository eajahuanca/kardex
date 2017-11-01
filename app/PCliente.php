<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PCliente extends Model
{
    protected $table = 'pclientes';
	protected $fillable = ['id','cli_ci','cli_exp','cli_nombre','cli_nit','cli_direccion','cli_contacto','cli_estado'];

	public function hclientes(){
		return $this->hasMany('App\HCliente');
	}
}
