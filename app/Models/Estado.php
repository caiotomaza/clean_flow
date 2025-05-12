<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $table = 'estados';

    protected $primaryKey = 'id_est';
    public $incrementing = true; // Indica se a chave primária é auto-incrementante
    protected $keyType = 'int'; // Tipo da chave primária (opcional - padrão é 'int')

    protected $fillable = ['uf'];
    
    public $timestamps = false;
 
    protected $casts = [
        'ativo' => 'boolean',
        'preco' => 'decimal:2',
    ];
}
