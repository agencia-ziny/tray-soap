<?php

namespace Aguimaraes\TraySoap;

class Product extends Client
{
    public function get($value = null, $field = null)
    {
        /**
         * If the provided field are equals to tray_id then we call the get by
         * id method.
         * @var [type]
         */
        if ($field === 'tray_id') {
            return $this->getById($value);
        }

        /**
         * In other case we call the method equivalent to the
         * provided field if it exists.
         */
        return $this->getByScope($value, $field);
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
            'fWSImportaProdutoPorIDRequest',
            ['id_produto' => $id]
        );
    }
}
