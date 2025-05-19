<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    use HasFactory;

    protected $table = 'estados';

    protected $primaryKey = 'id_est';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'uf'
    ];
    
    public $timestamps = false;

    protected $casts = [
        'ativo' => 'boolean',
        'preco' => 'decimal:2',
    ];
}
