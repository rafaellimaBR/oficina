<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/teste',function(){
    $contrato   =   \App\Contrato::find(15102356395);
//    return $contrato;
//    dd(\App\Pedido::faturarPecas(1));
    return \App\Pedido::faturarPecas(1);


});

Route::group(['prefix' => 'admin'], function () {

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    });

//    Clientes
    Route::get('/cliente',              ['as'=>'cliente.index','uses'=>'Admin\ClienteController@index']);
    Route::get('/cliente/novo',         ['as'=>'cliente.novo','uses'=>'Admin\ClienteController@novo']);
    Route::get('/cliente/editar/{id}',  ['as'=>'cliente.editar','uses'=>'Admin\ClienteController@editar']);
    Route::post('/cliente/cadastrar',   ['as'=>'cliente.cadastrar','uses'=>'Admin\ClienteController@cadastrar']);
    Route::post('/cliente/atualizar',   ['as'=>'cliente.atualizar','uses'=>'Admin\ClienteController@atualizar']);
    Route::post('/cliente',             ['as'=>'cliente.pesquisa','uses'=>'Admin\ClienteController@pesquisar']);
    Route::post('/cliente/pesquisarCliente/',  ['as'=>'cliente.pesquisa','uses'=>'Admin\ClienteController@pesquisarAjax']);
    Route::post('/cliente/excluir',     ['as'=>'cliente.excluir','uses'=>'Admin\ClienteController@excluir']);
    Route::post('/cliente/adctelefone',   ['as'=>'cliente.adctelefone','uses'=>'Admin\ClienteController@adcTelefone']);

//      Marcas
    Route::get('/marca',              ['as'=>'marca.index','uses'=>'Admin\MarcaController@index']);
    Route::get('/marca/novo',         ['as'=>'marca.novo','uses'=>'Admin\MarcaController@novo']);
    Route::get('/marca/editar/{id}',  ['as'=>'marca.editar','uses'=>'Admin\MarcaController@editar']);
    Route::post('/marca/cadastrar',   ['as'=>'marca.cadastrar','uses'=>'Admin\MarcaController@cadastrar']);
    Route::post('/marca/atualizar',   ['as'=>'marca.atualizar','uses'=>'Admin\MarcaController@atualizar']);
    Route::post('/marca',             ['as'=>'marca.pesquisa','uses'=>'Admin\MarcaController@pesquisar']);
    Route::post('/marca/excluir',     ['as'=>'marca.excluir','uses'=>'Admin\MarcaController@excluir']);
    Route::get('/marca/{id}/modelos',  ['as'=>'marca.pesquisarid','uses'=>'Admin\MarcaController@pesquisarPorID']);

//    Modelo
    Route::get('/modelo',              ['as'=>'modelo.index','uses'=>'Admin\ModeloController@index']);
    Route::get('/modelo/novo',         ['as'=>'modelo.novo','uses'=>'Admin\ModeloController@novo']);
    Route::get('/modelo/editar/{id}',  ['as'=>'modelo.editar','uses'=>'Admin\ModeloController@editar']);
    Route::post('/modelo/cadastrar',   ['as'=>'modelo.cadastrar','uses'=>'Admin\ModeloController@cadastrar']);
    Route::post('/modelo/atualizar',   ['as'=>'modelo.atualizar','uses'=>'Admin\ModeloController@atualizar']);
    Route::post('/modelo',             ['as'=>'modelo.pesquisa','uses'=>'Admin\ModeloController@pesquisar']);
    Route::post('/modelo/excluir',     ['as'=>'modelo.excluir','uses'=>'Admin\ModeloController@excluir']);

//    Veiculo
    Route::get('/veiculo',              ['as'=>'veiculo.index','uses'=>'Admin\VeiculoController@index']);
    Route::get('/veiculo/novo',         ['as'=>'veiculo.novo','uses'=>'Admin\VeiculoController@novo']);
    Route::get('/veiculo/editar/{id}',  ['as'=>'veiculo.editar','uses'=>'Admin\VeiculoController@editar']);
    Route::get('/veiculo/detalhes/{id}',['as'=>'veiculo.detalhes','uses'=>'Admin\VeiculoController@detalhes']);
    Route::post('/veiculo/cadastrar',   ['as'=>'veiculo.cadastrar','uses'=>'Admin\VeiculoController@cadastrar']);
    Route::post('/veiculo/atualizar',   ['as'=>'veiculo.atualizar','uses'=>'Admin\VeiculoController@atualizar']);
    Route::post('/veiculo',             ['as'=>'veiculo.pesquisa','uses'=>'Admin\VeiculoController@pesquisar']);
    Route::post('/veiculo/pesquisarPlaca',['as'=>'veiculo.placa','uses'=>'Admin\VeiculoController@placa']);
    Route::post('/veiculo/excluir',     ['as'=>'veiculo.excluir','uses'=>'Admin\VeiculoController@excluir']);

