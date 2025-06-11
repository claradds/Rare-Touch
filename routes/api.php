
<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Rota para listar todos os produtos
Route::get('/products', [ProductController::class, 'index']);

// Rota para exibir um produto específico
Route::get('/products/{id}', [ProductController::class, 'show']);

// Rota para criar um novo produto
Route::post('/products', [ProductController::class, 'store']);

// Rota para atualizar um produto existente
Route::put('/products/{id}', [ProductController::class, 'update']);

// Rota para excluir um produto
Route::delete('/products/{id}', [ProductController::class, 'destroy']);