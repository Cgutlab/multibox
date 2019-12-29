<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sistema extends Model
{
    protected $fillable = [
        'nombre', 'detalles', 'larga', 'orden', 'keyword',
    ];

    public function imagenes()
    {
        return $this->hasMany(Imagen::class);
    }

    public function detalles()
    {
        return $this->hasMany(Detalle::class);
    }
}
