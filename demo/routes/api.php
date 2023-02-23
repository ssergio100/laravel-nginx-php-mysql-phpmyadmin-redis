<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



// Rota para listar todas as tarefas
Route::get('/tasks', [TaskController::class, 'index']);

// Rota para criar uma nova tarefa
Route::post('/tasks', [TaskController::class, 'store']);

// Rota para exibir uma única tarefa
Route::get('/tasks/{id}', [TaskController::class, 'show']);

// Rota para atualizar uma tarefa existente
Route::put('/tasks/{id}', [TaskController::class, 'update']);

// Rota para excluir uma tarefa existente
Route::delete('/tasks/{id}', [TaskController::class, 'destroy']);

// Rota para valdiar cpf
Route::get('/cpf/{cpf}', [TaskController::class, 'validaCpf']);