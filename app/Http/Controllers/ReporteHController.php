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

    		$firmaVenta = strtoupper(Auth::user()->us_nombre.' '.Auth::user()->us_paterno.' '.Auth::user()->us_materno);
    		$almacen = User::where('us_estado','=',1)->where('us_tipo','=','ALMACEN')->get()->first();
    		$gerente = User::where('us_estado','=',1)->where('us_tipo','=','GERENTE')->get()->first();
    		$firmaAlmacen = strtoupper($almacen->us_nombre.' '.$almacen->us_paterno.' '.$almacen->us_materno);
    		$firmaGerente = strtoupper($gerente->us_nombre.' '.$gerente->us_paterno.' '.$gerente->us_materno);
    		
    		$fechaStart = explode('/', $request->input('start'));
    		$fechaEnd = explode('/', $request->input('end'));
    		$idarticulo = $request->input('articulo');
    		$nuevaFechaStart = $fechaStart[2].'-'.$fechaStart[0].'-'.$fechaStart[1];
    		$nuevaFechaEnd = $fechaEnd[2].'-'.$fechaEnd[0].'-'.$fechaEnd[1];

    		$fechaIncial = $fechaStart[1].'/'.$fechaStart[0].'/'.$fechaStart[2];	
    		$fechaFinal = $fechaEnd[1].'/'.$fechaEnd[0].'/'.$fechaEnd[2];

    		$kardex = Movimiento::whereDate('created_at','>=',$nuevaFechaStart)->whereDate('created_at','<=',$nuevaFechaEnd)->where('idarticulo','=', $idarticulo)->get();

		    $fechaImpresion = 'El Alto, '.date('d').' de '.$this->fecha().' de '.date('Y');

		    $view = \View::make('admin.reporteH.create', compact('kardex','fechaImpresion','fechaIncial','fechaFinal','firmaVenta','firmaAlmacen','firmaGerente'))->render();
            $pdf = \App::make('dompdf.wrapper');
            $pdf->setPaper('Letter','portrait');
            $pdf->loadHTML($view);
            return $pdf->download('KARDEX'.date('d-m-Y').date('H-i-s').'.pdf');
            //return $pdf->show('KARDEX'.date('d-m-Y').date('H-i-s').'.pdf');
            //return $pdf->output('KARDEX'.date('d-m-Y').date('H-i-s').'.pdf');

    	}catch(\Exception $ex){
    		Toastr::error('Ocurrio el siguiente error: '.$ex->getMessage(),'Error');
    		return redirect()->route('reporteh.index');
    	}
    }

    public function fecha()
    {
        $arrayMes = ['enero','febrero','marzo','abril','mayo','junio','julio','agosto','septiembre','octubre','noviembre','diciembre'];
        return $arrayMes[(int)(date('m')) - 1];
    }
}
