<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reseduosche extends Model
{
     use HasFactory;

    protected $table = 'reseduos_ches'; // garanta que o nome da tabela esteja correto
    protected $primaryKey = 'id_entrada'; // personalizado, pois não é 'id'
    public $incrementing = true; // Indica se a chave primária é auto-incrementante
    protected $keyType = 'int'; // Tipo da chave primária (opcional - padrão é 'int')

    protected $fillable = [
        'id_filial',
        'id_vec',
        'peso',
        'data_hora',
        'id_resd',
        'id_sub_resd',
        'id_responsavel',
        'tipo_registro',
    ];
    
    public $timestamps = false;
 
    protected $casts = [
        'ativo' => 'boolean',
        'preco' => 'decimal:2',
    ];

    public function responsavel()
    {
        return $this->belongsTo(User::class, 'id_responsavel');
    }

    public function residuo()
    {
        return $this->belongsTo(Reseduos::class, 'id_resd');
    }

    public function subresiduo()
    {
        return $this->belongsTo(SubReseduos::class, 'id_sub_resd');
    }
    public function filial()
    {
        return $this->belongsTo(Filial::class, 'id_filial', 'id_fil');
    }

}
