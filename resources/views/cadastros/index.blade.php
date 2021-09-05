@extends('layout')

@section('cabecalho')
    Cadastros
@endsection

@section('conteudo')

    @if(!empty($mensagem))
        <div class="alert alert-success">
            {{ $mensagem }}
        </div>
    @endif

    <a href="{{ route('form_criar_cadastro') }}" class="btn btn-dark mb-2">Adicionar</a>

    <ul class="list-group">
        @foreach($cadastros as $cadastro)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <span id="nome-cadastro-{{ $cadastro->id }}">{{ $cadastro->nome }}</span>

                <span class="d-flex">
            <a href="/cadastros/{{ $cadastro->id }}/editar" class="btn btn-info btn-sm mr-1">
                <i class="fas fas fa-edit"></i>
            </a>

            <form method="post" action="/cadastros/{{ $cadastro->id }}"
                  onsubmit="return confirm('Tem certeza que deseja remover {{ addslashes($cadastro->nome) }}?')">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm">
                    <i class="far fa-trash-alt"></i>
                </button>
            </form>
        </span>
            </li>
        @endforeach
    </ul>
@endsection
