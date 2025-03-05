    <?php

    use App\Http\Controllers\Api\AuthCotroller;
    use App\Http\Controllers\views\ControllerVista;
    use Illuminate\Support\Facades\Route;
    
    //Ruta de inicio sin (Middleware)
    Route::get("/",[ControllerVista::class,'__invoke'])->name('inicioSesion');//VISTA Pagina InicioSesion

    //ruta Autentificacion sin (Middleware)
    Route::controller(AuthCotroller::class)->group(function(){
        Route::post('/login','authenticate')->name('login'); //METOD_login
        Route::post('/logout','logout')->name('cerrarSesion');//METODO_logout
    });
    //Rutas de inicio
    //Route::post('/login',[AuthCotroller::class,'authenticate'])->name('login'); //FUNC(login)

    
    //Ruta Agrupada por middleware('auth')
    Route::middleware('auth')->group(function(){
        //ruta para el dashboard
        Route::get("/dashboard", [ControllerVista::class, 'dashboard'])->name('dashboard');//VISTA
        Route::get("/embarques", [ControllerVista::class, 'embarques'])->name('embarques');//VISTA
        Route::get("/conteos", [ControllerVista::class, 'conteos'])->name('conteos');//VISTA
        Route::get("/surtido", [ControllerVista::class, 'surtido'])->name('surtido');//VISTA
        Route::get("/embarqueseditar", [ControllerVista::class, 'embarqueseditar'])->name('embarqueseditar');//VISTA
        Route::get("/embarquesagregar", [ControllerVista::class, 'embarquesagregar'])->name('embarquesagregar');//VISTA
        Route::get("/conteoagregar", [ControllerVista::class, 'conteoagregar'])->name('conteoagregar');//VISTA
        Route::get("/surtsalida", [ControllerVista::class, 'surtsalida'])->name('surtsalida');//VISTA
        Route::get("/dashboardusuarios", [ControllerVista::class, 'dashboardusuarios'])->name('dashboardusuarios');//VISTA
    
    });

    //dirige ala unicio de sesion si no hay ruta
    Route::fallback(function(){return redirect()->route('inicioSesion');}); //METD_RETURN LOGIN
