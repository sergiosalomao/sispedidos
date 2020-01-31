<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{

    public function index(Request $request, User $User)
    {
        $dados = $User->newQuery();
        if ($request->filled('name')) {
            $dados->where('name', 'like', '%' . $request->name . '%');
        }
        if ($request->filled('email')) {
            $dados->where('email', '=',  $request->email );
        }
        $dados = $dados->orderBy('name');

        return response()->json($dados->paginate(5), 200);
    }


    public function store(Request $request)
    {
        $param = $request->all();
        try {
            $dados = User::create($param);
        } catch (Exception $e) {
            return response('Erro:' . $e->getMessage(), 500);
        }
        return response()->json('Dados salvos', 200);
    }


    public function show($id)
    {
        try {
            $dados = User::find($id);
            if (empty($dados)) {
                return response('registro nao encontrado.', 200);
            }
        } catch (Exception $e) {
            return response('Erro:' . $e->getMessage(), 500);
        }

        return response($dados);
    }


    public function update(Request $request, $id)
    {
        $param = $request->all();
        try {
            $dados = User::findOrFail($id);
            $dados->update($param);
        } catch (Exception $e) {
            return response('Erro:' . $e->getMessage(), 500);
        }
        return response()->json(['Dados atualizados', 'Dados' => $dados], 200);
    }


    public function destroy($id)
    {
        try {
            $dados = User::find($id);
            if (empty($dados)) {
                return response('registro nao encontrado.', 200);
            }
            $dados->delete();
            return response()->json(['Dados excluidos', 'DADOS' => $dados], 200);
        } catch (Exception $e) {
            return response('Erro:' . $e->getMessage(), 500);
        }
    }
}
