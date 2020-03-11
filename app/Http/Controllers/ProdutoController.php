<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProdutoRequest;
use App\Produto;

class ProdutoController extends Controller
{

    public function index(Request $request, Produto $Produto)
    {
        $dados = $Produto->newQuery();
        if ($request->filled('descricao')) {
            $dados->where('descricao', 'like', '%' . $request->descricao . '%');
        }
        $dados = $dados->with(['fabricante','fornecedor','categoria'])->orderBy('id');

        return response()->json($dados->paginate(5), 200);
    }


    public function store(ProdutoRequest $request)
    {
        $param = $request->all();
        try {
            $dados = Produto::create($param);
        } catch (Exception $e) {
            return response('Erro:' . $e->getMessage(), 500);
        }
        return response()->json('Dados salvos', 200);
    }


    public function show($id)
    {
        try {
            $dados = Produto::find($id);
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
            $dados = Produto::findOrFail($id);
            $dados->update($param);
        } catch (Exception $e) {
            return response('Erro:' . $e->getMessage(), 500);
        }
        return response()->json(['Dados atualizados', 'Dados' => $dados], 200);
    }


    public function destroy($id)
    {
        try {
            $dados = Produto::find($id);
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
