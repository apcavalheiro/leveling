<?php

namespace App\Models\Validation;

use App\Models\Validation\ResultadoValidacao;

class ValidaCliente
{
    public function validar()
    {
        $insert = new ResultadoValidacao();

        if (empty($vendas->getCliente())) {
            $insert->addErrors('cliente', "Cliente: Este campo não pode ser vazio");
        }
    }

}