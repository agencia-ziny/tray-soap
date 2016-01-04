<?php

namespace Aguimaraes\TraySoap;

class Customer extends Client
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
            'fWSImportaClientes',
            $params
        );
    }

    public function getById($id)
    {
        return $this->call(
            'fWSImportaClientePorId',
            ['id_cliente' => $id]
        );
    }
}
