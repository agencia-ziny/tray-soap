<?php

namespace Aguimaraes\TraySoap;

class Product extends Client
{
    public function get(array $params)
    {
        return $this->call('fWSImportaProdutoPorCodReferencia', $params);
    }
}
