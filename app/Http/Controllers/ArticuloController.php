<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ArticuloRequest;
use App\Proveedor;
use App\Articulo;
use Carbon\Carbon;
use Toastr;
use DB;

class ArticuloController extends Controller
{
    public function __construct(){
        Carbon::setlocale('es');
    }

    public function index(){
        $articulo = Articulo::orderBy('created_at','DESC')->get();
        return view('admin.articulo.index')
                ->with('articulo', $articulo);
    }

    public function create(){
        $proveedor = DB::table('proveedores')->where('pro_estado', '1')->orderBy('pro_nombre','DESC')->pluck('pro_nombre','id');
        return view('admin.articulo.create')
                ->with('proveedor', $proveedor);
    }

    public function store(ArticuloRequest $request){
        try{
            $art = new Articulo($request->all());
            $art->save();
            Toastr::success('Los datos del articulo '.$art->art_descripcion.', se registraron de manera correcta','Registro');
        }catch(\Exception $ex){
            Toastr::error('Ocurrio un error: '.$ex->getMessage(),'Error');
        }
        return redirect()->route('articulo.index');
        
    }

    public function edit($id){
        try{
            $art = Articulo::find($id);
            $pro = DB::table('proveedores')->orderBy('pro_nombre','DESC')->pluck('pro_nombre','id');
            Toastr::warning('Usted va modificar datos','Modificar');
            return view('admin.articulo.edit')
                    ->with('articulo', $art)
                    ->with('proveedor', $pro);
        }catch(\Exception $ex){
            Toastr::error('No se puede realizar la modificación','Error');
            return redirect()->route('articulo.index');
        }
    }

    public function update(ArticuloRequest $request, $id){
        try{
            $art = Articulo::find($id);
            $art->fill($request->all());
            $art->update();
            Toastr::success('Los datos del articulo '.$art->art_descripcion.', se actualizaron de manera correcta','Actualizado');
        }catch(\Exception $ex){
            Toastr::error('Ocurrio un error: '.$ex->getMessage(),'Error');
        }
        return redirect()->route('articulo.index');
    }
}
