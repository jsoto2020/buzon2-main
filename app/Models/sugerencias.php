<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sugerencias extends Model
{
    use HasFactory;

    protected $fillable = [
        'cedula',
        'nombre',
        'apellido',
        'tipo',
        'descripcion',
        'auditoria',
        'contacto',
        'usuario_creador',
        'usuario_modificador'];
}
