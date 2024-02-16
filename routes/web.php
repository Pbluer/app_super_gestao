<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/','PrincipalController@principal')->name('site.principal');

Route::get('/sobre-nos','SobreNosController@sobreNos')->name('site.sobreNos');

Route::get('/contato','ContatoController@contato')->name('site.contato');
Route::post('/contato','ContatoController@salvar')->name('site.contato');

Route::prefix('/app')->group( function(){    

    Route::get('/login', fn() => 'login' )
        ->name('app.login');    

    Route::get('/clientes', fn() => 'clientes' )
        ->name('app.clientes');

    Route::get('/fornecedores', 'FornecedorController@index' )
        ->name('app.fornecedores');

    Route::get('/produtos', fn() => 'produtos' )
        ->name('app.produtos');
});


/* Route::get('/contato/{nome}/{idade?}/{cidade?}', function (
    String $nome = "Nome",
    Int $idade = 0,
    String $uf = "uf"
){
    echo "Cadastro: $nome - $idade - $uf";
})->where(["nome","[0-9]"]); */


/* Route::get('/', function () {
    return view('welcome');
});
 */