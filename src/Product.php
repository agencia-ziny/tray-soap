<?php

namespace Aguimaraes\TraySoap;

class Product extends Client
{
    public function get(array $params)
    {
        return $this->soapClient->__soapCall('fWSImportaProdutoPorCodReferencia', $params);
    }
}
