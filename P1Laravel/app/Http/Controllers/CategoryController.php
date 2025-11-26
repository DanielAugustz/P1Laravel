<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // READ (Listar categorias)
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    // CREATE (Exibir formulário de criação)
    public function create()
    {
        return view('categories.create');
    }

    // CREATE (Salvar nova categoria)
    public function store(Request $request)
    {
        // 1. Validação dos dados
        $request->validate([
            'nome' => 'required|string|max:100',
            'descricao' => 'nullable|string', // A descrição é opcional
        ]);

        // 2. Criação do registro usando o Model
        Category::create($request->all());
        
        // 3. Redirecionamento com mensagem de sucesso
        return redirect()->route('categories.index')->with('success', 'Categoria criada com sucesso!');
    }

    // READ (Exibir detalhes - Método padrão, opcional para CRUD básico)
    public function show(Category $category)
    {
        return view('categories.show', compact('category'));
    }

    // UPDATE (Exibir formulário de edição)
    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    // UPDATE (Atualizar categoria no banco)
    public function update(Request $request, Category $category)
    {
        // 1. Validação dos dados
        $request->validate([
            'nome' => 'required|string|max:100',
            'descricao' => 'nullable|string',
        ]);

        // 2. Atualiza o registro
        $category->update($request->all());
        
        return redirect()->route('categories.index')->with('success', 'Categoria atualizada com sucesso!');
    }

    // DELETE (Excluir categoria)
    public function destroy(Category $category)
    {
        // 1. Deleta o registro
        $category->delete();
        
        return redirect()->route('categories.index')->with('success', 'Categoria excluída com sucesso!');
    }
}