@extends('layouts.front')

@section('title',$sistema->nombre)
 
@section('main')
		<section class="portada" style="background-image: url('{{ asset('img/iconos/'.$icono->imagen) }}');">
			<div class="capa"></div>
			<div class="container">
				<h4>{{$icono->texto}}</h4>
			</div>
		</section>
		<main class="pt70 pb30 sistemas">
			<div class="container">
				<div class="row">
					<div class="col l10 offset-l1">
						<div class="row">
							<div class="col s12 miga">
								<p><a href="{{ url('usos') }}">&larr; Volver</a></p>
							</div>
							<div class="col s12">
								<div class="carousel carousel-slider mb30">
									@foreach($sistema->imagenes as $imagen)
									<div class="carousel-item" style="background-image :url('');">
										<img class="responsive-img" src="{{ asset('img/imagenes/'.$imagen->imagen) }}">
									</div>
									@endforeach
								</div>
							</div>
							<div class="col s12">
								<h4 class="color p15">{{$sistema->nombre}}</h4>
								<div class="subrayado mb30"></div>
								<div class="p15">{!!$sistema->detalles !!}</div>
							</div>
						</div>
						<div class="row pt30">
							@foreach($iconos as $icono)
							<div class="col s12 m4 mb30">
								<div class="icono center-align">
									<img src="{{ asset('img/iconos/'.$icono->imagen) }}" class="responsive-img">
									<div class="texto">
										{!! $icono->texto !!}
									</div>
								</div>
							</div>
							@endforeach
						</div>
						@if($sistema->detalles()->count()!=0)
						<div class="row">
							<div class="col s12">
								<h4 class="color color">Detalles</h4>
							</div>
							@foreach($sistema->detalles()->get() as $detalle)
							<div class="col s12 m6">
								<img src="{{ asset('img/detalles/'.$detalle->imagen) }}" class="responsive-img">
							</div>
							@endforeach
						</div>
						@endif
					</div>
				</div>
			</div>
		</main>
@endsection