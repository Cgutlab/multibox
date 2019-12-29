<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;
use App\Icono;
use App\Item;
use App\Sistema;

class HomeController extends Controller
{

    function front()
    {
        $sliders = Slider::where('seccion','index')->orderBy('orden', 'desc')->get();
        $item = Item::find(1);
        $sistemas = Sistema::where('destacado', '1')->get();
        
        return view('index',compact('item','sliders', 'sistemas'));
    }

    function crearSlider()
    {
        $seccion = 'index';
        return view('adm.home.slider.create',compact('seccion'));
    }

    function listarSliders()
    {
        $sliders = Slider::where('seccion','index')->get();
        return view('adm.home.slider.list',  compact('sliders'));
    }

    function editarSlider($id)
    {
        $slider = Slider::find($id);
        $seccion = 'index';
        return view('adm.home.slider.edit', compact('slider', 'seccion'));
    }

    function listarIconos()
    {
        $iconos = Icono::where('seccion', 'index')->get();
        return view('adm.home.icono.list',  compact('iconos'));
    }

    function editarIcono($id)
    {
        $icono = Icono::find($id);
        return view('adm.home.icono.edit', compact('icono'));
    }

    function editarItem($id)
    {
        $item = Item::find($id);
        return view('adm.home.item.edit', compact('item'));
    }
}
