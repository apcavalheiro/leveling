<?php

namespace App\Models\Entities;

use App\Models\Entities\Cliente;

class Vendas
{
    private $id;
    private $produto;
    private $preco;
    private $cliente;
    private $total;

    public function __construct()
    {
        $this->cliente = new Cliente();
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getProduto()
    {
        return $this->produto;
    }

    public function setProduto($produto)
    {
        $this->produto = $produto;

        return $this;
    }

    public function getPreco()
    {
        return $this->preco;
    }

    public function setPreco($preco)
    {
        $this->preco = $preco;

        return $this;
    }

    public function getTotal()
    {
        return $this->total;
    }

    public function setTotal($total)
    {
        $this->total = $total;

        return $this;
    }

    public function getCliente()
    {
        return $this->cliente;
    }
}