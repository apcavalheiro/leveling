<?php

namespace App\Models\Validation;

use App\Models\Entities\Cliente;
use App\Models\Validation\ResultadoValidacao;

class ValidaCliente
{
    public function validar(Cliente $cliente)
    {
        $insert = new ResultadoValidacao();

        if (empty($cliente->getNome())) {
            $insert->addErrors('nome', "Nome: Este campo não pode ser vazio");
        }

        return $insert;

    }
}