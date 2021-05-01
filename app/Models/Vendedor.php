<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendedor extends Model
{
    use HasFactory;
    protected $table = 'vendedor';
    public $timestamps = false;

    public function Usuario()
    {
        return $this->belongsTo(Usuario::class);
    }
}
