<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LocalArmazenamentoRequest;
use App\LocalArmazenamento;

class LocalArmazenamentoController extends Controller
{

    public function index(Request $request, LocalArmazenamento $LocalArmazenamento)
    {
        $dados = $LocalArmazenamento->newQuery();
        if ($request->filled('descricao')) {
            $dados->where('descricao', 'like', '%' . $request->descricao . '%');
        }

        $dados = $dados->orderBy('descricao');

        return response()->json($dados->paginate(5), 200);
    }


    public function store(LocalArmazenamentoRequest $request)
    {
        $param = $request->all();
        try {
            $dados = LocalArmazenamento::create($param);
        } catch (Exception $e) {
            return response('Erro:' . $e->getMessage(), 500);
        }
        return response()->json('Dados salvos', 200);
    }


    public function show($id)
    {
        try {
            $dados = LocalArmazenamento::find($id);
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
            $dados = LocalArmazenamento::findOrFail($id);
            $dados->update($param);
        } catch (Exception $e) {
            return response('Erro:' . $e->getMessage(), 500);
        }
        return response()->json(['Dados atualizados', 'Dados' => $dados], 200);
    }


    public function destroy($id)
    {
        
        try {
            $dados = LocalArmazenamento::find($id);
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
