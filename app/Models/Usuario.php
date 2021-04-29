<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{

	use HasFactory;
	protected $table = 'usuario';
    public $timestamps = false;

    public function clientes(){
  		return $this->hasMany(Cliente::class);
	}

	public function vendedores(){
  		return $this->hasMany(Vendedor::class);
	}

	public function localidad(){
  		return $this->hasOne(Localidad::class);
	}

}
