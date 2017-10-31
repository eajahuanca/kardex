<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $table = 'proveedores';
    protected $fillable = ['pro_codigo','pro_nombre','pro_estado','created_at','updated_at'];

    public function articulos(){
    	return $this->hasMany('App\Articulo');
    }
}
