<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Toastr;
use App\Proveedor;

class ProveedorController extends Controller
{
    public function __construct(){
        Carbon::setlocale('es');
    }

    public function index(){
        $proveedor = Proveedor::orderBy('created_at','DESC')->get();
        return view('admin.proveedor.index')
                ->with('proveedor', $proveedor);
    }

    public function create(){
        return view('admin.proveedor.create');
    }

    public function store(Request $request){
        try{
            $pro = new Proveedor($request->all());
            $pro->save();
            Toastr::success('Los datos del proveedor '.$pro->pro_nombre.', se registraron de manera correcta','Registro');
        }catch(\Exception $ex){
            Toastr::error('Ocurrio un error: '.$ex->getMessage(),'Error');
        }
        return redirect()->route('proveedor.index');
        
    }

    public function edit($id){
        try{
            $pro = Proveedor::find($id);
            Toastr::warning('Usted va modificar datos','Modificar');
            return view('admin.proveedor.edit')
                    ->with('proveedor', $pro);
        }catch(\Exception $ex){
            Toastr::error('No se puede realizar la modificación','Error');
            return redirect()->route('proveedor.index');
        }
    }

    public function update(Request $request, $id){
        try{
            $pro = Proveedor::find($id);
            $pro->fill($request->all());
            $pro->update();
            Toastr::success('Los datos del proveedor '.$pro->pro_nombre.', se actualizaron de manera correcta','Actualizado');
        }catch(\Exception $ex){
            Toastr::error('Ocurrio un error: '.$ex->getMessage(),'Error');
        }
        return redirect()->route('proveedor.index');
    }
}
