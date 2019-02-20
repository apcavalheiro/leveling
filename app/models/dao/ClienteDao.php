<?php

namespace App\Models\Dao;

use App\Models\Dao\BaseDao;
use App\Models\Entities\Cliente;

class ClienteDao extends BaseDao
{
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

    public function getIdCliente($nome)
    {
        try {
            return $resultado = $this->select(
                "select id from cliente where nome='$nome'"
            );

        } catch (\Exception $e) {
            throw new \Exception("Erro na recuperação de dados." . $e->getMessage(), 500);
        }

    }
}