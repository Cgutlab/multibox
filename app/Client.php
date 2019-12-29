<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;

class Client extends \Eloquent implements Authenticatable
{
    use AuthenticableTrait;

    protected $fillable = [
        'name', 'mail', 'empresa', 'direccion', 'telefono','cuit', 'email', 'password', 'habilitado',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function descargas()
    {
        return $this->hasMany(Descarga::class);
    }
}
