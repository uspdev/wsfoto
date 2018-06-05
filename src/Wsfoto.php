<?php

namespace Uspdev;

class Wsfoto
{
    private $clienteSoap;
    public function __construct($user, $pass)
    {
        require_once __DIR__ . '/../vendor/econea/nusoap/src/nusoap.php';

        $wsdl = 'http://uspdigital.usp.br/wsfoto/wsdl/foto.wsdl';

        $this->clienteSoap = new \nusoap_client($wsdl, 'wsdl');
        $erro = $this->clienteSoap->getError();
        if ($erro) {
            print_r($erro); 
            die();
        }
        $this->clienteSoap->setHeaders(array('username' => $user,'password' => $pass));
    }

    public function obter($codpes)
    {
        $request = $this->clienteSoap->call('obterFotoCartao', 
            array('codigoPessoa' => $codpes));

        if ($this->clienteSoap->fault) {
            return $request["detail"]["WSException"];
        }
        else {
            var_dump($request); die();
        }
    }
}
