<?php

namespace Aguimaraes\TraySoap;

class Order extends Client
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
            'fWSImportaPedidos',
            $params
        );
    }

    public function getById($id)
    {
        return $this->call(
            'fWSImportaPedidoPorId',
            ['id_cliente' => $id]
        );
    }

    public function sync($id)
    {
        return $this->call(
            'fWSAtualizaListaToDo',
            [
                'entidade' => 'pedidos',
                'id' => $id
            ]
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
