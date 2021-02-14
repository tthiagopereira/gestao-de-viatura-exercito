<?php

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

Auth::routes();
/* CoreUI templates */

Route::middleware('auth')->group(function() {
    Route::get('/', 'HomeController@paginaInicial');

    // Section CoreUI elements
    Route::view('/sample/dashboard','samples.dashboard');
    Route::view('/sample/buttons','samples.buttons');
    Route::view('/sample/social','samples.social');
    Route::view('/sample/cards','samples.cards');
    Route::view('/sample/forms','samples.forms');
    Route::view('/sample/modals','samples.modals');
    Route::view('/sample/switches','samples.switches');
    Route::view('/sample/tables','samples.tables');
    Route::view('/sample/tabs','samples.tabs');
    Route::view('/sample/icons-font-awesome', 'samples.font-awesome-icons');
    Route::view('/sample/icons-simple-line', 'samples.simple-line-icons');
    Route::view('/sample/widgets','samples.widgets');
    Route::view('/sample/charts','samples.charts');


    //	Sistema
    Route::get('detalhe/{id}','ServicoViaturaController@detalhe')->name('detalhe');

    //Usuárioss
    Route::get('usuarios','UsuarioController@index')->name('usuarios');
    Route::get('usuario/adicionar','UsuarioController@adicionar')->name('usuario.adicionar');
    Route::post('usuario/salvar','UsuarioController@salvar')->name('usuario.salvar');
    Route::get('usuario/editar/{id}','UsuarioController@editar')->name('usuario.editar');
    Route::post('usuario/atualizar/{id}','UsuarioController@atualizar')->name('usuario.atualizar');
    Route::get('usuario/deletar/{id}','UsuarioController@excluir')->name('usuario.excluir');

    //Pedido de viatura
    Route::get('servico/pedido/viatura','ServicoViaturaController@index')->name('servico.viatura');
    Route::get('servico/pedido/viatura/adicionar','ServicoViaturaController@adicionar')->name('servico.viatura.adicionar');
    Route::post('servico/pedido/viatura/salvar','ServicoViaturaController@salvar')->name('servico.viatura.salvar');
    Route::get('servico/pedido/viatura/editar/{id}','ServicoViaturaController@editar')->name('servico.viatura.editar');
    Route::get('servico/pedido/viatura/detalhe/{id}','ServicoViaturaController@detalhe')->name('servico.viatura.detalhe');
    Route::post('servico/pedido/viatura/atualizar/{id}','ServicoViaturaController@atualizar')->name('servico.viatura.atualizar');
    Route::get('servico/pedido/viatura/deletar/{id}','ServicoViaturaController@excluir')->name('servico.viatura.excluir');
    Route::get('viatura/detalhe/pdf/{id}','ServicoViaturaController@pdf')->name('servico.pdf');

    //Viaturas
    Route::get('viatura','ViaturaController@index')->name('viaturas');
    Route::get('viatura/adicionar','ViaturaController@adicionar')->name('viatura.adicionar');
    Route::post('viatura/salvar','ViaturaController@salvar')->name('viatura.salvar');
    Route::get('viatura/editar/{id}','ViaturaController@editar')->name('viatura.editar');
    Route::get('viatura/detalhe/{id}','ViaturaController@detalhe')->name('viatura.detalhe');
    Route::post('viatura/atualizar/{id}','ViaturaController@atualizar')->name('viatura.atualizar');
    Route::get('viatura/deletar/{id}','ViaturaController@excluir')->name('viatura.excluir');

    //ficha
    Route::get('ficha','FichaController@index')->name('ficha');
    Route::get('analise','FichaController@analise')->name('analise');
    Route::get('ficha/adicionar/{id}','FichaController@adicionar')->name('ficha.adicionar');
    Route::post('ficha/salvar','FichaController@salvar')->name('ficha.salvar');
    Route::get('ficha/editar/{id}','FichaController@editar')->name('ficha.editar');
    Route::get('ficha/detalhe/{id}','FichaController@detalhe')->name('ficha.detalhe');
    Route::post('ficha/atualizar/{id}','FichaController@atualizar')->name('ficha.atualizar');
    Route::get('ficha/aprovar/{id}','FichaController@aprovar')->name('ficha.aprovar');
    Route::get('ficha/deletar/{id}','FichaController@excluir')->name('ficha.excluir');
    Route::get('ficha/pdf/{id}','FichaController@pdf')->name('ficha.pdf');

    //mapas
    Route::get('mapa','MapaController@index')->name('mapas');
    Route::post('mapa/pesquisa','MapaController@pesquisaData')->name('mapa.pesquisa');
    Route::post('mapa/pdf/','MapaController@pdf')->name('mapa.pdf');
    Route::get('mapa/update/{id}','MapaController@editar')->name('mapa.update');
    Route::post('mapa/update/{id}','MapaController@update')->name('mapa.update');

    //Dashboard
    ///carrega/pedidos
    Route::get('carrega/pedidos','HomeController@carregaPedidos');
    Route::get('carrega/viaturas','HomeController@carregaViaturas');
    Route::get('carrega/quantidade/missoes','HomeController@carregarQuantidadeMissoes');
    Route::get('/carrega/quantidade/motoristas','HomeController@carregarQuantidadeMotoristas');


    //escalao
    Route::get('escalao','EscalaoController@index')->name('escalao');
    Route::get('escalao/adicionar','EscalaoController@adicionar')->name('escalao.adicionar');
    Route::post('escalao/salvar','EscalaoController@salvar')->name('escalao.salvar');
    Route::get('escalao/editar/{id}','EscalaoController@editar')->name('escalao.editar');
    Route::post('escalao/atualizar/{id}','EscalaoController@atualizar')->name('escalao.atualizar');
    Route::get('escalao/deletar/{id}','EscalaoController@excluir')->name('escalao.excluir');

    //motorista
    Route::get('motorista','MotoristaController@index')->name('motorista');
    Route::get('motorista/escolher','MotoristaController@escolherMotorista')->name('motorista.escolher');
    Route::get('motorista/adicionar/{id}','MotoristaController@adicionar')->name('motorista.adicionar');
    Route::post('motorista/salvar','MotoristaController@salvar')->name('motorista.salvar');
    Route::get('motorista/editar/{id}','MotoristaController@editar')->name('motorista.editar');
    Route::post('motorista/atualizar/{id}','MotoristaController@atualizar')->name('motorista.atualizar');
    Route::get('motorista/deletar/{id}','MotoristaController@excluir')->name('motorista.excluir');

});
// Section Pages
Route::view('/sample/error404','errors.404')->name('error404');
Route::view('/sample/error500','errors.500')->name('error500');
Route::view('/alterar/senha','pages.senha')->name('senha');
Route::post('esqueceu/senha','UsuarioController@esqueceuSenha')->name('esqueceu.senha');