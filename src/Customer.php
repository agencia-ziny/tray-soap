<?php

namespace Aguimaraes\TraySoap;

class Customer extends Client
{
    public function get()
    {
        return $this->soapClient->__soapCall(
            'fWSImportaClientes',
            array(
                'pid_loja' => $this->shopId,
                'plogin' => $this->login,
                'psenha' => $this->pwd
            )
        );
    }
}
