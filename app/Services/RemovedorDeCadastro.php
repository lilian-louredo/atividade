<?php
namespace App\Services;

use App\Cadastro;
use Illuminate\Support\Facades\DB;

class RemovedorDeCadastro
{
    public function removerCadastro(int $CadastroId): string
    {
        $nomeCadastro = '';
        DB::transaction(function () use ($CadastroId, &$nomeCadastro) {
            $cadastro = Cadastro::find($CadastroId);
            $nomeCadastro = $cadastro->nome;

            $cadastro->delete();
        });

        return $nomeCadastro;
    }
}
