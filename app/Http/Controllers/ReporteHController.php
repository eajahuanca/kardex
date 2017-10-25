<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Toastr;
use App\Movimiento;
use App\Articulo;
use Carbon\Carbon;
use DB;

class ReporteHController extends Controller
{
	public function __construct(){
		Carbon::setLocale('es');
	}
    public function index(){
    	$articulo = Articulo::orderBy('art_codigo','ASC')->select(DB::raw('CONCAT("art_codigo"," - ","art_descripcion") AS art_name'),'id')->get()->pluck('art_name','id');
    	return view('admin.reporteH.index')
    		->with('articulo', $articulo);
    }

    public function store(Request $request){
    	try{
    		$fechaStart = explode('/', $request->input('start'));
    		$fechaEnd = explode('/', $request->input('end'));
    		$nuevaFechaStart = $fechaStart[2].'-'.$fechaStart[0].'-'.$fechaStart[1];
    		$nuevaFechaEnd = $fechaEnd[2].'-'.$fechaEnd[0].'-'.$fechaEnd[1];

    		$kardex = Movimiento::whereBetween('created_at',[$nuevaFechaStart, $nuevaFechaEnd])->get();
		    
		    $fechaImpresion = 'El Alto, '.date('d').' de '.$this->fecha().' de '.date('Y');

		    $view = \View::make('admin.reporteH.create', compact('kardex','fechaImpresion'))->render();
            $pdf = \App::make('dompdf.wrapper');
            $pdf->setPaper('Letter','portrait');
            $pdf->loadHTML($view);
            return $pdf->download('KARDEX'.date('d-m-Y').date('H-i-s').'.pdf');
            //return $pdf->show('KARDEX'.date('d-m-Y').date('H-i-s').'.pdf');
            //return $pdf->output('KARDEX'.date('d-m-Y').date('H-i-s').'.pdf');

    	}catch(\Exception $ex){
    		Toastr::error('Error', 'Ocurrio el siguiente error: '.$ex->getMessage());
    		return redirect()->route('reporteh.index');
    	}
    }

    public function fecha()
    {
        $arrayMes = ['enero','febrero','marzo','abril','mayo','junio','julio','agosto','septiembre','octubre','noviembre','diciembre'];
        return $arrayMes[(int)(date('m')) - 1];
    }
}
