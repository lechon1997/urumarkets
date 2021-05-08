<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Localidad extends Model
{
    use HasFactory;
	protected $table = 'localidad';
    public $timestamps = false;
	protected $primaryKey = 'id';
	
    public function usuarios(){
  		return $this->hasMany(Usuario::class,'id');
	}

	public function Departamento(){
  		return $this->hasOne(Departamento::class,'id');
	}
}
