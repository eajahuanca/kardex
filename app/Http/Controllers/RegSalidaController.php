<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\KardexoutRequest;
use Illuminate\Support\Facades\Auth;
use App\Movimiento;
use App\Articulo;
use Carbon\Carbon;
use DB;
use Session;
use Toastr;

class RegSalidaController extends Controller
{
	private $stock = 0;

    public function __construct(){
    	Carbon::setLocale('es');
    	$stock = 0;
    }

    public function index(){
    	if(Session::get('codigo') || Session::get('factura') || Session::get('nit') || Session::get('pcliente') || Session::get('hcliente')){
	    	$articulo = Articulo::where('art_estado','=','1')
					->orderBy('art_codigo','DESC')
					->select(DB::raw('CONCAT(art_codigo," - ",art_descripcion) AS articulo'),'id')
					->pluck('articulo','id');
			return view('admin.salida.create')
					->with('articulo', $articulo);
		}
		else{
			return redirect()->route('salida.index');
		}
    }

    public function store(KardexoutRequest $request){
    	if(Session::get('codigo') || Session::get('factura') || Session::get('nit') || Session::get('pcliente') || Session::get('hcliente')){
    		try{
    			if($this->validarStock($request->input('mov_salida'),$request->input('idarticulo'))){
					$salida = new Movimiento();
					$salida->idarticulo = $request->input('idarticulo');
					$salida->idhcliente = Session::get('codigo');
					$salida->mov_factura = Session::get('factura');
					$salida->mov_entrada = 0;
					$salida->mov_salida = $request->input('mov_salida');
					$salida->mov_total = $this->stock;
					$salida->idregistra = Auth::user()->id;
					$salida->idactualiza = Auth::user()->id;
					$salida->mov_estado = 1;
					$salida->mov_obs = "";
					$salida->save();
					Toastr::success('Se ha adicionado a kardex la salida del articulo','Registro Correcto');
				}else{
					Toastr::warning('El Stock del articulo no esta disponible, restante: '. $this->stock,'Existencia');
				}
    		}catch(\Exception $ex){
    			Toastr::error('Ocurrio el siguiente error: '.$ex->getMessage(),'Error');
    		}
    		return redirect()->route('kardexout.index');
    	}else{
    		Session::forget('codigo');
    		Session::forget('factura');
    		Session::forget('pcliente');
    		Session::forget('nit');
    		Session::forget('hcliente');
    		return redirect()->route('salida.index');
    	}
    }
    
    public function validarStock($cantidad, $id){
		try{
			$mov = Movimiento::where('idarticulo','=',$id)
							->orderBy('created_at','DESC')
							->first();
			if(!is_null($mov)){
				if($mov->mov_total >= $cantidad){
					$this->stock = $mov->mov_total - $cantidad;
					return true;
				}else{
					$this->stock = $mov->mov_total;
					return false;
				}
			}
			else{
				return false;
			}
		}catch(\Exception $ex){
			Toastr::error('Ocurrio el siguiente error: '.$ex->getMessage(),'Error');
		}
	}
}
