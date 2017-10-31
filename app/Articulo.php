<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    protected $table = 'articulos';
    protected $fillable = ['id','art_codigo','art_descripcion','art_unidad','idproveedor','created_at','updated_at','art_estado'];

    public function proveedors(){
    	return $this->belongsTo('App\Proveedor','idproveedor','id');
    }

    public function movimientos(){
    	return $this->hasMany('App\Movimiento');
    }
}