//    Servico
    Route::get('/servico',              ['as'=>'servico.index','uses'=>'Admin\ServicoController@index']);
    Route::get('/servico/novo',         ['as'=>'servico.novo','uses'=>'Admin\ServicoController@novo']);
    Route::get('/servico/editar/{id}',  ['as'=>'servico.editar','uses'=>'Admin\ServicoController@editar']);
    Route::post('/servico/cadastrar',   ['as'=>'servico.cadastrar','uses'=>'Admin\ServicoController@cadastrar']);
    Route::post('/servico/atualizar',   ['as'=>'servico.atualizar','uses'=>'Admin\ServicoController@atualizar']);
    Route::post('/servico',             ['as'=>'servico.pesquisa','uses'=>'Admin\ServicoController@pesquisar']);
    Route::post('/servico/pesquisarServico',['as'=>'servico.pesquisarservico','uses'=>'Admin\ServicoController@pesquisarServico']);
    Route::get('/servico/getServico/{id}',['as'=>'servico.getServico','uses'=>'Admin\ServicoController@getServico']);
    Route::post('/servico/excluir',     ['as'=>'servico.excluir','uses'=>'Admin\ServicoController@excluir']);

//    Categoria
    Route::get('/categoria',              ['as'=>'categoria.index','uses'=>'Admin\CategoriaController@index']);
    Route::get('/categoria/novo',         ['as'=>'categoria.novo','uses'=>'Admin\CategoriaController@novo']);
    Route::get('/categoria/editar/{id}',  ['as'=>'categoria.editar','uses'=>'Admin\CategoriaController@editar']);
    Route::post('/categoria/cadastrar',   ['as'=>'categoria.cadastrar','uses'=>'Admin\CategoriaController@cadastrar']);
    Route::post('/categoria/atualizar',   ['as'=>'categoria.atualizar','uses'=>'Admin\CategoriaController@atualizar']);
    Route::post('/categoria',             ['as'=>'categoria.pesquisa','uses'=>'Admin\CategoriaController@pesquisar']);
    Route::post('/categoria/excluir',     ['as'=>'categoria.excluir','uses'=>'Admin\CategoriaController@excluir']);

//    Peca
    Route::get('/estoque',                      ['as'=>'peca.index','uses'=>'Admin\PecaController@index']);
    Route::get('/estoque/peca/novo',            ['as'=>'peca.novo','uses'=>'Admin\PecaController@novo']);
    Route::get('/estoque/peca/editar/{id}',     ['as'=>'peca.editar','uses'=>'Admin\PecaController@editar']);
    Route::post('/estoque/peca/cadastrar',      ['as'=>'peca.cadastrar','uses'=>'Admin\PecaController@cadastrar']);
    Route::post('/estoque/peca/atualizar',      ['as'=>'peca.atualizar','uses'=>'Admin\PecaController@atualizar']);
    Route::get('/estoque/getPeca/{id}',             ['as'=>'peca.getPeca','uses'=>'Admin\PecaController@getPeca']);
    Route::post('/estoque/peca/pesquisaAjax',      ['as'=>'peca.pesquisaAjax','uses'=>'Admin\PecaController@pesqusiarAjax']);
    Route::post('/estoque',                     ['as'=>'peca.pesquisa','uses'=>'Admin\PecaController@pesquisar']);
    Route::post('/estoque/excluir',             ['as'=>'peca.excluir','uses'=>'Admin\PecaController@excluir']);

