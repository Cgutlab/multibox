<?php

namespace App\Http\Controllers;

use App\Sistema;
use App\Icono;
use App\Imagen;
use App\Video;
use Illuminate\Http\Request;
use App\Extensions\Helpers;

class SistemaController extends Controller
{
    function busqueda()
    {
        $icono = Icono::find(4);
        
        return view('buscar',compact('icono'));
    }

    function buscar(Request $request)
    {
        $busqueda = "%".$request->input('buscar')."%";
        $sistemas = Sistema::orWhere('nombre', 'like' , $busqueda)
                            ->orWhere('detalles', 'like' , $busqueda)
                            ->orWhere('keyword', 'like' , $busqueda)->get();
        $icono = Icono::find(4);
        
        return view('buscar',compact('sistemas', 'icono'));
    }

    function detalle($id)
    {
        $sistema = Sistema::find($id);
        $icono = Icono::find(4);
        $iconos = Icono::where('seccion','sistemas')->get();
        
        return view('detalle',compact('sistema', 'icono', 'iconos'));
    }

    function front()
    {
        $sistemas = Sistema::all();
        $icono = Icono::find(4);
        
        return view('sistemas',compact('sistemas', 'icono'));
    }

    function crearSistema()
    {
        return view('adm.sistemas.sistema.create');
    }

    function listarSistemas()
    {
        $sistemas = Sistema::all();

        return view('adm.sistemas.sistema.list',  compact('sistemas'));
    }

    function editarSistema($id)
    {
        $sistema = Sistema::find($id);
        return view('adm.sistemas.sistema.edit', compact('sistema'));
    }

    function listarIconos()
    {
        $iconos = Icono::where('seccion','sistemas')->get();
        return view('adm.sistemas.icono.list',  compact('iconos'));
    }

    function editarIcono($id)
    {
        $icono = Icono::find($id);
        $seccion = 'sistemas';
        return view('adm.sistemas.icono.edit', compact('icono', 'seccion'));
    }

    function editarCabecera($id)
    {
        $icono = Icono::find($id);
        $seccion = 'usos';
        return view('adm.sistemas.cabecera.edit', compact('icono', 'seccion'));
    }

    public function store(Request $request)
    {
        $datos = $request->all();
        $sistema = Sistema::create($datos);
        $file_save = Helpers::saveImage($request->file('ficha'), 'sistemas', $sistema->id);
        $file_save ? $sistema->ficha = $file_save : false;
        $sistema->save();

        $imagen = new Imagen();
        $file_save = Helpers::saveImage($request->file('imagen'), 'imagenes', $imagen->id);
        $file_save ? $imagen->imagen = $file_save : false;
        $imagen->orden = 'aa';
        $imagen->sistema_id = $sistema->id;
        $imagen->save();
        
        $success = 'Sistema creado correctamente';

        return back()->with('success', $success);
    }

    public function update(Request $request, Sistema $sistema)
    {
        $datos = $request->all();

        $file_save = Helpers::saveImage($request->file('ficha'), 'sistemas', $sistema->id);
        $file_save ? $datos['ficha'] = $file_save : false;

        $sistema->fill($datos);
        $sistema->save();
        $success = 'Sistema editado correctamente';
        return back()->with('success', $success);
    }

    public function destroy(Sistema $sistema)
    {
        $sistema->delete();
        $success = 'Sistema eliminado correctamente';
        return back()->with('success', $success);
    }
}
