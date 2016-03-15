<?php

namespace Aguimaraes\TraySoap;

class Customer extends Client
{
    public function save(array $item)
    {
        $save = $this->call(
            'fWSCadastraClienteAvancado',
            $item
        );

        return ($save['status'] == 'ok') ? $this->saveAddress($item) : $save;
    }

    public function saveAddress(array $arr)
    {
        $save = [
            'id_cliente' => $arr['id_cliente']
        ];
        $save['status'] = $this->call(
            'fWSCadastraContatosCliente',
            [
                'id_cliente' => $arr['id_cliente'],
                'telefone' => $arr['telefone'],
                'telefone_adicional' => $arr['telefone_adicional']
            ]
        );
        return $save;
    }

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

    public function getByEmail($email)
    {
        return $this->call(
            'fWSImportaClientePorEmail',
            ['email' => $email]
        );
    }

    public function getByCnpj($cnpj)
    {
        return $this->call(
            'fWSImportaClientePorCNPJ',
            ['cnpj' => $cnpj]
        );
    }

    public function getByCpf($cpf)
    {
        return $this->call(
            'fWSImportaClientePorCPF',
            ['cpf' => $cpf]
        );
    }

    public function sync($id)
    {
        return $this->call(
            'fWSAtualizaListaToDo',
            [
                'entidade' => 'clientes',
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
