<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Veiculo extends Model
{
    use HasFactory;

    protected $table = 'veiculos';

    protected $primaryKey = 'id_vec';

    public $timestamps = false;

    protected $fillable = [
        'id_fil',
        'placa',
    ];

    public function filial()
    {
        return $this->belongsTo(Filial::class, 'id_fil');
    }
}
