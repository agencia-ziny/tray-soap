<?php

namespace Aguimaraes\TraySoap;

class Customer extends Client
{
    public function get(array $params)
    {
        return $this->call('fWSImportaClientes', $params);
    }
}
