@php
	$rutas = explode("/", $_SERVER['REQUEST_URI']);
	if(isset($rutas[3]))
	{
		$seccion = $rutas[3];
		$subseccion = str_replace('/'.$rutas[0].'/'.$rutas[1].'/'.$rutas[2].'/'.$rutas[3].'/', "", $_SERVER['REQUEST_URI']);
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

		<title>MULTIBOX - Panel de administraci&oacuten - @yield('title')</title>

		<link rel="icon" type="image/png" href="{{ asset('img/logos/'.$favicon->imagen) }}"/>
		
		<link href="{{ asset('css/icon.css') }}" rel="stylesheet">

		<link rel="stylesheet" href="{{ asset('css/materialize.css') }}">
		<link type="text/css" rel="stylesheet" href="{{ asset('css/admin.css') }}"  media="screen,projection"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<script type="text/javascript" src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('js/materialize.min.js') }}"></script>
		<script src="//cdn.ckeditor.com/4.9.2/full/ckeditor.js"></script>
	</head>

	<body>
		<!-- CABECERA -->
		<header>
			<nav class="top-nav">
				<div class="container">
					<div class="nav-wrapper">
						<a class="page-title">@yield('title')</a>
						<a class="right" href="{{ url('adm/logout') }}">Cerrar sesi&oacuten</a>
					</div>
				</div>
			</nav>

		  <!-- MENÚ -->

			<div class="container">
				<a href="#" data-activates="nav-mobile" class="button-collapse top-nav full hide-on-large-only"><i class="material-icons">menu</i></a>
			</div>
			<ul id="nav-mobile" class="side-nav fixed">
				<div class="logo">
					<a id="logo-container" href="{{ url('adm/index') }}" class="brand-logo">
						<img class="responsive-img" src="{{ asset('img/logos/'.$principal->imagen) }}" alt="">
					</a>
				</div>
				<li class="no-padding">

					<ul class="collapsible collapsible-accordion">

						<li class="bold"><a class="collapsible-header waves-effect waves-admin @if($seccion=="home") active @endif"><i class="material-icons">home</i>Home</a>
							<div class="collapsible-body">
								<ul>
									<li class="@if($subseccion=="slider/create") active @endif"><a href="{{ url('adm/home/slider/create') }}">Crear slider</a></li>
									<li class="@if($subseccion=="slider/edit") active @endif"><a href="{{ url('adm/home/slider/edit') }}">Editar slider</a></li>
									<li class="@if($subseccion=="item/edit/1") active @endif"><a href="{{ url('adm/home/item/edit/1') }}">Editar texto</a></li>
								</ul>
							</div>
						</li>

						<li class="bold"><a class="collapsible-header waves-effect waves-admin @if($seccion=="nosotros") active @endif"><i class="material-icons">home</i>Empresa</a>
							<div class="collapsible-body">
								<ul>
									<li class="@if($subseccion=="slider/create") active @endif"><a href="{{ url('adm/nosotros/slider/create') }}">Crear slider</a></li>
									<li class="@if($subseccion=="slider/edit") active @endif"><a href="{{ url('adm/nosotros/slider/edit') }}">Editar slider</a></li>
									<li class="@if($subseccion=="item/edit/2") active @endif"><a href="{{ url('adm/nosotros/item/edit/2') }}">Editar texto</a></li>
								</ul>
							</div>
						</li>

						<li class="bold"><a class="collapsible-header waves-effect waves-admin @if($seccion=="sistemas") active @endif"><i class="material-icons">home</i>Usos</a>
							<div class="collapsible-body">
								<ul>
									<li class="@if($subseccion=="cabecera/edit/5") active @endif"><a href="{{ url('adm/sistemas/cabecera/edit/4') }}">Editar cabecera</a></li>
									<li class="@if($subseccion=="icono/edit") active @endif"><a href="{{ url('adm/sistemas/icono/edit') }}">Editar iconos</a></li>
									<li class="@if($subseccion=="sistema/create") active @endif"><a href="{{ url('adm/sistemas/sistema/create') }}">Crear uso</a></li>
									<li class="@if($subseccion=="sistema/edit") active @endif"><a href="{{ url('adm/sistemas/sistema/edit') }}">Editar usos</a></li>
								</ul>
							</div>
						</li>

						<li class="bold"><a class="collapsible-header waves-effect waves-admin @if($seccion=="solicitud") active @endif"><i class="material-icons">home</i>Solicitud de Presupuesto</a>
							<div class="collapsible-body">
								<ul>
									<li class="@if($subseccion=="cabecera/edit/6") active @endif"><a href="{{ url('adm/solicitud/cabecera/edit/5') }}">Editar cabecera</a></li>
								</ul>
							</div>
						</li>

						<li class="bold"><a class="collapsible-header waves-effect waves-admin @if($seccion=="contactos") active @endif"><i class="material-icons">home</i>Contacto</a>
							<div class="collapsible-body">
								<ul>
									<li class="@if($subseccion=="contacto/edit") active @endif"><a href="{{ url('adm/contactos/contacto/edit') }}">Editar contactos</a></li>
								</ul>
							</div>
						</li>

						<li class="bold"><a class="collapsible-header waves-effect waves-admin @if($seccion=="logos") active @endif"><i class="material-icons">crop_original</i>Logos</a>
							<div class="collapsible-body">
								<ul>
									<li class="@if($subseccion=="logo/edit") active @endif"><a href="{{ url('adm/logos/logo/edit') }}">Editar logos</a></li>
								</ul>
							</div>
						</li>

						<li class="bold"><a class="collapsible-header waves-effect waves-admin @if($seccion=="redes") active @endif"><i class="material-icons">thumb_up</i>Redes sociales</a>
							<div class="collapsible-body">
								<ul>
									<li class="@if($subseccion=="social/create") active @endif"><a href="{{ url('adm/redes/social/create') }}">Crear red social</a></li>
									<li class="@if($subseccion=="social/edit") active @endif"><a href="{{ url('adm/redes/social/edit') }}">Editar red social</a></li>
								</ul>
							</div>
						</li>

						<li class="bold"><a class="collapsible-header waves-effect waves-admin @if($seccion=="metadatos") active @endif"><i class="material-icons">link</i>Metadatos</a>
							<div class="collapsible-body">
								<ul>
									<li class="@if($subseccion=="metadato/edit") active @endif"><a href="{{ url('adm/metadatos/metadato/edit') }}">Editar metadatos</a></li>
								</ul>
							</div>
						</li>
						
						<li class="bold"><a class="collapsible-header waves-effect waves-admin @if($seccion=="usuarios") active @endif"><i class="material-icons">account_box</i>Usuarios</a>
							<div class="collapsible-body">
								<ul>
									<li class="@if($subseccion=="usuario/create") active @endif"><a href="{{ url('adm/usuarios/usuario/create') }}">Crear usuario</a></li>
									<li class="@if($subseccion=="usuario/edit") active @endif"><a href="{{ url('adm/usuarios/usuario/edit') }}">Editar usuarios</a></li>
								</ul>
							</div>
						</li>
					</ul>
				</li>
			</ul>
		</header>

		@yield('main')
		<script>
			$(document).ready(function() {
			  $('select').material_select();
			});
		</script>

	</body>
</html>
