<?php

namespace App\Controller;

use Controller;
use App\Model\Tabela;

class Admin extends Controller
{

    public function indexAction()
    {
        $tabela = new Tabela();
        $tabela->select();
        $this->_setView();
    }

}
