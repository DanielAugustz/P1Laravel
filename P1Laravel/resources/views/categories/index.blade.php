@extends('layouts.app') 

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Listagem de Categorias</h2>
        <a href="{{ route('categories.create') }}" class="btn btn-primary">
            + Criar Nova Categoria
        </a>
    </div>

    {{-- Mensagem de Feedback --}}
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    {{-- Tabela de Categorias --}}
    @if ($categories->isEmpty())
        <div class="alert alert-info">Nenhuma categoria encontrada. Crie a primeira!</div>
    @else
        <table class="table table-striped table-hover mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Data Criada</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->nome }}</td>
                    <td>{{ $category->descricao ?? '-' }}</td>
                    {{-- EXIBIÇÃO DA DATA FORMATADA (d/m/Y) --}}
                    <td>{{ $category->created_at->format('d/m/Y H:i') }}</td>
                    <td>
                        {{-- Botão EDITAR --}}
                        <a href="{{ route('categories.edit', $category) }}" class="btn btn-sm btn-info me-2">
                            Editar
                        </a>

                        {{-- Formulário/Botão EXCLUIR --}}
                        <form action="{{ route('categories.destroy', $category) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" 
                                onclick="return confirm('Tem certeza que deseja excluir a categoria {{ $category->nome }}?')">
                                Excluir
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection