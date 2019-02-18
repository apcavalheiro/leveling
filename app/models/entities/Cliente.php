<?php

namespace App\Models\Entities;

class Cliente
{
    private $clienteId;
    private $nome;

    public function getId()
    {
        return $this->clienteId;
    }

    public function setId($id)
    {
        $this->clienteId = $id;

        return $this;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }
}