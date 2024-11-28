<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\CarrinhoController;
use App\Http\Controllers\LoginController;
use  App\Http\Controllers\DashboardController;
use  App\Http\Controllers\UserController;

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

Route::get('/', function() {
    return view('welcome');
});

// Route::get('/produto', [ProdutoController::class, "index"]);
// Route::get('/produto2/{nome}', [ProdutoController::class, "mostrarNomeProduto"]);

Route::resource('users', UserController::class);

Route::get('/listaProdutos', [SiteController::class, "listagemDeProdutos"])->name('site.listagem');
Route::get('/produto/{slug}', [SiteController::class, "details"])->name('site.details');
Route::get('/categoria/{id}', [SiteController::class, "categoria"])->name('site.categoria');

Route::get('/carrinho', [CarrinhoController::class, 'carrinhoLista'])->name('site.carrinho');
Route::post('/carrinho', [CarrinhoController::class, 'adicionarCarrinho'])->name('site.addcarrinho');
Route::post('/remover', [CarrinhoController::class, 'removerCarrinho'])->name('site.removercarrinho');
Route::post('/atualizar', [CarrinhoController::class, 'atualizarCarrinho'])->name('site.atualizarcarrinho');
Route::get('/limpar', [CarrinhoController::class, 'limparCarrinho'])->name('site.limparcarrinho');

Route::view('/login', 'login/form')->name('login.form');
Route::post('/auth', [LoginController::class, 'auth'])->name('login.auth');
Route::get('/logout', [LoginController::class, 'logout'])->name('login.logout');
Route::get('/register', [LoginController::class, 'create'])->name('login.create');

Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name("admin.dashboard")->middleware('auth');
Route::get('/admin/produtos', [ProdutoController::class, "index"])->name('admin.produtos');
Route::delete('/admin/produto/delete/{id}', [ProdutoController::class, "destroy"])->name('admin.produto.delete');
Route::post('/admin/produto/store', [ProdutoController::class, "store"])->name('admin.produto.store');



Route::get('/empresa', function () {
    return view('site/empresa');
});


