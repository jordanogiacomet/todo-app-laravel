<?php

use App\Models\Todo;
use App\Http\Resources\TodoResource;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TodosController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/home', function () {
    
    $todos = [];

    if(auth()->check()){
        $todos = auth()->user()->todos()->latest()->paginate(5);
    }
    
    
    return view('home', [
        'todos' => $todos
    ]);
});

Route::get('/login-page', function(){
    return view('login-page');
});

Route::get('/json/{id}', function(string $id){
    return new TodoResource(Todo::findOrFail($id));
});


Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);
Route::post('/logout', [UserController::class, 'logout']);
Route::post('/adicionar', [TodosController::class, 'createTodo']);
Route::delete('/remover/{todo}', [TodosController::class, 'deleteTodo']);
Route::put('/completar/{todo}', [TodosController::class, 'completeTodo']);