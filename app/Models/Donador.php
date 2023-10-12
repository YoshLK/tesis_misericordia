<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donador extends Model
{
    use HasFactory;
    
    public function donacion(){
        return $this->hasMany(Donacion::class);
    } 
}
