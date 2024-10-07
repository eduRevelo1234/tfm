<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DispositivoIoT extends Model
{
    use HasFactory;
    protected $table = 'dispositivos_iot';
    protected $primaryKey = 'id_dispositivo';

    protected $fillable = ['tipo', 'estado', 'id_zona'];

    // Relación muchos a uno con Zonas de Riego
    public function zonaRiego()
    {
        return $this->belongsTo(ZonaRiego::class, 'id_zona');
    }

    // Relación uno a muchos con Datos de Sensores
    public function datosSensores()
    {
        return $this->hasMany(DatoSensor::class, 'id_dispositivo');
    }
}
