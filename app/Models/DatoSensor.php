<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DatoSensor extends Model
{
    use HasFactory;
    protected $table = 'datos_sensores';
    protected $primaryKey = 'id_dato';

    protected $fillable = ['fecha_hora', 'valor', 'tipo_dato', 'id_dispositivo'];

    // Relación muchos a uno con Dispositivos IoT
    public function dispositivoIot()
    {
        return $this->belongsTo(DispositivoIoT::class, 'id_dispositivo');
    }
}
