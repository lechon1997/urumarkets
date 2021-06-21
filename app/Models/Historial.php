<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historial extends Model
{
    use HasFactory;
    protected $table = 'historial';
    public $timestamps = false;
    protected $primaryKey = 'id';

    public function Cliente(){
        return $this->hasOne(Cliente::class,'id');
    }

    public function Vendedor(){
        return $this->hasOne(Vendedor::class,'id');
    }

    public function Publicacion(){
        return $this->hasOne(Publicacion::class,'id');
    }

}
