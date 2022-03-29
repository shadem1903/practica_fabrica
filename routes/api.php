<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EstudianteController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register',[UserController::class, 'register']);
Route::post('login',[UserController::class, 'login']);

Route::group(['middleware' => ["auth:sanctum"]],function(){
    //rutas
    Route::post('user',[UserController::class, 'userProfile']);
});

Route::get('/estudiante',[EstudianteController::class,'index']);// muestra todos los registros
Route::post('/estudiante',[EstudianteController::class,'store']);//crea un registro
Route::put('/estudiante/{id}',[EstudianteController::class,'update']);//actualiza un registro
Route::delete('/estudiante/{id}',[EstudianteController::class,'destroy']);//elimina un registro