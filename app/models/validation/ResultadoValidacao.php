<?php

namespace App\Models\Validation;

class ResultadoValidacao
{

    private $errors = [];

    public function addErrors($field, $message)
    {
        $this->errors[$field] = $message;
    }

    public function getErrors()
    {
        return $this->errors;
    }
}