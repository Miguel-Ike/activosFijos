<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Grupo;

class GrupoController extends Controller
{
    public function index(Request $request)
    {
        $grupos=Grupo::all();
        return view('grupos.index',compact('grupos'));
    }


    public function create()
    {
        return view('grupos.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nombre' => 'required',
            'codigo' => 'required',

        ]);
        $grupo=new Grupo();
        $grupo->nombre=$request->input('nombre');
        $grupo->descripcion=$request->input('descripcion');
        $grupo->codigo=$request->input('codigo');

        $grupo->save();
        return redirect()->action('GrupoController@index');

    }

}
