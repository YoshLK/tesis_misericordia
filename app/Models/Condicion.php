<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Condicion extends Model
{
    use HasFactory;

    public function adultoCondicionDatos(){
     
        return $this->belongsTO(Adulto::class);
    }
}
