<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ReporteHRequest;
use Illuminate\Support\Facades\Auth;
use App\User;
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
    	$articulo = Articulo::orderBy('art_codigo','ASC')->select(DB::raw('CONCAT(art_codigo," - ",art_descripcion) AS art_name'),"id")->pluck('art_name','id');
    	return view('admin.reporteH.index')
    		->with('articulo', $articulo);
    }

    public function store(ReporteHRequest $request){
    	try{    		
    		$fechaStart = explode('/', $request->input('start'));
    		$fechaEnd = explode('/', $request->input('end'));
    		$idarticulo = $request->input('articulo');
    		$nuevaFechaStart = $fechaStart[2].'-'.$fechaStart[0].'-'.$fechaStart[1];
    		$nuevaFechaEnd = $fechaEnd[2].'-'.$fechaEnd[0].'-'.$fechaEnd[1];
    		$fechaIncial = $fechaStart[1].'/'.$fechaStart[0].'/'.$fechaStart[2];	
    		$fechaFinal = $fechaEnd[1].'/'.$fechaEnd[0].'/'.$fechaEnd[2];
            $fechaImpresion = 'El Alto, '.date('d').' de '.$this->fecha().' de '.date('Y');

            if(strcmp($request->input('articulo'),"todo") !== 0){
        		$kardex = Movimiento::whereDate('created_at','>=',$nuevaFechaStart)->whereDate('created_at','<=',$nuevaFechaEnd)->where('idarticulo','=', $idarticulo)->get();
                $arrayCabecera = array();
                foreach($kardex as $item){
                    $arrayCabecera[0] = $item->articulos->art_codigo;
                    $arrayCabecera[1] = $item->articulos->art_descripcion;
                    $arrayCabecera[2] = $item->articulos->proveedors->pro_nombre;
                }
    		    $view = \View::make('admin.reporteH.create', compact('kardex','fechaImpresion','fechaIncial','fechaFinal','arrayCabecera'))->render();
                $pdf = \App::make('dompdf.wrapper');
                $pdf->setPaper('Letter','portrait');
                $pdf->loadHTML($view);
                return $pdf->download('KARDEX'.date('d-m-Y').date('H-i-s').'.pdf');
            }else{
                $cabecera = Movimiento::whereDate('created_at','>=',$nuevaFechaStart)->whereDate('created_at','<=',$nuevaFechaEnd)->orderBy('idarticulo','ASC')->orderBy('created_at','ASC')->select('idarticulo')->distinct('idarticulo')->get();
                $view = \View::make('admin.reporteH.createFull', compact('cabecera','fechaImpresion','fechaIncial','fechaFinal','nuevaFechaStart','nuevaFechaEnd'))->render();
                $pdf = \App::make('dompdf.wrapper');
                $pdf->setPaper('Letter','portrait');
                $pdf->loadHTML($view);
                return $pdf->download('KARDEX'.date('d-m-Y').date('H-i-s').'.pdf');
            }
    	}catch(\Exception $ex){
            Toastr::error('Ocurrio un error: '.$ex->getMessage(),'Error');
    		return redirect()->route('reporteh.index');
    	}
    }

    public function fecha(){
        $arrayMes = ['enero','febrero','marzo','abril','mayo','junio','julio','agosto','septiembre','octubre','noviembre','diciembre'];
        return $arrayMes[(int)(date('m')) - 1];
    }
}
