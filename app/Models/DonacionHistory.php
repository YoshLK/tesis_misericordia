<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonacionHistory extends Model
{
    
    protected $table = 'donaciones_history';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function donacion()
    {
        return $this->belongsTo(Donacion::class, 'donacion_id');
    }
}
