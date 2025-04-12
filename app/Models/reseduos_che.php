<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class reseduos_che extends Model
{
    protected $table = 'reseduos_ches';

    protected $primaryKey = 'id_entrada';
    public $incrementing = true; // Indica se a chave primária é auto-incrementante
    protected $keyType = 'int'; // Tipo da chave primária (opcional - padrão é 'int')

    protected $fillable = ['id_vec', 'peso', 'data_hora'];
    
    public $timestamps = false;
 
    protected $casts = [
        'ativo' => 'boolean',
        'preco' => 'decimal:2',
    ];
}
