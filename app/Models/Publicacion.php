<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publicacion extends Model
{
    use HasFactory;
    protected $table = 'publicacion';
    public $timestamps = false;

    public function productos(){
  		return $this->hasMany(Producto::class, 'id');
	}

	public function servicios(){
  		return $this->hasMany(Servicio::class, 'id');
	}

	public function Usuario(){
		return $this->hasOne(Usuario::class, 'id');
	}

}
