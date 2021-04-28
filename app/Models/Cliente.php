<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    public function Usuario()
    {
        return $this->belongsTo(Usuario::class);
    }

    public function c_ps()
    {
        return $this->hasMany(C_P::class);
    }
    
}
