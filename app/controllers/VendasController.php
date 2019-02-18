<?php
namespace App\controllers;

namespace App\controllers;

namespace App\Controllers;

use App\Controllers\Controller;
use App\Models\Dao\VendasDao;
use App\Models\Validation\ValidaVendas;
use App\Utils\Session;

class VendasController extends Controller
{
    public function index()
    {
        $vendasDao = new VendasDao();
        self::setViewParam('listaDeProdutos', $vendasDao->listar());
        $this->render('/vendas/index');
        Session::clearSession(['errors', 'success']);
    }

    public function show($id)
    {
        $vendasDao = new VendasDao();
        self::setViewParam('item', $vendasDao->listar($id));
        $this->render('/vendas/index');
        Session::clearSession(['errors', 'success']);
    }

    public function cadastro()
    {
        $this->render('/vendas/cadastro');
        Session::clearSession(['errors', 'success', 'form']);
    }

    public function salvarVendas()
    {
        $vendas = new Vendas();
        $vendasDao = new VendasDao();
        $vendas->set($_POST['cliente']);
        $vendas->set($_POST['produto']);
        $vendas->set($_POST['preco']);
        $vendas->set($_POST['total']);

        Session::setSession('form', $_POST);
        $valida = new ValidaVendas();
        $resultado = $valida->validar($vendas);
        if ($resultado->getErrors()) {
            return Redirect::route("/marca/cadastro", [
                'errors' => $result->getErrors(),
            ]);
        }
        Session::clearSession('errors');

        $vendasDao->toSave($vendas);
        return Redirect::route(
            "/vendas",
            [
                'success' => ['Venda foi salva!'],
            ]
        );
        Session::clearSession(['errors', 'success', 'form']);
    }
    public function salvarCliente()
    {

    }
}