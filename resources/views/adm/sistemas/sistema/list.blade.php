@extends('layouts.back')

@section('title','Editar usos')
 
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
						<table class="highlight bordered">
							<thead>
								<td>Nombre</td>
								<td class="text-right">Acciones</td>
							</thead>
							<tbody>
								@foreach($sistemas as $sistema)
								<tr>
									<td>{{ $sistema->nombre }}</td>
									<td class="text-right">
										<a href="{{ url('adm/sistemas/sistema/edit/'.$sistema->id) }}"><i class="material-icons">create</i></a>
										<a href="{{ url('adm/sistemas/detalle/edit/'.$sistema->id) }}"><i class="material-icons">content_paste</i></a>
										<a href="{{ url('adm/sistemas/imagen/edit/'.$sistema->id) }}"><i class="material-icons">photo</i></a>
										{!!Form::open(['class'=>'en-linea', 'route'=>['sistema.destroy', $sistema->id], 'method' => 'DELETE'])!!}
											<button type="submit" class="submit-button">
												<i class="material-icons red-text">cancel</i>
											</button>
										{!!Form::close()!!}
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>            
					</div>
				</div>
			</div>
		</main>
@endsection