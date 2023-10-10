<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adulto extends Model
{
    use HasFactory;
    //relacion uno a muhcos Adulto a Referencia
    /* public function referenciaDatos(){
        return $this->hasMany(Referencia::class);
    } */

    public function responsable()
    {
        return $this->hasOne(Responsable::class);
    }

    public function condicionFisica()
    {
        return $this->hasOne(Condicion::class);
    }

    public function ficha()
    {
        return $this->hasOne(Ficha::class);
    }
    
}
