<?php

namespace App\Models\Dao;

use App\Models\Dao\BaseDao;
use App\Models\Entities\Cliente;

class VendasDao extends BaseDao
{
    public function getById($id)
    {
        $resultado = $this->select(
            "SELECT      v.id as vendaId,
                              c.id as clienteId,
                              v.produto as produto,
                              v.preco,
                              v.total,
                              c.nome as nome
                              FROM vendas as v
                      INNER JOIN cliente as c ON v.cliente_id = c.id
                      WHERE v.id = $id"
        );

        $dataSetVendas = $resultado->fetch();

        if ($dataSetVendas) {
            $venda = new Vendas();
            $venda->setVendaId($dataSetVendas['vendaId']);
            $venda->setProduto($dataSetVendas['produto']);
            $venda->setPreco($dataSetVendas['preco']);
            $venda->getCliente()->setNome($dataSetVendas['total']);
            $venda->getCliente()->setClienteId($dataSetVendas['clienteId']);

            return $venda;
        }

        return false;
    }
    public function listar()
    {


        $resultado = $this->select('select * from cliente');

       /* $resultado = $this->select(
            'SELECT  v.id as vendaId,
                              v.produto as produto,
                              v.preco,
                              c.nome as nome
                              FROM vendas as v
                      INNER JOIN  cliente as c ON v.cliente_id = c.id'
        );
        $dataSetVendas = $resultado->fetchAll();
        if ($dataSetVendas) {

            $listavendas = [];

            foreach ($dataSetVendas as $dataSetvenda) {
                $venda = new Vendas();
                $venda->setId($dataSetvenda['vendaId']);
                $venda->setProduto($dataSetvenda['produto']);
                $venda->setPreco($dataSetvenda['preco']);
                $venda->setTotal($dataSetvenda['total']);
                $venda->getCliente()->setNome($dataSetvenda['nome']);

                $listavendas[] = $venda;
            }

            return $listavendas; 
    } */

        return $resultado;
    }

    public function salvarVenda(Vendas $venda)
    {
        try {

            $produto = $venda->getProduto();
            $preco = $venda->getPreco();
            $total = $venda->getTotal();
            $clienteId = $venda->getCliente()->getClienteId();

            return $this->insert(
                'vendas',
                ":produto,:preco,:total,:cliente_id",
                [
                    ':produto' => $nome,
                    ':preco' => $preco,
                    ':total' => $total,
                    ':cliente_id' => $cliente_id,
                ]
            );

        } catch (\Exception $e) {
            throw new \Exception("Erro na gravação de dados." . $e->getMessage(), 500);
        }
    }

    public function salvarCliente(Cliente $cliente)
    {
        try {

            $nome = $cliente->getNome();

            return $this->insert(
                'cliente',
                ":nome",
                [
                    ':nome' => $nome,
                ]
            );
        } catch (\Exception $e) {
            throw new \Exception("Erro na gravação de dados." . $e->getMessage(), 500);
        }
    }

}