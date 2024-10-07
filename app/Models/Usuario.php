<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;
    protected $table = 'usuarios';
    protected $primaryKey = 'id_usuario';

    protected $fillable = ['nombre', 'correo', 'contraseña'];

    // Relación uno a muchos con Zonas de Riego
    public function zonasRiego()
    {
        return $this->hasMany(ZonaRiego::class, 'id_usuario');
    }
    
}
