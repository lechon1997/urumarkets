<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $table = 'producto';
    public $primaryKey  = 'producto_id';
    public $timestamps = false;

    public function Publicacion()
    {
        return $this->belongsTo(Publicacion::class);
    }   

}
