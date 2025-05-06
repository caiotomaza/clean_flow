<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Filial extends Model
{
    protected $table = 'filials';

    protected $primaryKey = 'id_fil';
    public $incrementing = true; // Indica se a chave primária é auto-incrementante
    protected $keyType = 'int'; // Tipo da chave primária (opcional - padrão é 'int')

    protected $fillable = [
        'id_emp', 
        'id_log', 
        'nome'
    ];
    
    public $timestamps = false;
 
    protected $casts = [
        'ativo' => 'boolean',
        'preco' => 'decimal:2',
    ];

    public function empresa()
    {
        return $this->belongsTo(User::class, 'id_emp');
    }

    public function endereco()
    {
        return $this->belongsTo(User::class, 'id_log');
    }
}