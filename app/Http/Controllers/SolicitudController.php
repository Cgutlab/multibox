<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Icono;

class SolicitudController extends Controller
{
    function front()
    {
        $icono = Icono::find(5);
        return view('solicitud',compact('icono'));
    }

    function editarCabecera($id)
    {
        $icono = Icono::find($id);
        $seccion = 'solicitud';
        return view('adm.solicitud.cabecera.edit', compact('icono', 'seccion'));
    }
}
