<?php
namespace App\models\dao;

namespace App\Models\Dao;

use App\Models\Dao\BaseDao;
use App\Models\Entities\Vendas;

class VendasDao extends BaseDao
{

    public function getById($valor)
    {
        $id = $valor[0];
        $produtos = $this->select(
            "select produto, preco, vendas.id, cliente.id from vendas inner join cliente on cliente.id = vendas.cliente_id where cliente_id = $id"
        );
        $cliente = $this->select(
            "select distinct nome,id from cliente where id = $id"
        );
        $soma = $this->select(
            "select sum(preco) as total from vendas where vendas.cliente_id = $id"
        );

        $total = $soma->fetch();
        $vendas = $produtos->fetchAll();
        $nome = $cliente->fetch();
        $itens['total'] = $total;
        $itens['vendas'] = $vendas;
        $itens['nome'] = $nome;
        return $itens;
    }

    public function listar()
    {
        $cliente = $this->select(
            "select distinct nome from cliente"
        );
        $vendas = $this->select(
            "select c.nome, c.id, preco from cliente as c inner join vendas as v on v.cliente_id = c.id"
        );
        $dadosVenda = $vendas->fetchAll();
        $dataCliente = $cliente->fetchAll();
        $dados['nome'] = $dataCliente;
        $dados['vendas'] = $dadosVenda;
        return $dados;
    }

    public function salvarVenda(Vendas $venda)
    {
        try {

            $produto = $venda->getProduto();
            $preco = floatval($venda->getPreco());
            $clienteId = $venda->getId();

            return $this->insert(
                'vendas',
                ":produto,:preco,:cliente_id",
                [
                    ':produto' => $produto,
                    ':preco' => $preco,
                    ':cliente_id' => $clienteId,
                ]
            );

        } catch (\Exception $e) {
            throw new \Exception("Erro na gravação de dados." . $e->getMessage(), 500);
        }
    }
}