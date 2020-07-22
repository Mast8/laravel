<?php
//header('Access-Control-Allow-Origin:  *');
//Route::get('/', 'TestimonialsController@home')->name('landing-page');
Route::get('/', function () {
    return view('/auth/login');
});


Route::get('/usuarios/activacion/{token}', 'Auth\RegisterController@activar');
//Route::get('/', 'loginController@index')->name('home');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



Route::middleware(['auth'])->group(function () {

    Route::get('/pbi', 'PbisController@show')->name('pbi.show');
    Route::patch('/pbiEstado/{tarea}', 'PbisController@cambiarEst');
    Route::delete('/tarea/{tarea}', 'PbisController@destroyT');
    //Route::post('/tareas/create', 'TareasControlador@create')->name('tareas.create');
    Route::get('pbis/{pbi}/tareas/create', 'TareasControlador@create')->name('tareas.create');
    Route::post('/tareas/store', 'TareasControlador@store')->name('tareas.store');
    Route::get('/tareas/edit/{tarea}', 'TareasControlador@edit')->name('tareas.edit');
    Route::post('/tareas/update', 'TareasControlador@update')->name('tareas.update');

    Route::post('/tareas/subir', 'TareasControlador@subir')->name('tareas.subir');
    Route::get('/tareas/{tarea}/eliminar', 'TareasControlador@eliminar')->name('tarea.eliminar') ;
    Route::post('/tareas/delete', 'TareasControlador@borrar')->name('tarea.borrar');
    Route::get('/tareas/recuperar/{id}', 'TareasControlador@recuperar')->name('tarea.recuperar');
    Route::get('/tareas/{id}/historial', 'TareasControlador@historial')->name('tarea.historial');
    //Route::post('/tareas/delete/{id}', 'TareasControlador@borrar')->name('tarea.borrar');

    Route::get('/tareas/eliminararchivo/{id}', 'TareasControlador@deleteFile')->name('tarea.deletefile') ;

    
    Route::get('/proyecto/{project}/miembros', 'EquipoControlador@show')->name('miembros.show');
    Route::get('/miembros/eliminar/{projectuser}', 'EquipoControlador@destroy')->name('miembros.eliminar');
    Route::post('/miembros/anadir', 'EquipoControlador@anadir')->name('equipo.anadir');


    Route::get('/pbis/{pbi}/comentarios', 'ComentarioControlador@show')->name('coment.show');
    Route::post('/comentarios/crear', 'ComentarioControlador@store')->name('coment.store');
    Route::get('/comentario/{comentario}/eliminar', 'ComentarioControlador@destroy')->name('coment.elim');


    Route::get('projects/create/{company_id?}', 'ProjectsController@create');
    Route::post('/projects/adduser', 'ProjectsController@adduser')->name('projects.adduser');
    Route::get('/projects/{project}/papelera/historias','ProjectsController@papelera_historias');
    Route::get('/projects/{project}/papelera/tareas','ProjectsController@papelera_tareas');
    
    Route::resource('companias', 'CompaniesController');
    Route::resource('projects', 'ProjectsController');
    Route::resource('roles', 'RolesController');
    //Route::resource('tareas', 'TareasControlador');
    Route::resource('users', 'UsersController');
    //Route::resource('comments', 'CommentsController');
    Route::resource('pbis', 'PbisController');
    Route::resource('sprints', 'SprintsControlador');


    Route::get('/usuarios/{user}/editar', 'UsersController@edit')->name('usuarios.edit');
    Route::post('/usuarios/actualizar', 'UsersController@update')->name('usuarios.update');
    Route::get('/usuarios/{user}/eliminar', 'UsersController@destroy')->name('usuarios.delete');
    
    Route::get('/usuarios/{user}/activacion', 'UsersController@camEstado')->name('usuarios.cambiar');


    Route::get('pbis/edit/{id}', 'PbisController@edit')->name('pbis.edit');
    Route::get('pbis/update', 'PbisController@update')->name('pbis.update');
    Route::get('/pbis/delete/{id}', 'PbisController@eliminar')->name('pbis.eliminar');
    Route::post('/pbis/delete', 'PbisController@destroy')->name('pbis.delete');
    Route::get('/pbis/recuperar/{id}', 'PbisController@recuperar')->name('pbis.recuperar');
    Route::get('/pbis/{id}/historial', 'PbisController@historial')->name('pbis.historial');
    

    Route::get('sprints', 'SprintsControlador@store');
    Route::post('/sprints/create', 'SprintsControlador@create');
    Route::get('/sprints/delete/{id}', 'SprintsControlador@destroy')->name('sprints.delete');
    Route::get('sprints/edit/{id}', 'SprintsControlador@edit')->name('sprints.edit');
    Route::post('/sprints/update', 'SprintsControlador@update')->name('sprints.update');
    //Route::get('sprints/create', 'ProjectsController@createSprint');
    //Route::get('pbis/create', 'PbisController@store')->name('pbis.store');

    //administrador
    Route::get('/admin/proyectos', 'ProjectsController@todos')->name('proyecto.todos');
    Route::get('/admin/{project}/eliminar', 'ProjectsController@destroy_admin')->name('proyecto.delete');
    //reportes
    Route::get('projects/{project}/reporte/sprints', 'ReportesControlador@rep_sprints');
    Route::get('projects/{project}/reportes', 'ReportesControlador@rep_pro_bac');
    Route::get('projects/{project}/reporte/tareas', 'ReportesControlador@rep_tar');
    Route::get('projects/{project}/reporte/tareas_estado', 'ReportesControlador@rep_tar_est');
    Route::get('projects/{project}/reporte/equipo', 'ReportesControlador@rep_usuarios');

    
});
