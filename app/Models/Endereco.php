<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    protected $table = 'enderecos';

    protected $primaryKey = 'id_log';
    public $incrementing = true; // Indica se a chave primária é auto-incrementante
    protected $keyType = 'int'; // Tipo da chave primária (opcional - padrão é 'int')

    protected $fillable = [
        'id_mun',
        'logradouro',
        'numero'
    ];
    
    public $timestamps = false;
 
    protected $casts = [
        'ativo' => 'boolean',
        'preco' => 'decimal:2',
    ];

    public function Municipio()
    {
        return $this->belongsTo(User::class, 'id_mun');
    }
}
