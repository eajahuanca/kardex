<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class ProveedorController extends Controller
{
    public function __construct(){
        Carbon::setlocale('es');
    }

    public function index()
    {
        return view('admin.proveedor.index');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }
}
