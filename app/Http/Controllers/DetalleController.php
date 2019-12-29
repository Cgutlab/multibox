<?php

namespace App\Http\Controllers;

use App\Detalle;
use Illuminate\Http\Request;
use App\Extensions\Helpers;
use Redirect;

class DetalleController extends Controller
{
    function crearImagen($producto)
    {
        return view('adm.productos.detalle.create', compact('producto'));
    }

    function listarImagenes($producto)
    {
        $imagenes = Detalle::where('sistema_id', $producto)->get();

        return view('adm.productos.detalle.list',  compact('imagenes', 'producto'));
    }

    function editarImagen($id, $producto)
    {
        $imagen = Detalle::find($id);

        return view('adm.productos.detalle.edit', compact('imagen', 'producto'));
    }

    public function store(Request $request)
    {
        $datos = $request->all();

        $file_save = Helpers::saveImage($request->file('imagen'), 'detalles');
        $file_save ? $datos['imagen'] = $file_save : false;

        Detalle::create($datos);
        $success = 'Imagen creada correctamente';
        return back()->with('success', $success);
    }

    public function update(Request $request, $id)
    {
        $datos = $request->all();
        $imagen = Detalle::find($id);
        
        $file_save = Helpers::saveImage($request->file('imagen'), 'detalles');
        $file_save ? $datos['imagen'] = $file_save : false;

        $imagen->fill($datos);
        $imagen->save();
        $success = 'Imagen editada correctamente';
        return back()->with('success', $success);
    }

    public function destroy($id)
    {
        $imagen = Detalle::find($id);
        $imagen->delete();
        $success = 'Imagen eliminada correctamente';
        return back()->with('success', $success);
    }
}
