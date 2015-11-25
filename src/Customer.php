<?php

namespace Aguimaraes\TraySoap;

class Customer extends Client
{
    use ClientTrait;
    
    public function get(array $params)
    {
        return $this->soapClient->__soapCall('fWSImportaClientes', $params);
    }
}
