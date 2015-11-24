<?php

namespace Aguimaraes\TraySoap;

use BeSimple\SoapClient\SoapClientBuilder;

class Client
{

    /**
     * WSDL URL
     * @var string
     */
    private $wsdl = 'http://www.zipautomacao.com.br/webservice/v2/ws_servidor.php?wsdl';

    /**
     * Id da loja na Tray
     * @var null
     */
    private $shopId = null;

    /**
     * Login do WS da loja na Tray
     * @var null
     */
    private $login = null;
    /**
     * Password do WS da loja na Tray
     * @var null
     */
    private $pwd = null;

    /**
     * Web Service URL
     * @var string
     */
    private $url = null;

    /**
     * SoapClient instance
     * @var BeSimple\SoapClient\SoapClient
     */
    private $soapClient = null;

    public function __construct()
    {
        $builder = SoapClientBuilder::createWithDefaults()
            ->withTrace()
            ->withExceptions()
            ->withWsdl($this->wsdl);

        $this->soapClient = $builder->build();
        return $this;
    }
}
