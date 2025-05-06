<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class reseduos_sai extends Model
{
    protected $table = 'reseduos_sais';

    protected $primaryKey = 'id_saida';
    public $incrementing = true; // Indica se a chave primária é auto-incrementante
    protected $keyType = 'int'; // Tipo da chave primária (opcional - padrão é 'int')

    protected $fillable = ['id_arm', 'id_vec', 'data_hora'];
    
    public $timestamps = false;
 
    protected $casts = [
        'ativo' => 'boolean',
        'preco' => 'decimal:2',
    ];
}
