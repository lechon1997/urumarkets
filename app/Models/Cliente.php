<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    protected $table = 'cliente';
    public $timestamps = false;

    protected $primaryKey = 'id';

    public function Usuario()
    {
        return $this->belongsTo(Usuario::class,'id');
    }

    public function c_ps()
    {
        return $this->hasMany(C_P::class,'id');
    }

    public function getAuthIdentifier()
  {
    return $this->id;
  }
    
}
