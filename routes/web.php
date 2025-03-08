    <?php

    use App\Http\Controllers\Api\AuthCotroller;
    use App\Http\Controllers\Api\InventarioController;
use App\Http\Controllers\Api\MatController;
use App\Http\Controllers\views\ControllerVista;
    use Illuminate\Support\Facades\Route;
    
    
    //Ruta de inicio sin (Middleware)
    Route::get("/",[ControllerVista::class,'__invoke'])->name('inicioSesion');//VISTA Pagina InicioSesion
    
    //ruta Autentificacion sin (Middleware)
    Route::controller(AuthCotroller::class)->group(function(){
        Route::post('/login','authenticate')->name('login'); //METODO_login
        Route::post('/logout','logout')->name('cerrarSesion');//METODO_logout
    });
    
    Route::get('usuarios',[AuthCotroller::class,'index']);//sin usar
    Route::post('/createUsuario',[AuthCotroller::class,'store']);

    Route::get('/inventario',[InventarioController::class,'inventario']);
    Route::post('/registroInventario',[InventarioController::class,'registrarInventario']);

    //materiales
    Route::get('/material',[MatController::class,'listaMaterial'])->name('listaMaterial');//ruta para ver material
    Route::post('/materialCreate',[MatController::class,'registrarMaterial'])->name('registroMaterial'); //regitro de material
    Route::post('/editarMaterial/{id}',[MatController::class,'obtenerUnMaterial'])->name('editarMaterial'); //obtener un material

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
    Route::post('/agregarUbicacion/{id}',[InventarioController::class,'registrarUbicacion'])->name('registroUbicacion')->middleware('auth');
    //Route::middleware('auth')->post('/agregarUbicacion/{id}', [InventarioController::class, 'registrarUbicacion'])->name('registroUbicacion');

    //dirige ala unicio de sesion si no hay ruta
    Route::fallback(function(){return redirect()->route('inicioSesion');}); //METD_RETURN LOGIN
