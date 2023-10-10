<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adulto extends Model
{
    use HasFactory;
    //relacion uno a muhcos Adulto a Referencia
    
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

    public function referenciaDatos(){
        return $this->hasMany(Referencia::class);
    } 

    //relacion uno a uno historial
    public function historialDatos(){
     
        return $this->hasOne(Historial::class);
    }

    public function patologiasDatos(){
        return $this->hasMany(Patologia::class);
    } 
    
}
