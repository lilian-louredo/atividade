@extends('layout')

@section('cabecalho')
    Adicionar Cadastro

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo asset('js/select_estados.js')?>"></script>

@endsection

@section('conteudo')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form method="post">
        @csrf
        <div class="row">
            <div class="col col-8 ">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" name="nome" id="nome">
            </div>
        </div>

        <div class="row mt-4">
            <div class="col col-8">
                <label for="cfp">CPF</label>
                <input type="text" class="form-control" name="cpf" id="cpf">
            </div>
        </div>

        <div class="row mt-4">
            <div class="col col-8">
                <label for="data_nascimento">Data de Nascimento</label>
                <input type="text" class="form-control" name="data_nascimento" id="data_nascimento">
            </div>
        </div>

        <div class="row mt-4">
            <div class="col col-8">
                <label for="email">Email</label>
                <input type="text" class="form-control" name="email" id="email">
            </div>
        </div>

        <div class="row mt-4">
            <div class="col col-8">
                <label for="telefone">Telefone</label>
                <input type="text" class="form-control" name="telefone" id="telefone">
            </div>
        </div>

        <div class="row mt-4">
            <div class="col col-8">
                <label for="logradouro">Logradouro</label>
                <input type="text" class="form-control" name="logradouro" id="logradouro">
            </div>
        </div>

        <div class="row mt-4">
            <div class="col col-4">
                <label for="estado">Estado</label>
                <select name="estado" class="form-control" id="estados">
                    <option value=""></option>
                </select>
            </div>

            <div class="col col-4">
                <label for="cidade">Cidade</label>
                <select name="cidade" class="form-control" id="cidades">
                    <option value=""></option>
                </select>
            </div>
        </div>

        <button class="btn btn-primary mt-4">Adicionar</button>
    </form>

@endsection
