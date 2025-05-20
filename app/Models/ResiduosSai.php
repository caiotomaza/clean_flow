<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResiduosSai extends Model
{

    use HasFactory;
    
    protected $table = 'reseduos_sais';

    protected $primaryKey = 'id_saida';
    public $incrementing = true; // Indica se a chave primária é auto-incrementante
    protected $keyType = 'int'; // Tipo da chave primária (opcional - padrão é 'int')

    protected $fillable = ['id_saida','id_filial', 'id_arm', 'id_vec', 'data_hora'];

    public $timestamps = false;
 
    protected $casts = [
        'ativo' => 'boolean',
        'preco' => 'decimal:2',
    ];

    public function armazenamento()
    {
        return $this->belongsTo(Armazenamento::class, 'id_arm', 'id_arm');
    }

    public function veiculo()
    {
        return $this->belongsTo(Veiculo::class, 'id_vec', 'id_vec');
    }

    public function filial()
    {
        return $this->belongsTo(Filial::class, 'id_filial', 'id_fil');
    }
}
