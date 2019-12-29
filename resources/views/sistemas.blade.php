@extends('layouts.front')

@section('title','Sistemas de Etiquetado')
 
@section('main')
		<section class="portada" style="background-image: url('{{ asset('img/iconos/'.$icono->imagen) }}');">
			<div class="capa"></div>
			<div class="container">
				<h4>{{$icono->texto}}</h4>
			</div>
		</section>
		<main class="pt70 pb30 sistemas">
			<div class="container">
				@foreach($sistemas as $sistema)
				<a href="{{ url('usos/'.$sistema->id) }}">
					<div class="row sistema mb50">
						<div class="col m6 s12 imagen">
							<img src="{{ asset('img/imagenes/'.$sistema->imagenes->first()->imagen) }}">
							<div class="capa">
								<label>+</label>
							</div>
						</div>
						<div class="col m6 s12 pt30">
							<h4 class="color italic nomargin">{{$sistema->nombre}}</h4>
							<label>&rarr; VER MÁS</label>
						</div>
					</div>
				</a>
				@endforeach
			</div>
		</main>
@endsection