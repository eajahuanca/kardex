<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ClienteHRequest;
use Illuminate\Support\Facades\Auth;
use App\HCliente;
use Carbon\Carbon;
use DB;
use Toastr;

class HClienteController extends Controller
{
    public function __construct(){
        Carbon::setLocale('es');
    }

    public function index(){
        $cliente = HCliente::orderBy('created_at','DESC')->get();
        return view('admin.hcliente.index')
                ->with('cliente', $cliente);
    }

    public function create(){
        $cli = DB::table('pclientes')->where('cli_estado','=','1')->where('id','<>',1)->pluck('cli_nombre','id');
        return view('admin.hcliente.create')
                ->with('pcliente', $cli);
    }

    public function store(ClienteHRequest $request){
        try{
            $cli = new HCliente($request->all());
            $cli->idregistra = Auth::user()->id;
            $cli->idactualiza = Auth::user()->id;
            $cli->save();
            Toastr::success('Los datos del cliente hijo '.$cli->cli_nombre.', se registraron de manera correcta','Registro');
        }catch(\Exception $ex){
            Toastr::error('Ocurrio un error: '.$ex->getMessage(),'Error');
        }
        return redirect()->route('hcliente.index');
        
    }

    public function edit($id){
        try{
            $cli = HCliente::find($id);
            $pcli = DB::table('pclientes')->where('cli_estado','=','1')->pluck('cli_nombre','id');
            Toastr::warning('Usted va modificar datos','Modificar');
            return view('admin.hcliente.edit')
                    ->with('cliente', $cli)
                    ->with('pcliente', $pcli);
        }catch(\Exception $ex){
            Toastr::error('No se puede realizar la modificación','Error');
            return redirect()->route('hcliente.index');
        }
    }

    public function update(ClienteHRequest $request, $id){
        try{
            $cli = HCliente::find($id);
            $cli->fill($request->all());
            $cli->idactualiza = Auth::user()->id;
            $cli->update();
            Toastr::success('Los datos del cliente hijo '.$cli->cli_nombre.', se actualizaron de manera correcta','Actualizado');
        }catch(\Exception $ex){
            Toastr::error('Ocurrio un error: '.$ex->getMessage(),'Error');
        }
        return redirect()->route('hcliente.index');
    }
}
