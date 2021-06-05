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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware'=>['auth']], function(){
    Route::get('/dashboard','App\Http\Controllers\DashboardController@index')->name('dashboard');
});

Route::group(['middleware'=>['auth', 'role:user']], function(){
    Route::get('/luce','App\Http\Controllers\userController@luce')->name('luce');
    Route::post('/attiva','App\Http\Controllers\userController@attiva')->name('attiva');
    Route::get('/gas','App\Http\Controllers\userController@gas')->name('gas');
    Route::post('/myContratti','App\Http\Controllers\userController@contratti')->name('myContratti');
    Route::get('/myContratti','App\Http\Controllers\userController@contrattiview')->name('myContratti');
    Route::post('/removeCon','App\Http\Controllers\userController@removeContratto')->name('removeCon');
    Route::post('/Bollette','App\Http\Controllers\userController@bolletta')->name('Bollette');
    Route::post('/Pagamento','App\Http\Controllers\userController@bollettaPag')->name('Pagamento');
    Route::post('/paga','App\Http\Controllers\userController@paga')->name('paga');
    Route::post('/vedi','App\Http\Controllers\userController@vedi')->name('vedi');
    Route::post('/indietro','App\Http\Controllers\userController@indietro')->name('indietro');
    Route::post('/letturaGrafico','App\Http\Controllers\userController@letturaGrafico')->name('letturaGrafico');
    Route::post('/scarica','App\Http\Controllers\userController@scarica')->name('scarica');

});

Route::group(['middleware'=>['auth', 'role:imprese']], function(){
    Route::get('/luceI','App\Http\Controllers\impreseController@luce')->name('luceI');
    Route::post('/attivaI','App\Http\Controllers\impreseController@attiva')->name('attivaI');
    Route::get('/gasI','App\Http\Controllers\impreseController@gas')->name('gasI');
    Route::post('/ContrattiI','App\Http\Controllers\impreseController@contratti')->name('ContrattiI');
    Route::get('/ContrattiI','App\Http\Controllers\impreseController@contrattiview')->name('ContrattiI');
    Route::post('/removeConI','App\Http\Controllers\impreseController@removeContratto')->name('removeConI');
    Route::post('/BolletteI','App\Http\Controllers\impreseController@bolletta')->name('BolletteI');
    Route::post('/PagamentoI','App\Http\Controllers\impreseController@bollettaPag')->name('PagamentoI');
    Route::post('/pagaI','App\Http\Controllers\impreseController@paga')->name('pagaI');
    Route::post('/vediI','App\Http\Controllers\impreseController@vedi')->name('vediI');
    Route::post('/indietroI','App\Http\Controllers\impreseController@indietro')->name('indietroI');
    Route::post('/letturaGraficoI','App\Http\Controllers\impreseController@letturaGrafico')->name('letturaGraficoI');
    Route::post('/scaricaImp','App\Http\Controllers\impreseController@scarica')->name('scaricaImp');
});

Route::group(['middleware'=>['auth', 'role:admin']], function(){
    Route::get('/tabella','App\Http\Controllers\adminController@table')->name('tabella');
    Route::post('/insertCliente','App\Http\Controllers\adminController@insertCliente')->name('insertCliente');
    Route::post('/updateCliente','App\Http\Controllers\adminController@updateCliente')->name('updateCliente');
    Route::post('/removeCliente','App\Http\Controllers\adminController@removeCliente')->name('removeCliente');

    Route::post('/insertContratto','App\Http\Controllers\adminController@insertContratto')->name('insertContratto');
    Route::post('/updateContratto','App\Http\Controllers\adminController@updateContratto')->name('updateContratto');
    Route::post('/removeContratto','App\Http\Controllers\adminController@removeContratto')->name('removeContratto');

    Route::post('/insertBolletta','App\Http\Controllers\adminController@insertBolletta')->name('insertBolletta');
    Route::post('/updateBolletta','App\Http\Controllers\adminController@updateBolletta')->name('updateBolletta');
    Route::post('/removeBolletta','App\Http\Controllers\adminController@removeBolletta')->name('removeBolletta');

    Route::post('/letturaLuce','App\Http\Controllers\adminController@letturaLuce')->name('letturaLuce');
    Route::post('/removeLettura','App\Http\Controllers\adminController@removeLettura')->name('removeLettura');
    Route::post('/lettura','App\Http\Controllers\adminController@lettura')->name('lettura');
});

require __DIR__.'/auth.php';
