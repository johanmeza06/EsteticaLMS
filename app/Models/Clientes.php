<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    use HasFactory;



    // relacion 1 a muchos con tabla reservas

    public function reservas()
    {
        return $this->hasMany(Reservas::class,'id');
    }

}
