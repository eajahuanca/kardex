<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserRequest;
use App\Http\Requests\PasswordRequest;
use App\User;
use Toastr;
use Carbon\Carbon;

class UserController extends Controller
{
    public function __construct(){
        Carbon::setLocale('es');
    }

    public function index(){
        if(Auth::user()->us_tipo == "ADMINISTRADOR"){
            $user = User::orderBy('created_at')->get();
            return view('admin.user.index')
                ->with('user', $user);
        }
        return view('admin.error.index');
    }

    public function create(){
        if(Auth::user()->us_tipo == "ADMINISTRADOR"){
            return view('admin.user.create');
        }
        return view('admin.error.index');
    }

    public function store(UserRequest $request)
    {
        if(Auth::user()->us_tipo == "ADMINISTRADOR"){
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
        return view('admin.error.index');
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
        if(Auth::user()->us_tipo == "ADMINISTRADOR"){
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
        return view('admin.error.index');
    }

    public function update(Request $request, $id)
    {
        if(Auth::user()->us_tipo == "ADMINISTRADOR"){
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
        return view('admin.error.index');
    }

    public function getForm(){
        if (Auth::user()->id) {
            return view('admin.user.newPassword');
        }
        Toastr::error('Usted no cuenta con sufientes permisos para acceder', 'Error');
        return redirect()->route('user.index');
    }

    public function password(PasswordRequest $request){
        try{
            $user = User::find(Auth::user()->id);
            $user->fill($request->all());
            $user->password = bcrypt($request->input('password'));
            $user->update();
            Toastr::success('Se actualizo de manera satisfactoria la contraseña, por lo que se recomienda salir y volver a ingresar al sistema', 'Correcto');
        }catch(\Exception $ex){
            Toastr::error('Ocurrió un error: '.$ex->getMessage(),'Error');
        }
        return redirect()->route('home');
    }
}
