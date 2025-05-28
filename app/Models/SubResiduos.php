<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class SubResiduos extends Model{
        use HasFactory;

        protected $table = 'sub_residuos';

        protected $primaryKey = 'id_sub_resd';
        public $incrementing = true;
        protected $keyType = 'int';

        protected $fillable = ['id_resd', 'nome'];
        
        public $timestamps = false;
    }
?>