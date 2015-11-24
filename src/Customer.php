<?php

namespace Aguimaraes\TraySoap;

class Customer extends Client
{
    public function get(array $params)
    {
        return $this->soapClient->__soapCall(
            'fWSImportaClientes',
            array(
                'pid_loja' => $this->shopId,
                'plogin' => $this->login,
                'psenha' => $this->pwd
            ) + $params
        );
    }

    public function getFromToday()
    {
        $params = array(
            'data_inicial' => date('Y-m-d'),
            'data_final' => date('Y-m-d'),
            'hora_inicial' => '0000',
            'hora_final' => '2359'
        );
        return $this->get($params);
    }
}
