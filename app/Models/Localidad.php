<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Localidad extends Model
{
    use HasFactory;
	protected $table = 'localidad';
    public $timestamps = false;
    public function usuarios(){
  		return $this->hasMany(Usuario::class);
	}

	public function Departamento(){
  		return $this->hasOne(Departamento::class);
	}
}
