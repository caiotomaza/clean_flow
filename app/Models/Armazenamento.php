<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Armazenamento extends Model
{

     use HasFactory;
     
    protected $table = 'armazenamentos';
    protected $primaryKey = 'id_arm';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'container',
        'id_sub_resd',
        'id_resd',
        'peso',
        'data_hora',
        'tipo_registro',
    ];

    public $timestamps = false;

    protected $casts = [
        'peso' => 'decimal:2',
        'data_hora' => 'datetime',
    ];

    /**
     * Define o relacionamento: Um Armazenamento PERTENCE A um Reseduo.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function residuo()
    {
        return $this->belongsTo(Reseduos::class, 'id_resd', 'id_resd');
    }

    public function subResiduo()
    {
        return $this->belongsTo(SubReseduos::class, 'id_sub_resd', 'id_sub_resd');
    }

}