<?php

namespace Aguimaraes\TraySoap;

class Product extends Client
{
    public function get($id = null)
    {
        return is_numeric($id) ?
            $this->getById($id) :
            $this->getAll();
    }

    public function getAll(array $params = array())
    {
        return $this->call(
            'fWSImportaProdutoPorCodReferencia',
            $params
        );
    }

    public function getById($id)
    {
        return $this->call(
            'fWSImportaProdutoPorCodReferencia',
            ['cod_prod' => $id]
        );
    }
}
