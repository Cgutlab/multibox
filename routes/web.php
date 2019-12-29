<?php

Route::get('/', 'HomeController@front');
Route::get('empresa', 'NosotrosController@front');
Route::get('usos', 'SistemaController@front');
Route::get('usos/{id}', 'SistemaController@detalle');
Route::get('busqueda', 'SistemaController@busqueda');
Route::post('buscar', 'SistemaController@buscar')->name('search');
Route::get('solicitud', 'SolicitudController@front');
Route::get('contacto', 'ContactoController@front');
Route::post('login', ['uses'=>'UserController@ingresar','as'=>'usuarios.ingresar']);

Route::group(['prefix' => 'adm'], function() {
    Route::resource('user', 'UserController');
    Route::resource('logo', 'LogoController');
    Route::resource('contacto', 'ContactoController');
    Route::resource('social', 'SocialController');
    Route::resource('metadato', 'MetadatoController');
    Route::resource('slider', 'SliderController');
    Route::resource('item', 'ItemController');
    Route::resource('icono', 'IconoController');
    Route::resource('sistema', 'SistemaController');
    Route::resource('imagen', 'ImagenController');
    Route::resource('detalle', 'DetalleController');

    Route::get('/', function (){ return view('adm.login'); });
    Route::get('panel', 'UserController@index');
    Route::get('logout', 'UserController@logout');
	
    //Index
	Route::group(['prefix' => 'home'], function() {
		Route::group(['prefix' => 'slider'], function() {
			Route::get('create', 'HomeController@crearSlider');
			Route::get('edit', 'HomeController@listarSliders');
			Route::get('edit/{id}', 'HomeController@editarSlider');
		});

		Route::group(['prefix' => 'item'], function() {
			Route::get('edit/{id}', 'HomeController@editarItem');
		});
	});

	//Nosotros
	Route::group(['prefix' => 'nosotros'], function() {
		Route::group(['prefix' => 'slider'], function() {
			Route::get('create', 'NosotrosController@crearSlider');
			Route::get('edit', 'NosotrosController@listarSliders');
			Route::get('edit/{id}', 'NosotrosController@editarSlider');
		});
		Route::group(['prefix' => 'item'], function() {
			Route::get('edit/{id}', 'NosotrosController@editarItem');
		});
	});

	//Sistemas
	Route::group(['prefix' => 'sistemas'], function() {
		Route::group(['prefix' => 'cabecera'], function() {
			Route::get('edit/{id}', 'SistemaController@editarCabecera');
		});

		Route::group(['prefix' => 'icono'], function() {
			Route::get('edit', 'SistemaController@listarIconos');
			Route::get('edit/{id}', 'SistemaController@editarIcono');
		});

		Route::group(['prefix' => 'sistema'], function() {
			Route::get('create', 'SistemaController@crearSistema');
			Route::get('edit', 'SistemaController@listarSistemas');
			Route::get('edit/{id}', 'SistemaController@editarSistema');
		});
		Route::group(['prefix' => 'imagen'], function() {
			Route::get('create/{sistema}', 'ImagenController@crearImagen');
			Route::get('edit/{sistema}', 'ImagenController@listarImagenes');
			Route::get('edit/{sistema}/{id}', 'ImagenController@editarImagen');
		});
		Route::group(['prefix' => 'detalle'], function() {
			Route::get('create/{sistema}', 'DetalleController@crearDetalle');
			Route::get('edit/{sistema}', 'DetalleController@listarDetalles');
			Route::get('edit/{sistema}/{id}', 'DetalleController@editarDetalle');
		});
	});

	//solicitud de presupesto
	Route::group(['prefix' => 'solicitud'], function() {
		Route::group(['prefix' => 'cabecera'], function() {
			Route::get('edit/{id}', 'SolicitudController@editarCabecera');
		});
	});
	//Contacto
	Route::group(['prefix' => 'contactos'], function() {
		Route::group(['prefix' => 'contacto'], function() {
			Route::get('edit', 'ContactoController@listarContactos');
			Route::get('edit/{id}', 'ContactoController@editarContacto');
		});
	});

	Route::group(['prefix' => 'logos'], function() {
		Route::group(['prefix' => 'logo'], function() {
			Route::get('edit', 'LogoController@listarLogos');
			Route::get('edit/{id}', 'LogoController@editarLogo');
		});
	});

	Route::group(['prefix' => 'redes'], function() {
		Route::group(['prefix' => 'social'], function() {
			Route::get('create', 'SocialController@crearSocial');
			Route::get('edit', 'SocialController@listarSocials');
			Route::get('edit/{id}', 'SocialController@editarSocial');
		});
	});

	Route::group(['prefix' => 'metadatos'], function() {
		Route::group(['prefix' => 'metadato'], function() {
			Route::get('edit', 'MetadatoController@listarMetadatos');
			Route::get('edit/{id}', 'MetadatoController@editarMetadato');
		});
	});

	Route::group(['prefix' => 'usuarios'], function() {
		Route::group(['prefix' => 'usuario'], function() {
			Route::get('create', 'UserController@crearUser');
			Route::get('edit', 'UserController@listarUsers');
			Route::get('edit/{id}', 'UserController@editarUser');
		});
	});

	//Clientes
	Route::group(['prefix' => 'clientes'], function() {
		Route::group(['prefix' => 'icono'], function() {
			Route::get('edit/{id}', 'VideoController@editarIcono');
		});
		Route::group(['prefix' => 'cliente'], function() {
			Route::get('create', 'ClientController@crearClient');
			Route::get('edit', 'ClientController@listarClients');
			Route::get('edit/{id}', 'ClientController@editarClient');
		});
		Route::group(['prefix' => 'descarga'], function() {
			Route::get('create/{client}', 'DescargaController@crearDescarga');
			Route::get('edit/{client}', 'DescargaController@listarDescargas');
			Route::get('edit/{client}/{id}', 'DescargaController@editarDescarga');
		});
	});
});

Route::get('/home', 'HomeController@index')->name('home');
