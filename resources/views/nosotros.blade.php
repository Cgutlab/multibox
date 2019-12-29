@extends('layouts.front')

@section('title','Empresa')
 
@section('main')
		<div class="carousel carousel-slider">
			@foreach($sliders as $slider)
			<div class="carousel-item" style="background-image :url('{{'img/sliders/'.$slider->imagen}}');">
				@if($slider->texto!='')
				<div class="capa"></div>
				<div class="caption hide-on-small-only">
					{!!$slider->texto!!}
				</div>
				@endif
			</div>
			@endforeach
		</div>
		<main class="pt70 pb30">
			<div class="container">
				<div class="row nomargin">
					<div class="col m8 offset-m2 center-align pb50">
						<label>MULITBOX</label>
						<h4 class="color">Diseño y pasión por los detalles</h4>
						<p style="font-size: 18px;">Somos Multibox Módulos, una empresa dedicada a la fabricación y venta de contenedores habitacionales, módulos comerciales para exposiciones, baños móviles, módulos para oficina, etc.<br>Trabajamos día a día para ofrecer soluciones innovadoras a los clientes, de acuerdo con el rubro que manejamos. Visítenos, estamos ubicados en la localidad de Avellaneda.</p>
					</div>
				</div>
				<div class="row nomargin bordertop pt50">
					<div class="col m6">
						<div class="texto pt30">
							<h4 class="color italic">{!! $item->titulo !!}</h4>
							{!! $item->texto !!}
						</div>
					</div>
					<div class="col m6">
						<img src="{{ asset('img/items/'.$item->imagen) }}" class="responsive-img">
					</div>
				</div>
			</div>
		</main>
@endsection