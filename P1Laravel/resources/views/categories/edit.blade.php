@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h2 class="mb-4">Editar Categoria: {{ $category->nome }}</h2>
            
            <a href="{{ route('categories.index') }}" class="btn btn-secondary mb-3">
                ← Voltar
            </a>

            {{-- Exibição de Erros de Validação --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    **Houve erros de validação:**
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Formulário para o método update --}}
            <div class="card">
                <div class="card-header">Editar Detalhes</div>
                <div class="card-body">
                    <form action="{{ route('categories.update', $category) }}" method="POST">
                        @csrf 
                        @method('PUT') {{-- Essencial para o UPDATE --}}

                        {{-- Campo NOME --}}
                        <div class="mb-3">
                            <label for="nome" class="form-label">Nome <span class="text-danger">*</span></label>
                            <input type="text" 
                                   class="form-control @error('nome') is-invalid @enderror" 
                                   id="nome" 
                                   name="nome" 
                                   value="{{ old('nome', $category->nome) }}"
                                   required 
                                   maxlength="100">
                            @error('nome')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Campo DESCRIÇÃO --}}
                        <div class="mb-3">
                            <label for="descricao" class="form-label">Descrição (Opcional)</label>
                            <textarea class="form-control @error('descricao') is-invalid @enderror" 
                                      id="descricao" 
                                      name="descricao" 
                                      rows="3">{{ old('descricao', $category->descricao) }}</textarea>
                            @error('descricao')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <button type="submit" class="btn btn-warning">Atualizar Categoria</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection