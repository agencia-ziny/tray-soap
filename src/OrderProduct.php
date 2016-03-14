<?php

namespace Aguimaraes\TraySoap;

class OrderProduct extends Client
{
    public function get($value = null, $field = null)
    {
        /**
         * If none params were provided then we call
         * the get all method.
         */
        if (! $value && ! $field) {
            return $this->getAll();
        }

        /**
         * Call the method equivalent to the provided field
         * if it exists.
         */
        return $this->getByScope($value, $field);
    }

    public function getAll(array $params = array())
    {
        return $this->call(
            'fWSImportaItensPedidos',
            $params
        );
    }

    public function getByOrderId($id)
    {
        return $this->call(
            'fWSImportaItensPedidoPorId',
            ['id_produto' => $id]
        );
    }

    public function getByScope($value, $field)
    {
        $method = sprintf(
            'getBy%s',
            studly_case($field)
        );

        if (! method_exists($this, $method)) {
            return false;
        }

        return $this->$method($value);
    }
}
