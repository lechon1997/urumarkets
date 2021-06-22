<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable
{
  use HasFactory,Notifiable;

  protected $table = 'usuario';
  public $timestamps = false;
  protected $primaryKey = 'id';
  private $isadmin;
    
    protected $fillable = [
        'primerNombre',
        'segundoNombre',
        'primerApellido',
        'segundoApellido',
        'cedula',
        'email',
        'password',
        'telefono',
        'idDepartamento',
        'idLocalidad',
        'isadmin'
    ];

    protected $hidden = [
      'password',
      'remember_token',
  ];

  public function isAdmin(){
    return $this->isadmin;
  }

  public function setAdmin($estado){
    $this->isadmin = $estado;
  }

  public function clientes()
  {
    return $this->hasMany(Cliente::class,'id');
  }

  public function vendedores()
  {
    return $this->hasMany(Vendedor::class,'id');
  }

  public function localidad()
  {
    return $this->hasOne(Localidad::class);
  }

  public function publicaciones()
  {
    return $this->hasMany(Publicacion::class);
  }


}
