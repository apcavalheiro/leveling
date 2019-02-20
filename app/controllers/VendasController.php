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
        self::setViewParam('listaDeVendas', $vendasDao->listar());
        $this->render('/vendas/index');
        Session::clearSession(['errors', 'success']);
    }

    public function show($id)
    {
        $vendasDao = new VendasDao();
        self::setViewParam('item', $vendasDao->listar($id));
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
        Session::clearSession(['errors', 'success', 'form']);

        $cliente = new Cliente();
        $vendas = new Vendas();
        $clienteDao = new ClienteDao();
        $vendasDao = new VendasDao();

        $validaVendas = new ValidaVendas();
        $validaCliente = new ValidaCliente();

        Session::setSession('form', $_POST);

        $cliente->setNome($_POST['nome']);
        $resultadoCliente = $validaCliente->validar($cliente);
        if ($resultadoCliente->getErrors()) {
            return Redirect::route(
                "/vendas/cadastro", [
                    'errors' => $resultadoCliente->getErrors(),
                ]);
        }

        $clienteDao->salvarCliente($cliente);
        $clienteId = $clienteDao->getIdCliente($cliente->getNome());
        if (empty($clienteId)) {
            return Redirect::route(
                "/vendas/cadastro", [
                    'errors' => "Erro ao buscar id do cliente na base de dados!",
                ]);
        }

        foreach ($_POST as $item) {
            $vendas->setProduto($item['produto']);
            $vendas->setPreco($item['preco']);
        }

        $vendas->setClienteId($clienteId);
        $resultadoVendas = $validaVendas->validar($vendas);

        if ($resultadoVendas->getErrors()) {
            return Redirect::route(
                "/vendas/cadastro", [
                    'errors' => $resultadoVendas->getErrors(),
                ]);
        }

        $vendasDao->salvarVenda($vendas);
        return Redirect::route(
            "/vendas",
            [
                'success' => ['A venda foi salva com sucesso!'],
            ]
        );
    }
}