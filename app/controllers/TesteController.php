<?php

namespace App\Controllers;

use App\Controllers\Controller;

class TesteController extends Controller
{
    public function index()
    {
        $this->render('vendas/teste');
    }

    public function cadastro()
    {
        print_r($_POST);
    }
}