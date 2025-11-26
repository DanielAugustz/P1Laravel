<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController; // Importa o Controller que você criou

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Aqui é onde você pode registrar rotas web para sua aplicação. 
| Estes routes são carregados pelo RouteServiceProvider dentro de um grupo 
| que contém o middleware "web". Agora crie algo incrível!
|
*/

// 1. Rota de Boas-vindas ou Redirecionamento
// Redireciona a rota base (/) diretamente para a listagem de categorias.
Route::get('/', function () {
    return redirect()->route('categories.index');
});

// 2. Rotas de Recurso para o CRUD de Categorias
// Este comando gera automaticamente 7 rotas RESTful, mapeando-as 
// para os métodos (index, create, store, show, edit, update, destroy) do CategoryController.
// Boa prática de rotas para CRUDs.
Route::resource('categories', CategoryController::class);

// Dica: Para ver todas as rotas geradas, execute no terminal do container:
// docker exec laravel_app php artisan route:list