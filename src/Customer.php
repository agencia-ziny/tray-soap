<?php

namespace Aguimaraes\TraySoap;

class Customer extends Client
{
    public function get()
    {
        return $this->soapClient->fWSImportaClientes();
    }
}
