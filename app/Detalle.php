<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detalle extends Model
{
    protected $fillable = [
        'sistema_id', 'imagen', 'orden',
    ];

    public function producto()
    {
        return $this->belongsTo('App\Producto');
    }
}
