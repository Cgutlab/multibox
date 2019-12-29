<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Icono;
use App\Item;
use App\Slider;

class NosotrosController extends Controller
{
    function front()
    {
        $item = Item::find(2);
        $sliders = Slider::where('seccion','empresa')->get();
        return view('nosotros',compact('item', 'sliders'));
    }

    function crearSlider()
    {
        $seccion = 'empresa';
        return view('adm.nosotros.slider.create',compact('seccion'));
    }

    function listarSliders()
    {
        $sliders = Slider::where('seccion','empresa')->get();
        return view('adm.nosotros.slider.list',  compact('sliders'));
    }

    function editarSlider($id)
    {
        $slider = Slider::find($id);
        $seccion = 'empresa';
        return view('adm.nosotros.slider.edit', compact('slider', 'seccion'));
    }

    function editarIcono($id)
    {
        $icono = Icono::find($id);
        return view('adm.nosotros.icono.edit', compact('icono'));
    }

    function editarItem($id)
    {
        $item = Item::find($id);
        return view('adm.nosotros.item.edit', compact('item'));
    }
}
