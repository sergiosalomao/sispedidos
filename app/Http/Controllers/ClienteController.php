<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ClienteRequest;
use App\Cliente;

class ClienteController extends Controller
{

    public function index(Request $request, Cliente $Cliente)
    {
        $dados = $Cliente->newQuery();
        if ($request->filled('nome')) {
            $dados->where('nome', 'like', '%' . $request->nome . '%');
        }
        if ($request->filled('cpfcnpj')) {
            $dados->where('cpfcnpj', '=',  $request->cpfcnpj );
        }
        $dados = $dados->orderBy('nome');

        return response()->json($dados->paginate(5), 200);
    }


    public function store(ClienteRequest $request)
    {
        $param = $request->all();
        try {
            $dados = Cliente::create($param);
        } catch (Exception $e) {
            return response('Erro:' . $e->getMessage(), 500);
        }
        return response()->json('Dados salvos', 200);
    }


    public function show($id)
    {
        try {
            $dados = Cliente::find($id);
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
            $dados = Cliente::findOrFail($id);
            $dados->update($param);
        } catch (Exception $e) {
            return response('Erro:' . $e->getMessage(), 500);
        }
        return response()->json(['Dados atualizados', 'Dados' => $dados], 200);
    }


    public function destroy($id)
    {
        try {
            $dados = Cliente::find($id);
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
