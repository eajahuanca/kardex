<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\User;
use Toastr;
use Carbon\Carbon;

class UserController extends Controller
{
    public function __construct(){
        Carbon::setLocale('es');
    }

    public function index(){
        $user = User::orderBy('created_at')->get();
        return view('admin.user.index')
            ->with('user', $user);
    }

    public function create(){
        return view('admin.user.create');
    }

    public function store(UserRequest $request)
    {
        try{
            $user = new USer($request->all());
            $user->password = bcrypt($request->input('password'));
            $user->save();
            Toastr::success('Los datos del usuario '.$user->us_nombre.', se registraron de manera correcta','Registro');
        }catch(\Exception $ex){
            Toastr::error('Ocurrio un error: '.$ex->getMessage(),'Error');
        }
        return redirect()->route('user.index');
    }

    public function show($id)
    {
        try{
            $user = User::find($id);
            return view('admin.user.show')
                ->with('user', $user);
        }catch(\Exception $ex){
            Toastr::error('Ocurrio un error: '.$ex->getMessage(),'Error');
        }
    }

    public function edit($id)
    {
        try{
            $user = User::find($id);
            Toastr::warning('Usted va a realizar cambios','Modificar');
            return view('admin.user.edit')
                ->with('user', $user);
        }catch(\Exception $ex){
            Toastr::error('Ocurrio un error: '.$ex->getMessage(),'Error');
            return redirect()->route('user.index');
        }
    }

    public function update(Request $request, $id)
    {
        try{
            $user = User::find($id);
            $user->fill($request->all());
            $user->update();
            Toastr::success('Los datos del usuario '.$user->us_nombre.', se actualizaron se manera correcta','Actualizado');
        }catch(\Exception $ex){
            Toastr::error('Ocurrio un error: '.$ex->getMessage(),'Error');
        }
        return redirect()->route('user.index');
    }
}
