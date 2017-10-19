<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\KardexinRequest;
use Illuminate\Support\Facades\Auth;
use App\Movimiento;
use App\Articulo;
use Carbon\Carbon;
use DB;
use Session;
use Toastr;

class RegEntradaController extends Controller
{
    private $stock = 0;

    public function __construct(){
    	Carbon::setLocale('es');
    	$stock = 0;
    }

    public function index(){
    	$articulo = Articulo::where('art_estado','=','1')
				->orderBy('art_codigo','DESC')
				->select(DB::raw('CONCAT(art_codigo," - ",art_descripcion) AS articulo'),'id')
				->pluck('articulo','id');
		return view('admin.entrada.create')
				->with('articulo', $articulo);
    }

    public function store(KardexinRequest $request){
		try{
			$this->validarStock($request->input('mov_entrada'),$request->input('idarticulo'));
			$salida = new Movimiento();
			$salida->idarticulo = $request->input('idarticulo');
			$salida->idhcliente = 1;
			$salida->mov_factura = 0;
			$salida->mov_entrada = $request->input('mov_entrada');
			$salida->mov_salida = 0;
			$salida->mov_total = $this->stock;
			$salida->idregistra = Auth::user()->id;
			$salida->idactualiza = Auth::user()->id;
			$salida->mov_estado = 1;
			$salida->mov_obs = $request->input('mov_obs');
			$salida->save();
			Toastr::success('Se ha adicionado a kardex la entrada del articulo','Registro Correcto');
		}catch(\Exception $ex){
			Toastr::error('Ocurrio el siguiente error: '.$ex->getMessage(),'Error');
		}
		return redirect()->route('kardexin.index');
    }
    
    public function validarStock($cantidad, $id){
		try{
			$mov = Movimiento::where('idarticulo','=',$id)
							->orderBy('created_at','DESC')
							->first();
			if(!is_null($mov)){
				$this->stock = $cantidad + $mov->mov_total;
			}
			else{
				$this->stock = $cantidad;
			}
		}catch(\Exception $ex){
			Toastr::error('Ocurrio el siguiente error: '.$ex->getMessage(),'Error');
		}
	}
}
