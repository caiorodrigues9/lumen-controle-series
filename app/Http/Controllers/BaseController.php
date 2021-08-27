<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


abstract class BaseController
{
    protected string $classe;

    public function index()
    {
        return $this->classe::paginate();
    }

    public function store(Request $request)
    {
        return response()->json($this->classe::create($request->all()),201);
    }

    public function show(int $id)
    {
        $recurso = $this->classe::find($id);
        if(is_null($recurso)) {
            return response()->json('',204);
        }
        return response()->json($recurso,200);
    }

    public function update(int $id, Request $request)
    {
        $recurso = $this->classe::find($id);
        if(is_null($recurso)) {
            return response()->json(['error'=>'Recurso não encontrada'],404);
        }
        $recurso->fill($request->all());
        $recurso->save();
        return response()->json($recurso);
    }

    public function destroy(int $id)
    {
        $qtdRecursosRemovidos = $this->classe::destroy($id);
        if ($qtdRecursosRemovidos>0) {
            return response()->json('',204);
        }
        return response()->json(['error'=>'Recurso não encontrada'],404);
    }
}
