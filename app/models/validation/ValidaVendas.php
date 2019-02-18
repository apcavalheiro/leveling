<?php

namespace App\Models\Validation;

use App\Models\Entities\Vendas;
use App\Models\Validation\ResultadoValidacao;

class ValidaVendas
{
    public function validar(Vendas $vendas)
    {
        $insert = new ResultadoValidacao();

        if (empty($vendas->getCliente())) {
            $insert->addErrors('cliente', "Cliente: Este campo não pode ser vazio");
        }
        if (empty($vendas->getProduto())) {
            $insert->addErrors('produto', "Produto: Este campo não pode ser vazio");
        }
        if (empty($vendas->getPreco())) {
            $insert->addErrors('preco', "Preço: Este campo não pode ser vazio");
        }

        return $insert;
    }
}