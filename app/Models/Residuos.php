<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class Residuos extends Model{
        use HasFactory;

        protected $table = 'residuos';

        protected $primaryKey = 'id_resd';
        public $incrementing = true;
        protected $keyType = 'int';

        protected $fillable = ['nome'];
        
        public $timestamps = false;

        public function armazenamentos()
        {
            return $this->hasMany(Armazenamento::class);
        }

        public function subResiduos()
        {
            return $this->hasMany(SubResiduos::class, 'id_resd', 'id_resd');
        }
    }
?>
