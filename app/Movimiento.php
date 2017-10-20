<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movimiento extends Model
{
    protected $table = 'movimientos';
    protected $fillable = ['id','idarticulo','idhcliente','mov_factura','mov_entrada','mov_salida','mov_total','idregistra','idactualiza','mov_estado','mov_obs'];

    public function userRegistra(){
    	return $this->belongsTo('App\User','idregistra','id');
    }

    public function userActualiza(){
    	return $this->belongsTo('App\User','idactualiza','id');
    }

    public function articulo(){
    	return $this->belongsTo('App\Articulo','idarticulo','id');
    }

    public function hcliente(){
    	return $this->belongsTo('App\HCliente','idhcliente','id');
    }
}
