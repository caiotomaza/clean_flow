<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    use HasFactory;
    
    protected $table = 'municipios';

    protected $primaryKey = 'id_mun';
    public $incrementing = true; // Indica se a chave primária é auto-incrementante
    protected $keyType = 'int'; // Tipo da chave primária (opcional - padrão é 'int')

    protected $fillable = [
        'id_est',
        'nome'
    ];
    
    public $timestamps = false;
 
    protected $casts = [
        'ativo' => 'boolean',
        'preco' => 'decimal:2',
    ];

    public function Estado()
    {
        return $this->belongsTo(User::class, 'id_est');
    }
}
