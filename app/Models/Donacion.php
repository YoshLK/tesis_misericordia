<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Donacion extends Model
{
    use HasFactory;
    use SoftDeletes;
    public function donador(){
        return $this->belongsTo(Donador::class, 'donador_id');
    }

    public function createdBy(){
    return $this->belongsTo(User::class, 'created_by');
    }

    public function updatedBy(){
    return $this->belongsTo(User::class, 'updated_by');
    }

}
