<?php

namespace App\Listeners;

use App\Events\DonacionUpdated;
use App\Models\DonacionHistory;
use Illuminate\Support\Facades\Auth;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class DonacionUpdatedListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(DonacionUpdated $event)
    {   
        $donacion = $event->donacion; 

        $history = new DonacionHistory();
        $history->donador = $donacion->donador->nombre_donador;
        $history->tipo_donacion = $donacion->tipo_donacion;
        $history->descripcion = $donacion->descripcion;
        $history->modifico = $event->user->name;
        if ($donacion->deleted_at) {
            $history->operation_type = 'Eliminación';
        } else {
            $history->operation_type = 'Edición';
        }
        $history->save();
        
    }

}
