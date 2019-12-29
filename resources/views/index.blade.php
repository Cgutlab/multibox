@extends('layouts.front')

@section('title','Inicio')
 
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
		<div class="pt30 pb30">
			<div class="container">
				<div class="row nomargin">
					<div class="col m6">
						<img src="{{ asset('img/items/'.$item->imagen) }}" class="responsive-img">
					</div>
					<div class="col m6">
						<div class="texto">
							<h4 class="color color">{!! $item->titulo !!}</h4>
							{!! $item->texto !!}
							<a href="{{ url('usos') }}">
								<button class="btn">CONOCÉ MÁS</button>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<main class="index">
			<div class="container">
				<div class="row center-align">
					<div class="col s12">
						<h4 class="color italic">Construcción Sustentable</h4>
					</div>
				</div>
				<div class="row pt30">
					@foreach($sistemas as $sistema)
					<div class="col m4 s12 mb30">
						<a href="{{ url('usos/'.$sistema->id) }}">
							<div class="sistema">
								<div class="imagen">
									<img src="{{ asset('img/imagenes/'.$sistema->imagenes->first()->imagen) }}" class="responsive-img">
									<div class="capa">
										<label>+</label>
									</div>
								</div>
								<div class="texto p15">
									<h4 class="italic color">{!! $sistema->nombre !!}</h4>
									<label><label>&rarr; VER MÁS</label></label>
								</div>
							</div>
						</a>
					</div>
					@endforeach
				</div>
			</div>
		</main>
@endsection