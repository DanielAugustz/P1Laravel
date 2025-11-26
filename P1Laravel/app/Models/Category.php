<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    /**
     * Os atributos que são preenchíveis em massa (Mass Assignable).
     * Essencial para que o Category::create($request->all()) funcione.
     *
     * @var array
     */
    protected $fillable = [
        'nome', 
        'descricao',
    ];

    /**
     * Opcional: Define explicitamente o nome da tabela no banco de dados.
     * O padrão do Laravel (plural do nome do Model) já é 'categories'.
     * * @var string
     */
    protected $table = 'categories';
}