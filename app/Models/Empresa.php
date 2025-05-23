<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $table = 'empresas';

    protected $primaryKey = 'id_emp';
    public $incrementing = true; // Indica se a chave primária é auto-incrementante
    protected $keyType = 'int'; // Tipo da chave primária (opcional - padrão é 'int')

    protected $fillable = [
        'id_temp', 
        'nome_fans', 
        'razao_social', 
        'cnpj', 
        'ie', 
        'im', 
        'email', 
        'telefone'
    ];
    
    public $timestamps = false;
 
    protected $casts = [
        'ativo' => 'boolean',
        'preco' => 'decimal:2',
    ];

    public function tipo_empresa()
    {
        return $this->belongsTo(User::class, 'id_temp');
    }
}