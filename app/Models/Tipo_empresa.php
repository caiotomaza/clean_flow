<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tipo_empresa extends Model
{
    protected $table = 'tipo_empresas';

    protected $primaryKey = 'id_temp';
    public $incrementing = true; // Indica se a chave primária é auto-incrementante
    protected $keyType = 'int'; // Tipo da chave primária (opcional - padrão é 'int')

    protected $fillable = ['nome'];
    
    public $timestamps = false;
 
    protected $casts = [
        'ativo' => 'boolean',
        'preco' => 'decimal:2',
    ];
}
