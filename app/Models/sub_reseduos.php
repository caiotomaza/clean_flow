<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class sub_reseduos extends Model
{
    protected $table = 'sub_reseduoss';

    protected $primaryKey = 'id_sub_resd';
    public $incrementing = true; // Indica se a chave primária é auto-incrementante
    protected $keyType = 'int'; // Tipo da chave primária (opcional - padrão é 'int')

    protected $fillable = ['id_resd', 'nome'];
    
    public $timestamps = false;
 
    protected $casts = [
        'ativo' => 'boolean',
        'preco' => 'decimal:2',
    ];
}
