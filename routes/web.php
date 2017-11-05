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

use Illuminate\Http\Request;

//MVC - Model - View - Controller
//StudlyCaps
Route::get('/', function () {
    return view('welcome'); //helper
});

//site
Route::group(['prefix' => '/'], function(){
    Route::get('cliente/cadastrar', 'ClientsController@cadastrar');
    Route::get('env', function(){
        var_dump(env('NOME'));
    });
});

Route::group(['prefix' => '/admin'], function(){
    Route::get('client', 'ClientsController@listar');
    Route::get('client/form-cadastrar', 'ClientsController@formCadastrar');
    Route::post('client/cadastrar', 'ClientsController@cadastrar');
    Route::get('client/{id}/form-editar', 'ClientsController@formEditar');
    Route::post('client/{id}/editar', 'ClientsController@editar');
    Route::get('client/{id}/excluir', 'ClientsController@excluir');
    /*Route::group(['prefix' => '/cliente'], function(){
        Route::get('cadastrar', 'ClientsController@cadastrar');
    });*/

});


/*Route::get('controller/cliente/cadastrar', 'ClientsController@cadastrar');
Route::get('controller/cliente/cadastrar', 'ClientsController@cadastrar');
Route::get('controller/cliente/cadastrar', 'ClientsController@cadastrar');
Route::get('controller/cliente/cadastrar', 'ClientsController@cadastrar');*/

Route::get('/for-if/{value}', function($value){
    return view('for-if')
        ->with('value', $value)
        ->with('myArray', [
            'chave1' => 'valor1',
            'chave2' => 'valor2',
            'chave3' => 'valor3',
        ]);
});

Route::get('/blade', function(){
    $nome = 'Luiz Carlos';
    $variavel1 = 'valor';
    return view('test')
        ->with('nome', $nome)
        ->with('variavel1', $variavel1)
        ->with('test','Tenho valor');
});

Route::get('/cliente/cadastrar', function () {
    $nome = 'Luiz Carlos';
    $variavel1 = 'valor';
    /*return view('cadastrar', [
        'nome' => $nome,
        'variavel1' => $variavel1
    ]);*/
    //return view('cadastrar', compact('nome','variavel1'));
    return view('cliente.cadastrar')
        ->with('nome', $nome)
        ->with('variavel1', $variavel1);
});

/*Route::get('/cliente', function () {
    //csrf-token
    $csrfToken=csrf_token();
    $html = <<<HTML
<html>
<body>
    <h1>Cliente</h1>
    <form method="post" action="/cliente/cadastrar">
        <input type="hidden" name="_token" value="$csrfToken">
        <input type="text" name="name"/>
        <button type="submit">Enviar</button> 
    </form>
</body>
</html>
HTML;
    return $html;
});

Route::post('/cliente/cadastrar', function(Request $request){
    echo $request->get('name');
    echo $request->name;
});*/

/*Route::get('/cliente', function () {
    return "Hello World!";
});

Route::get('/admin/cliente', function () {
    return "Admin - Hello World!";
});

Route::get('/cliente-echo', function () {
    echo "Texto com echo";
});

Route::get('/produto/{name}/{id}', function ($name, $id) {
    return "Produto $name - $id";
});


Route::get('/fornecedor/{name}/{id?}', function ($name, $id = 1000) {
    return "Fornecedor $name - $id";
});*/

//CoC Convention over Configuration