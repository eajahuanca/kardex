<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ClientePRequest;
use App\PCliente;
use Carbon\Carbon;
use Toastr;

class PClienteController extends Controller
{
    public function __construct(){
        Carbon::setLocale('es');
    }

    public function index(){
        $cliente = PCliente::orderBy('id','DESC')->get();
        return view('admin.pcliente.index')
                ->with('cliente', $cliente);
    }

    public function create(){
        return view('admin.pcliente.create');
    }

    public function store(ClientePRequest $request){
        try{
            $cli = new PCliente($request->all());
            $cli->save();
            Toastr::success('Los datos del Cliente Padre '.$cli->cli_nombre.', se registraron de manera correcta','Registro');
        }catch(\Exception $ex){
            Toastr::error('Ocurrio un error: '.$ex->getMessage(),'Error');
        }
        return redirect()->route('pcliente.index');
    }

    public function edit($id){
        try{
            $cli = PCliente::find($id);
            Toastr::warning('Usted va modificar datos','Modificar');
            return view('admin.pcliente.edit')
                    ->with('cliente', $cli);
        }catch(\Exception $ex){
            Toastr::error('No se puede realizar la modificación','Error');
            return redirect()->route('pcliente.index');
        }
    }

    public function update(ClientePRequest $request, $id){
        try{
            $cli = PCliente::find($id);
            $cli->fill($request->all());
            $cli->update();
            Toastr::success('Los datos del Cliente Padre '.$cli->cli_nombre.', se actualizaron de manera correcta','Actualizado');
        }catch(\Exception $ex){
            Toastr::error('Ocurrio un error: '.$ex->getMessage(),'Error');
        }
        return redirect()->route('pcliente.index');
    }
}
