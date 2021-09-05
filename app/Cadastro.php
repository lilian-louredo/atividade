<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cadastro extends Model
{
    protected $fillable = ['nome','cpf','data_nascimento','email','telefone','logradouro','cidade','estado'];
}
