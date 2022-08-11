<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservas extends Model
{
    use HasFactory;


    // relacion 1 a muchos con tabla clientes
    public function clientes()
    {
        return $this->belongsTo(Clientes::class);
	}
}
