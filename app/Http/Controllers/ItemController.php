<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;
use App\Extensions\Helpers;

class ItemController extends Controller
{
    public function store(Request $request)
    {
        $datos = $request->all();
        $item = Item::create($datos);
        $file_save = Helpers::saveImage($request->file('imagen'), 'items', $item->id);
        $file_save ? $item->imagen = $file_save : false;
        $item->save();
        
        $success = 'Item creado correctamente';

        return back()->with('success', $success);
    }

    public function update(Request $request, Item $item)
    {
        $datos = $request->all();

        $file_save = Helpers::saveImage($request->file('imagen'), 'items', $item->id);
        $file_save ? $datos['imagen'] = $file_save : false;

        $item->fill($datos);
        $item->save();
        $success = 'Item editado correctamente';
        return back()->with('success', $success);
    }

    public function destroy(Item $item)
    {
        $item->delete();
        $success = 'Item eliminado correctamente';
        return back()->with('success', $success);
    }
}
