<?php

namespace App\Http\Controllers;

use App\Cadastro;
use App\Http\Requests\CadastrosFormRequest;
use App\Services\CriadorDeCadastros;
use App\Services\RemovedorDeCadastro;
use Illuminate\Http\Request;

class CadastrosController extends Controller
{
    public function index(Request $request)
    {
        $cadastros = Cadastro::query()
            ->orderBy('nome')
            ->get();
        $mensagem = $request->session()->get('mensagem');

        return view('cadastros.index', compact('cadastros', 'mensagem'));
    }

    public function create()
    {
        return view('cadastros.create');
    }

    public function store(CadastrosFormRequest $request,CriadorDeCadastros $criadorDeCadastros,$cadastroId=false)
    {
        if($cadastroId)
        {
            $cadastro = Cadastro::find($cadastroId);
            $cadastro->nome = $request->nome;
            $cadastro->cpf = $request->cpf;
            $cadastro->data_nascimento = $request->data_nascimento;
            $cadastro->email = $request->email;
            $cadastro->telefone = $request->telefone;
            $cadastro->logradouro = $request->logradouro;
            $cadastro->cidade = $request->cidade;
            $cadastro->estado =$request->estado;
            $cadastro->save();

            $msg = "Cadastro alterado com sucesso.";
        }
        else
        {
            $criadorDeCadastros->criarCadastro(
                $request->nome,
                $request->cpf,
                $request->data_nascimento,
                $request->email,
                $request->telefone,
                $request->logradouro,
                $request->cidade,
                $request->estado
            );

            $msg = "Cadastro criado com sucesso.";
        }

        $request->session()
            ->flash(
                'mensagem',
                $msg
            );

        return redirect()->route('listar_cadastros');
    }

    public function editar(int $cadastroId)
    {
        $cadastro = Cadastro::find($cadastroId);

        return view(
            'cadastros.editar',
            compact('cadastro')
        );
    }

    public function destroy(Request $request, RemovedorDeCadastro $removedorDeCadastro)
    {
        $removedorDeCadastro->removerCadastro($request->id);
        $request->session()
            ->flash(
                'mensagem',
                "Cadastro removido com sucesso"
            );
        return redirect()->route('listar_cadastros');
    }
}
