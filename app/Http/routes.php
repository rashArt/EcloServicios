<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/registro',
    [
        'uses' => 'FrontendController@getRegistro',
        'as' => 'registro'
    ]
);

Route::post('/registro',
    [
        'uses' => 'FrontendController@postRegistro',
        'as' => 'registro'
    ]
);

Route::get('/login',
    [
        'uses' => 'Auth\AuthController@getLogin',
        'as' => 'login'
    ]
);

Route::post('/login',
    [
        'uses' => 'Auth\AuthController@postLogin',
        'as' => 'login'
    ]
);

Route::get('/logout',
    [
        'uses' => 'Auth\AuthController@getLogout',
        'as' => 'logout'
    ]
);

Route::group(['middleware' => 'auth'], function () {

    Route::get('/',
        [
            'uses' => 'FrontendController@inicio',
            'as' => 'inicio'
        ]
    );

    Route::get('/inicio',
        [
            'uses' => 'FrontendController@inicio',
            'as' => 'inicio'
        ]
    );

    Route::get('/perfil',
        [
            'uses' => 'UsersController@perfil',
            'as' => 'users.perfil'
        ]
    );

    Route::put('users/{id}',
        [
        'uses' => 'UsersController@update',
        'as' => 'users.update'
        ]
    );

    Route::get('users/{id}',
        [
        'uses' => 'UsersController@show',
        'as' => 'users.show'
        ]
    );

    // Rutas para el usuario administrador
    Route::group(['middleware' => 'admin'], function () {

        // modulo de usuarios
        Route::get('users/{id}/destroy',
            [
            'uses' => 'UsersController@destroy',
            'as' => 'users.destroy'
            ]
        );
        Route::resource('users', 'UsersController');
        // nueva ruta funcion borrar del modulo users
        Route::get('users/{id}/destroy',
            [
            'uses' => 'UsersController@destroy',
            'as' => 'users.destroy'
            ]
        );

        // modulo de tipo de servicios
        Route::resource('servicios/tipos', 'TipoServiciosController');
        // nueva ruta funcion borrar del modulo tipos
        Route::get('servicios/tipos/{id}/destroy',
            [
            'uses' => 'TipoServiciosController@destroy',
            'as' => 'servicios/tipos.destroy'
            ]
        );
        Route::get('descargas',
            [
            'uses' => 'DescargasController@index',
            'as' => 'descargas.index'
            ]
        );
        Route::get('descargas/clientes',
            [
            'uses' => 'DescargasController@clientes',
            'as' => 'descargas.clientes'
            ]
        );
        Route::get('descargas/tecnicos',
            [
            'uses' => 'DescargasController@tecnicos',
            'as' => 'descargas.tecnicos'
            ]
        );
        Route::get('descargas/administradores',
            [
            'uses' => 'DescargasController@administradores',
            'as' => 'descargas.administradores'
            ]
        );
        Route::get('descargas/servicios',
            [
            'uses' => 'DescargasController@serviciosTipo',
            'as' => 'descargas.serviciosTipo'
            ]
        );

    });

    Route::get('descargas/servicio/{id}',
        [
        'uses' => 'DescargasController@servicio',
        'as' => 'descargas.servicio'
        ]
    );


    // modulo de servicios, middleware agregado en el controller
    Route::resource('servicios', 'ServiciosController');
    // nueva ruta funcion borrar del modulo tipos
    Route::get('servicios/{id}/destroy',
        [
        'uses' => 'ServiciosController@destroy',
        'as' => 'servicios.destroy'
        ]
    );

    // modulo de tipo de servicios
    Route::resource('servicio/componentes', 'ComponenteController');


    Route::group(['middleware' => 'cliente:cliente'], function ()
    {
        // rutas para el cliente solamente
        Route::get('servicio/nuevo',
            [
            'uses' => 'FrontendController@crearServicio',
            'as' => 'cliente.crear_servicio'
            ]
        );

        Route::post('servicio/guardar',
            [
            'uses' => 'FrontendController@guardarServicio',
            'as' => 'servicio.guardar'
            ]
        );
    });


});