@php
	$rutas = explode("/", $_SERVER['REQUEST_URI']);
	if(isset($rutas[2]))
	{
		$seccion = $rutas[2];
		$subseccion = str_replace('/'.$rutas[0].'/'.$rutas[1].'/'.$rutas[2].'/', "", $_SERVER['REQUEST_URI']);
	}
	else
	{
		$seccion="";
		$subseccion="";
	}
@endphp
<!DOCTYPE html>
<html lang="es">

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">

		<title>MULTIBOX - @yield('title')</title>

		<link rel="icon" type="image/png" href="{{ asset('img/logos/'.$favicon->imagen) }}"/>
		
		<link href="{{ asset('css/icon.css') }}" rel="stylesheet">

		<script type="text/javascript" src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('js/materialize.min.js') }}"></script>
		<script src="https://use.fontawesome.com/c3d13979f5.js"></script>
		<script src='https://www.google.com/recaptcha/api.js'></script>

		<link rel="stylesheet" href="{{ asset('css/materialize.css') }}">
		<link type="text/css" rel="stylesheet" href="{{ asset('css/estilo.css') }}"  media="screen,projection"/>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
		<link href="https://fonts.googleapis.com/css?family=Fira+Sans:300,400,500,600,700" rel="stylesheet"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	</head>

	<body>
		<header>
			<div id="cabecera" class="hide-on-small-only">
				<div class="container">
					<div class="row nomargin">
						<div class="col s12">
							<ul class="left">
								@foreach($redes as $red)
								<li><a href="{{ $red->vinculo }}"><img src="{{ asset('img/redes/'.$red->imagen) }}"></a></li>
								@endforeach
							</ul>
							<div class="right">
								<form method="POST" action="{{ url('buscar') }}">
									<input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
									<input class="right" type="text" name="busqueda" placeholder="Estoy buscando...">
									<button class="right"><i class="material-icons color">search</i></button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="container">
				<div class="row nomargin">
					<div class="col s12">
						<nav id="navegador">
							<div class="nav-wrapper">
								<a href="{{ url('/') }}" class="brand-logo center">
									<img  src="{{ asset('img/logos/'.$principal->imagen) }}" class="responsive-img left">
								</a>
								<a href="#" data-activates="mobile-demo" class="button-collapse right"><i class="material-icons">menu</i></a>
								<ul id="nav-mobile" class="left hide-on-med-and-down">
									<li @if($seccion=='empresa')class="activo"@endif><a href="{{ url('empresa') }}"><div></div>Empresa</a></li>
									<li @if($seccion=='usos')class="activo"@endif><a href="{{ url('usos') }}"><div></div>Usos</a></li>
								</ul>
								<ul id="nav-mobile" class="right hide-on-med-and-down">
									<li @if($seccion=='solicitud')class="activo"@endif><a href="{{ url('solicitud') }}"><div></div>Solicitar Presupuesto</a></li>
									<li @if($seccion=='contacto')class="activo"@endif><a href="{{ url('contacto') }}"><div></div>Contacto</a></li>
								</ul>
								<ul class="side-nav" id="mobile-demo">
									<li @if($seccion=='/')class="activo"@endif><a href="{{ url('/') }}">Inicio</a></li>
									<li @if($seccion=='empresa')class="activo"@endif><a href="{{ url('empresa') }}">Empresa</a></li>
									<li @if($seccion=='usos')class="activo"@endif><a href="{{ url('usos') }}">Usos</a></li>
									<li @if($seccion=='solicitud')class="activo"@endif><a href="{{ url('solicitud') }}">Solicitar Presupuesto</a></li>
									<li @if($seccion=='contacto')class="activo"@endif><a href="{{ url('contacto') }}">Contacto</a></li>
								</ul>
							</div>
						</nav>
					</div>
				</div>
			</div>		
		</header>

		@yield('main')

		<footer class="page-footer" style="background-image: url('{{ asset('img/logos/fondo.png') }}');">
			<div class="container">
				<div class="row">
					<div class="col s12 m2 logo-footer">
						<img src="{{ asset('img/logos/'.$principal->imagen) }}" class="responsive-img">
					</div>
					<div class="col m7 s12">
						<ul class="sitemap">
							<li class="center-align"><a href="{{ url('/') }}">INICIO</a></li>
							<li class="center-align"><a href="{{ url('empresa') }}">EMPRESA</a></li>
							<li class="center-align"><a href="{{ url('usos') }}">USOS</a></li>
							<li class="center-align"><a href="{{ url('solicitud') }}">SOLICITAR PRESUPUESTO</a></li>
							<li class="center-align"><a href="{{ url('contacto') }}">CONTACTO</a></li>
						</ul>
					</div>
					<div class="col m3 s12">
						<table>
							<tbody>
								<tr>
									<td ><i class="material-icons">location_on</i></td>
									<td>{{ $direccion->dato }}</td>
								</tr>
								<tr>
									<td><i class="material-icons">phone</i></td>
									<td>{{ $telefono->dato }}</td>
								</tr>
								<tr>
									<td><i class="material-icons">mail</i></td>
									<td><a href="{{ 'mailto:'.$email->dato }}">{{ $email->dato }}</a></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="footer-copyright">
				<div class="container">
					<div class="row">
						<div class="col s12 m2">
							Perteneciente a 
						</div>
						<div class="col s12 m3">
							<img src="{{ asset('img/logos/'.$korban->imagen) }}" class="responsive-img">
						</div>
						<div class="col s6 m1">
							<img src="{{ asset('img/logos/'.$korban1->imagen) }}" class="responsive-img">
						</div>
						<div class="col s6 m1">
							<img src="{{ asset('img/logos/'.$korban2->imagen) }}" class="responsive-img">
						</div>
						<div class="col s12 m5">
							<a class="grey-text text-lighten-4 right" href="http://osole.es">by Osole</a>
						</div>
					</div>
				</div>
			</div>
        </footer>
        <script type="text/javascript">
			$('.carousel.carousel-slider').carousel({fullWidth: true});
			$('.chica').click(function(event){
				var fuente = $(this).attr('src');
				$('#grande').attr('src', fuente);
			});
			$(".button-collapse").sideNav();
		</script>
	</body>
</html>
