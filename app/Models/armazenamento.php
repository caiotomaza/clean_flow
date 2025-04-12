<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class armazenamento extends Model
{
    protected $table = 'armazenamentos';

    protected $primaryKey = 'id_arm';
    public $incrementing = false; // Indica se a chave primária é auto-incrementante
    protected $keyType = 'int'; // Tipo da chave primária (opcional - padrão é 'int')

    protected $fillable = ['id_sub_resd', 'peso', 'data_hora'];
    
    public $timestamps = false;
 
    protected $casts = [
        'ativo' => 'boolean',
        'preco' => 'decimal:2',
    ];
}