<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SalidaRequest;
use App\PCliente;
use App\HCliente;
use Carbon\Carbon;
use DB;
use Session;
use Toastr;

class SalidaController extends Controller
{
    public function __construct(){
		Carbon::setLocale('es');
	}

	public function index(){

		if(Session::get('codigo') || Session::get('factura') || Session::get('nit') || Session::get('pcliente') || Session::get('hcliente')){
			Session::forget('codigo');
			Session::forget('factura');
			Session::forget('pcliente');
			Session::forget('hcliente');
			Session::forget('nit');
		}

		$cliente = PCliente::join('hclientes','pclientes.id','=','hclientes.idpcliente')
					->where('pclientes.cli_estado','=','1')
					->where('hclientes.cli_estado','=','1')
					->select(DB::raw('CONCAT(pclientes.cli_nombre," - ",hclientes.cli_nombre," NIT: ",hclientes.cli_nit) AS nombre'),'hclientes.id')
					->pluck('nombre','hclientes.id');
		return view('admin.salida.index')
					->with('cliente', $cliente);
	}

	public function store(SalidaRequest $request){
		try{
			$hcliente = HCliente::find($request->input('idhcliente'));
			$pcliente = PCliente::find($hcliente->idpcliente);
			
			Session::put('codigo', $request->input('idhcliente'));
			Session::put('factura', $request->input('mov_factura'));
			Session::put('pcliente', $pcliente->cli_nombre);
			Session::put('hcliente', $hcliente->cli_nombre);
			Session::put('nit', $hcliente->cli_nit);
		}catch(\Exception $ex){
			Toastr::error('Ocurrio el siguiente error: '.$ex->getMessage(),'Error');
		}
		return redirect()->route('kardexout.index');
	}
}
