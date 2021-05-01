<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable
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

  public function publicaciones(){
    return $this->hasMany(Publicacion::class);
  }

}
