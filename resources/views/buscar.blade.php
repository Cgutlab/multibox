@extends('layouts.front')

@section('title','Buscar sistemas')

@section('main')
		<section class="portada" style="background-image: url('{{ asset('img/iconos/'.$icono->imagen) }}');">
			<div class="capa"></div>
			<div class="container">
				<h4>{{$icono->texto}}</h4>
			</div>
		</section>
		<main class="pt50">
			<div class="container buscar">
				<div class="row">
					<div class="col s6 input-field offset-s3 center-align">
						{!!Form::open(['route'=>'search', 'method'=>'POST', 'files' => true])!!}
							{!!Form::label('Buscar')!!}
							{!!Form::text('buscar',null,['class'=>'validate', 'required'])!!}
							{!!Form::submit('BUSCAR', ['class'=>'btn'])!!}
						{!!Form::close()!!}
					</div>
				</div>
			</div>
			@if(isset($sistemas))
			<div class="container sistemas">
				<div class="row">
					<div class="col s12 titulo">
						<h5 class="color">Resultados</h5>
					</div>
				</div>
				<div class="row">
				@foreach($sistemas as $sistema)
				<a href="{{ url('usos/'.$sistema->id) }}">
					<div class="row sistema mb50">
						<div class="col m6 imagen">
							<img src="{{ asset('img/imagenes/'.$sistema->imagenes->first()->imagen) }}" class="responsive-img">
							<div class="capa">
								<label>+</label>
							</div>
						</div>
						<div class="col m6 pt30">
							<h4 class="color italic nomargin">{{$sistema->nombre}}</h4>
							<label>&rarr; VER MÁS</label>
						</div>
					</div>
				</a>
				@endforeach
				</div>
			</div>
			@endif
		</main>
@endsection