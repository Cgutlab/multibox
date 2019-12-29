<?php

namespace App\Http\Controllers;

use App\Imagen;
use Illuminate\Http\Request;
use App\Extensions\Helpers;
use Redirect;

class ImagenController extends Controller
{
    function crearImagen($sistema)
    {
        return view('adm.sistemas.imagen.create', compact('sistema'));
    }

    function listarImagenes($sistema)
    {
        $imagenes = Imagen::where('sistema_id', $sistema)->get();

        return view('adm.sistemas.imagen.list',  compact('imagenes', 'sistema'));
    }

    function editarImagen($sistema, $id)
    {
        $imagen = Imagen::find($id);
        
        return view('adm.sistemas.imagen.edit', compact('imagen', 'sistema'));
    }

    public function store(Request $request)
    {
        $datos = $request->all();

        $file_save = Helpers::saveImage($request->file('imagen'), 'imagenes');
        $file_save ? $datos['imagen'] = $file_save : false;

        Imagen::create($datos);
        $success = 'Imagen creada correctamente';
        return back()->with('success', $success);
    }

    public function update(Request $request, $id)
    {
        $datos = $request->all();
        $imagen = Imagen::find($id);
        
        $file_save = Helpers::saveImage($request->file('imagen'), 'imagenes');
        $file_save ? $datos['imagen'] = $file_save : false;

        $imagen->fill($datos);
        $imagen->save();
        $success = 'Imagen editada correctamente';
        return back()->with('success', $success);
    }

    public function destroy($id)
    {
        $imagen = Imagen::find($id);
        $imagen->delete();
        $success = 'Imagen eliminada correctamente';
        return back()->with('success', $success);
    }
}
