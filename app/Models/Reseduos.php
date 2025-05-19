<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reseduos extends Model
{
    use HasFactory;

    protected $table = 'reseduos';

    protected $primaryKey = 'id_resd';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = ['nome'];
    
    public $timestamps = false;

    public function armazenamentos()
    {
        return $this->hasMany(Armazenamento::class);
    }
}
