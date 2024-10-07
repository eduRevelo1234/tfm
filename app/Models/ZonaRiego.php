<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ZonaRiego extends Model
{
    use HasFactory;
    protected $table = 'zonas_riego';
    protected $primaryKey = 'id_zona';

    protected $fillable = ['nombre_zona', 'ubicacion', 'humedad_min', 'humedad_max', 'temperatura_min', 'temperatura_max', 'id_usuario'];

    // Relación muchos a uno con Usuarios
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario');
    }

    // Relación uno a muchos con Dispositivos IoT
    public function dispositivos()
    {
        return $this->hasMany(DispositivoIoT::class, 'id_zona');
    }
}