//    Contrato
    Route::get('/contrato',              ['as'=>'contrato.index','uses'=>'Admin\ContratoController@index']);
    Route::get('/contrato/ordemservico/novo',         ['as'=>'contrato.novo','uses'=>'Admin\ContratoController@novo']);
    Route::get('/contrato/orcamento/novo',         ['as'=>'contrato.novoorcamento','uses'=>'Admin\ContratoController@novoOrcamento']);
    Route::get('/contrato/editar/{id}',  ['as'=>'contrato.editar','uses'=>'Admin\ContratoController@editar']);
    Route::post('/contrato/cadastrar',   ['as'=>'contrato.cadastrar','uses'=>'Admin\ContratoController@cadastrar']);
    Route::post('/contrato/atualizar',   ['as'=>'contrato.atualizar','uses'=>'Admin\ContratoController@atualizar']);
    Route::post('/contrato',             ['as'=>'contrato.pesquisa','uses'=>'Admin\ContratoController@pesquisar']);
    Route::post('/contrato/excluir',     ['as'=>'contrato.excluir','uses'=>'Admin\ContratoController@excluir']);
    Route::post('/contrato/addServico',  ['as'=>'contrato.addservico','uses'=>'Admin\ContratoController@addServico']);
    Route::post('/contrato/remServico',  ['as'=>'contrato.remservico','uses'=>'Admin\ContratoController@remServico']);
    Route::post('/contrato/addPeca',        ['as'=>'contrato.addpeca','uses'=>'Admin\ContratoController@addPeca']);
    Route::post('/contrato/rmPeca',        ['as'=>'contrato.rmPeca','uses'=>'Admin\ContratoController@rmPeca']);
    Route::post('/contrato/cancelar',        ['as'=>'contrato.cancelar','uses'=>'Admin\ContratoController@cancelar']);
    Route::post('/contrato/finalizar',        ['as'=>'contrato.finalizar','uses'=>'Admin\ContratoController@finalizar']);
    Route::post('/contrato/andamento',        ['as'=>'contrato.andamento','uses'=>'Admin\ContratoController@andamento']);
    Route::post('/contrato/autorizar',        ['as'=>'contrato.autorizar','uses'=>'Admin\ContratoController@autorizar']);
    Route::post('/contrato/aberto',        ['as'=>'contrato.aberto','uses'=>'Admin\ContratoController@aberto']);


    Route::get('/configuracao',             ['as'=>'configuracao.editar','uses'=>'Admin\ConfiguracaoController@editar']);
    Route::post('/configuracao/atualizar',   ['as'=>'configuracao.atualizar','uses'=>'Admin\ConfiguracaoController@atualizar']);

    View::composer(['admin.modelo.includes.formulario','admin.modelo.index','admin.veiculo.includes.formulario'],function($view) {
        $marcas    =   \App\Marca::all();
        $dados = [];

        foreach($marcas as $r){
            $dados[$r->id] = $r->nome;
        }
        $view->with('marcas',$dados);
    });
    View::composer(['admin.contrato.index'],function($view) {
        $veiculos    =   \App\Veiculo::all();
        $dados = [];

        foreach($veiculos as $r){
            $dados[$r->id] = $r->id.' | '.$r->modelo->nome;
        }
        $view->with('veiculos',$dados);
    });
    View::composer(['admin.veiculo.index'],function($view) {
        $modelos    =   \App\Modelo::all();
        $dados = [];

        foreach($modelos as $r){
            $dados[$r->id] = $r->nome;
        }
        $view->with('modelos',$dados);
    });
    View::composer(['admin.veiculo.includes.formulario','admin.contrato.index'],function($view) {
        $clientes    =   \App\Cliente::all();
        $dados = [];

        foreach($clientes as $r){
            $dados[$r->id] = $r->nome.' | '.$r->registro;
        }
        $view->with('clientes',$dados);
    });
    View::composer(['admin.peca.includes.formulario','admin.peca.index'],function($view) {
        $categorias    =   \App\Categoria::all();
        $dados = [];

        foreach($categorias as $r){
            $dados[$r->id] = $r->nome;
        }
        $view->with('categorias',$dados);
    });
    View::composer(['admin.contrato.includes.formulario'],function($view) {
        $servicos    =   \App\Servico::all();
        $dados = [];

        foreach($servicos as $r){
            $dados[$r->id] = $r->nome;
        }
        $view->with('servicos',$dados);
    });
    View::composer(['admin.configuracao.includes.formulario','admin.contrato.index'],function($view) {
        $status    =   \App\Status::all();
        $dados = [];

        foreach($status as $r){
            $dados[$r->id] = $r->nome;
        }
        $view->with('status',$dados);
    });
});
