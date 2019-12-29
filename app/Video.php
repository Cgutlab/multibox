<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = [
        'sistema_id', 'texto', 'video', 'orden',
    ];

    public function sistema()
    {
        return $this->belongsTo(Sistema::class);
    }
}
