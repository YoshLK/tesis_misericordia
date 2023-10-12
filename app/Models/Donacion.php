<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donacion extends Model
{
    use HasFactory;
    
    public function donador(){
        return $this->belongsTo(Donador::class, 'donador_id');
    }
}
