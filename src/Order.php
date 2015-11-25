<?php

namespace Aguimaraes\TraySoap;

class Order extends Client
{
    public function get(array $params)
    {
        return $this->soapClient->__soapCall('fWSImportaPedidos', $params);
    }
}
