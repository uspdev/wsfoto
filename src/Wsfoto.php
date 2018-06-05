<?php

namespace Uspdev;

class Wsfoto
{
    private static $instance;
    private function __construct(){}
    private function __clone(){}

    public static function getInstance(){
    {
        require_once __DIR__ . '/../vendor/econea/nusoap/src/nusoap.php';
        $user = getenv('WSFOTO_USER');
        $pass = getenv('WSFOTO_PASS');
        
        if(!self::$instance) {
            try {
                self::$instance = new \nusoap_client('http://uspdigital.usp.br/wsfoto/wsdl/foto.wsdl', 'wsdl');
            } catch(Exception $e) {
                var_dump($e);
            }
               
            self::$instance->setHeaders(array('username' => $user,'password' => $pass));
        }
        return self::$instance;
    }

    public static function obter($codpes)
    {
        try {
            $request = self::getInstance()->clienteSoap->call('obterFotoCartao',['codigoPessoa' => $codpes]);
        } catch(Exception $e) {
            var_dump($e);
        }
        return $request['fotoCartao'];
    }
}
