<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\FornecedorRequest;
use App\Fornecedor;

class FornecedorController extends Controller
{

    public function index(Request $request, Fornecedor $Fornecedor)
    {
        $dados = $Fornecedor->newQuery();
        if ($request->filled('nome_fantasia')) {
            $dados->where('nome_fantasia', 'like', '%' . $request->nome_fantasia . '%');
        }
        if ($request->filled('cpf_cnpj')) {
            $dados->where('cpf_cnpj', '=',  $request->cpf_cnpj );
        }
        $dados = $dados->orderBy('nome_fantasia');

        return response()->json($dados->paginate(5), 200);
    }


    public function store(FornecedorRequest $request)
    {
        $param = $request->all();
        try {
            $dados = Fornecedor::create($param);
        } catch (Exception $e) {
            return response('Erro:' . $e->getMessage(), 500);
        }
        return response()->json('Dados salvos', 200);
    }


    public function show($id)
    {
        try {
            $dados = Fornecedor::find($id);
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
            $dados = Fornecedor::findOrFail($id);
            $dados->update($param);
        } catch (Exception $e) {
            return response('Erro:' . $e->getMessage(), 500);
        }
        return response()->json(['Dados atualizados', 'Dados' => $dados], 200);
    }


    public function destroy($id)
    {
        try {
            $dados = Fornecedor::find($id);
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
