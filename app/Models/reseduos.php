<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reseduos extends Model
{
    protected $table = 'reseduos';

    protected $primaryKey = 'id_resd';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = ['nome'];
    
    public $timestamps = false;
}
