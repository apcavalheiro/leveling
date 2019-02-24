<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Models\Dao\ClienteDao;
use App\Models\Dao\VendasDao;
use App\Models\Entities\Cliente;
use App\Models\Entities\Vendas;
use App\Models\Validation\ValidaCliente;
use App\Models\Validation\ValidaVendas;
use App\Utils\Redirect;
use App\Utils\Session;

class VendasController extends Controller
{
    public function index()
    {
        $vendasDao = new VendasDao();
        self::setViewParam('item', $vendasDao->listar());
        $this->render('/vendas/index');
        Session::clearSession(['errors', 'success']);
    }

    public function show($id)
    {
        $vendasDao = new VendasDao();
        self::setViewParam('item', $vendasDao->getById($id));
        Session::setSession('form', $_POST);
        $this->render('/vendas/show');
        Session::clearSession(['errors', 'success']);
    }

    public function cadastro()
    {
        $this->render('/vendas/cadastro');
        Session::clearSession(['errors', 'success', 'form']);
    }

    public function salvar()
    {
        Session::setSession('form', $_POST);

        $cliente = new Cliente();
        $vendas = new Vendas();
        $clienteDao = new ClienteDao();
        $vendasDao = new VendasDao();

        $validaVendas = new ValidaVendas();
        $validaCliente = new ValidaCliente();

        $cliente->setNome($_POST['nome']);

        $resultadoCliente = $validaCliente->validar($cliente);
        if ($resultadoCliente->getErrors()) {
            return Redirect::route(
                "/vendas/cadastro", [
                    'errors' => $resultadoCliente->getErrors(),
                ]);
        }

        $clienteDao->salvarCliente($cliente);
        $clienteId = $clienteDao->getLastId();
        if (empty($clienteId)) {
            return Redirect::route(
                "/vendas/cadastro", [
                    'errors' => ["Erro ao buscar id do cliente na base de dados!"],
                ]);
        }
        Session::clearSession(['errors', 'success', 'form']);
        $qtdVendas = count($_POST['produto']);

        for ($i = 0; $i < $qtdVendas; $i++) {
            $vendas->setProduto($_POST['produto'][$i]);
            $vendas->setPreco($_POST['preco'][$i]);
            $vendas->setId($clienteId);

            $resultadoVendas = $validaVendas->validar($vendas);
            if ($resultadoVendas->getErrors()) {
                return Redirect::route(
                    "/vendas/cadastro", [
                        'errors' => $resultadoVendas->getErrors(),
                    ]);
            }
            Session::clearSession(['errors', 'success', 'form']);
            $vendasDao->salvarVenda($vendas);
        }
        return Redirect::route(
            "/vendas",
            [
                'success' => ['A venda foi salva com sucesso!'],
            ]
        );
        Session::clearSession(['errors', 'success', 'form']);
    }
}