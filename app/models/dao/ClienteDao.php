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

    public function lastId()
    {
        return $this->insert->lastInsertId();
    }
}