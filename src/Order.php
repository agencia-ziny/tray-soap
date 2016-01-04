<?php

namespace Aguimaraes\TraySoap;

class Order extends Client
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
            'fWSImportaPedidos',
            $params
        );
    }

    public function getById($id)
    {
        return $this->call(
            'fWSImportaPedidoPorId',
            [
                'id_pedido' => $id
            ]
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
}
