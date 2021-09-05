<?php

namespace App\Services;

use App\Cadastro;
use Illuminate\Support\Facades\DB;

class CriadorDeCadastros
{
    public function criarCadastro(
       $nome,
       $cpf,
       $data_nascimento,
       $email,
       $telefone,
       $logradouro,
       $cidade,
       $estado
    ): Cadastro {
        DB::beginTransaction();
        $Cadastro = Cadastro::create(
            [
                'nome' => $nome,
                'cpf' => $cpf,
                'data_nascimento' => $data_nascimento,
                'email' => $email,
                'telefone' => $telefone,
                'logradouro' => $logradouro,
                'cidade' => $cidade,
                'estado' => $estado

            ]
        );
        DB::commit();

        return $Cadastro;
    }
}
