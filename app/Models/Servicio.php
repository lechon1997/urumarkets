<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    use HasFactory;
    protected $table = 'servicio';
    public $timestamps = false;

    public function Publicacion()
    {
        return $this->belongsTo(Publicacion::class);
    }
}
