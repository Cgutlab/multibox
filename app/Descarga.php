<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Descarga extends Model
{
    protected $fillable = [
        'client_id', 'titulo', 'archivo', 'orden',
    ];

    public function cliente()
    {
        return $this->belongsTo(Client::class);
    }
}
