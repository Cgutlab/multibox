<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{
    protected $fillable = [
        'sistema_id', 'imagen', 'orden',
    ];

    public function sistema()
    {
        return $this->belongsTo(Sistema::class);
    }
}
