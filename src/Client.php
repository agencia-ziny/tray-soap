<?php

namespace Aguimaraes\TraySoap;

use BeSimple\SoapClient\SoapClientBuilder;

abstract class Client
{

    use ClientTrait;

    /**
     * WSDL URL
     * @var string
     */
    private $wsdl = null;

    /**
     * Id da loja na Tray
     * @var null
     */
    protected $shopId = null;

    /**
     * Login do WS da loja na Tray
     * @var null
     */
    protected $login = null;
    /**
     * Password do WS da loja na Tray
     * @var null
     */
    protected $pwd = null;

    /**
     * SoapClient instance
     * @var \BeSimple\SoapClient\SoapClient
     */
    protected $soapClient = null;

    public function __construct()
    {
        if (function_exists('env')) {
            $this->setShopId(env('TRAY_SHOPID'));
            $this->setLogin(env('TRAY_LOGIN'));
            $this->setPwd(env('TRAY_PWD'));
            $this->setWsdl(env('TRAY_WSDL'));
        }
        $builder = SoapClientBuilder::createWithDefaults()
            ->withEncoding('ISO-8859-1')
            ->withTrace()
            ->withExceptions()
            ->withSoapVersion11()
            ->withWsdl($this->wsdl);
        $this->soapClient = $builder->build();
    }
    /**
     * @param string URL
     */
    public function setWsdl($wsdl)
    {
        $this->wsdl = $wsdl;
        return $this;
    }
    /**
     * @param integer
     */
    public function setShopId($shopId)
    {
        $this->shopId = $shopId;
        return $this;
    }
    /**
     * @param string
     */
    public function setLogin($login)
    {
        $this->login = $login;
        return $this;
    }
    /**
     * @param string
     */
    public function setPwd($pwd)
    {
        $this->pwd = $pwd;
        return $this;
    }

    protected function call($function, array $params)
    {
        if (empty($this->shopId) || empty($this->login) || empty($this->pwd)) {
            throw new \Exception('Missing auth params');
        }
        $authParams = array(
            'pid_loja' => $this->shopId,
            'plogin' => $this->login,
            'psenha' => $this->pwd
        );
        return $this->soapClient->__soapCall($function, $authParams + $params);
    }
}
