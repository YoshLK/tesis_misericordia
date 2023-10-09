<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Responsable extends Model
{
    use HasFactory;

    public function adultoResponsableDatos(){
     
        return $this->belongsTO(Adulto::class);
    }
}
