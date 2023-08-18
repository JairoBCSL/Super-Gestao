<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\ClienteController;
use \App\Http\Controllers\ProdutoController;
use \App\Http\Controllers\ProdutoDetalheController;
use \App\Http\Controllers\PedidoController;
use \App\Http\Controllers\PedidoProdutoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return 'Olá, seja bem-vindo ao curso!';
});*/

Route::get('/', 'App\Http\Controllers\PrincipalController@principal')->name('site.index');

Route::get('/sobre-nos', 'App\Http\Controllers\SobreNosController@sobreNos')->name('site.sobrenos');

Route::get('/contato', 'App\Http\Controllers\ContatoController@contato')->name('site.contato');
Route::post('/contato', 'App\Http\Controllers\ContatoController@salvar')->name('site.contato');

Route::get('/login/{erro?}', 'App\Http\Controllers\LoginController@index' )->name('site.login');
Route::post('/login', 'App\Http\Controllers\LoginController@autenticar' )->name('site.login');

// /app
Route::middleware('autenticacao')->prefix('/app')->group(function(){
    Route::get('/home', '\App\Http\Controllers\HomeController@index' )->name('app.home');
    Route::get('/fornecedor', 'App\Http\Controllers\FornecedorController@index' )->name('app.fornecedor');
    Route::post('/fornecedor/listar', 'App\Http\Controllers\FornecedorController@listar' )->name('app.fornecedor.listar');
    Route::get('/fornecedor/listar', 'App\Http\Controllers\FornecedorController@listar' )->name('app.fornecedor.listar');
    Route::get('/fornecedor/adicionar', 'App\Http\Controllers\FornecedorController@adicionar' )->name('app.fornecedor.adicionar');
    Route::post('/fornecedor/adicionar', 'App\Http\Controllers\FornecedorController@adicionar' )->name('app.fornecedor.adicionar');
    Route::get('/fornecedor/editar/{id}/{msg?}', 'App\Http\Controllers\FornecedorController@editar' )->name('app.fornecedor.editar');
    Route::get('/fornecedor/excluir/{id}', 'App\Http\Controllers\FornecedorController@excluir' )->name('app.fornecedor.excluir');
    //Route::get('/produto', '\App\Http\Controllers\ProdutoController@index')->name('app.produto');
    Route::get('/sair', '\App\Http\Controllers\LoginController@sair')->name('app.sair');

    Route::resource('produto', ProdutoController::class);
    Route::resource('produto-detalhe', ProdutoDetalheController::class);
    Route::resource('cliente', ClienteController::class);
    Route::resource('pedido', PedidoController::class);
    Route::resource('pedido_produto', PedidoProdutoController::class);
    Route::get('pedido_produto/create/{pedido}', 'App\Http\Controllers\PedidoProdutoController@create')->name('pedido_produto.criar');

});

Route::fallback(function(){
    echo 'A rota acessada não existe. Clique <a href="'.route('site.index').'">aqui</a> para ir para a página inicial';
});


/*
Route::get('/contato/{nome}/{categoria_id?}', function(string $nome = 'Sem nome', int $categoria_id=1){
    echo 'A categoria de ' . $nome . ' eh ' . $categoria_id . ' (int)';
})->where('categoria_id', '[0-9]+');

Route::get('/contato/{nome}/{categoria?}', function(string $nome = 'Sem nome', string $categoria='desconhecida'){
    echo 'A categoria de ' . $nome . ' eh ' . $categoria . ' (string)';
})->where('categoria_id', '[a-zA-Z]+');
*/


/* verbos http

get
post
put
patch
delete
options

*/

/* Métodos controllers

index -> listar registros
create -> Exibir formuláiro de criação
store -> Receber formulário de criação
show -> Exibir registro específico
edit -> Exibir formulário de edição
update -> Receber formulário de edição
destroy -> Receber dados para remoção

*/