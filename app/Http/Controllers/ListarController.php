<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movimiento;
use Carbon\Carbon;

class ListarController extends Controller
{
    public function __construct(){
    	Carbon::setLocale('es');
    }

    public function index(){
    	$kardex = Movimiento::orderBy('created_at','DESC')
    			->get();
    	return view('admin.listar.index')
    				->with('kardex', $kardex);

    }
}
