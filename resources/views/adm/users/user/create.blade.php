@extends('layouts.back')

@section('title','Crear usuario')
 
@section('main')
		<main>
			<div class="container">
				
				@if(count($errors) > 0)
				<div class="col s12 card-panel red lighten-4 red-text text-darken-4">
			  		<ul>
			  			@foreach($errors->all() as $error)
			  				<li>{!!$error!!}</li>
			  			@endforeach
			  		</ul>
			  	</div>
				@endif

				@if(session('success'))
				<div class="col s12 card-panel green lighten-4 green-text text-darken-4">
					{{ session('success') }}
				</div>
				@endif

				<div class="row">
					<div class="col s12">

						{!!Form::open(['route'=>'user.store', 'method'=>'POST'])!!}
							<div class="row">
								<div class="input-field col s6">
									{!!Form::label('Nombre')!!}
									{!!Form::text('name',null,['class'=>'validate', 'required'])!!}
								</div>
								<div class="input-field col s6">
									{!!Form::label('Apellido')!!}
									{!!Form::text('lastname',null,['class'=>'validate', 'required'])!!}
								</div>
							</div>
							<div class="row">
								<div class="input-field col s6">
									{!!Form::label('Usuario')!!}
									{!!Form::text('email',null,['class'=>'validate', 'required'])!!}
								</div>
								<div class="input-field col s6">
									{!!Form::label('Contraseña')!!}
									{!!Form::text('password',null,['class'=>'validate', 'required'])!!}
								</div>
							</div>
							<div class="row">
								<div class="input-field col s6">
									{!!Form::select('type',
									[
									    '0' => 'Regular',
									    '1' => 'Administrador',
									]);!!}

								</div>
							</div>
							<div class="col s12 no-padding">
								{!!Form::submit('Crear', ['class'=>'waves-effect waves-light btn right'])!!}
							</div>
						{!!Form::close()!!}           
					</div>
				</div>
			</div>
		</main>
@endsection