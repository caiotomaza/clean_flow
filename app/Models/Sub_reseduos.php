<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sub_reseduos extends Model
{
    protected $table = 'sub_reseduos';

    protected $primaryKey = 'id_sub_resd';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = ['id_resd', 'nome'];
    
    public $timestamps = false;
}
