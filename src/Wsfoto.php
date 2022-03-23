<?php

namespace Uspdev;

class Wsfoto
{
    private static $instance;
    protected static $fake = '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';

    private function __construct()
    {}
    private function __clone()
    {}

    protected static function getInstance()
    {
        $user = getenv('WSFOTO_USER');
        $pass = getenv('WSFOTO_PASS');

        if (!SELF::$instance) {
            try {
                SELF::$instance = new \SoapClient('http://uspdigital.usp.br/wsfoto/wsdl/foto.wsdl', ['trace' => 1]);
            } catch (\Exception $e) {
                if (getenv('WSFOTO_DEBUG') == 1) {
                    var_dump($e);
                    die('Erro ao obter instância no WSFOTO');
                } else {
                    return false;
                }
            }
            $headerVar = new \SoapVar('<username>' . $user . '</username><password>' . $pass . '</password>', XSD_ANYXML);
            $header = new \SoapHeader('http://tempuri.org/', 'RequestParams', $headerVar);
            SELF::$instance->__setSoapHeaders($header);
        }
        return SELF::$instance;
    }

    /**
     * Obtém a foto do cartão USP
     *
     * @param Int $codpes
     * @return String $img codificado em base64
     *
     * @author Modificado por Masaki K. Neto em 11/3/2021
     * @author Modificado por Masakik em 23/3/2022 para mostrar foto fake em caso de problemas
     */
    public static function obter(Int $codpes)
    {
        if (getenv('WSFOTO_DISABLE')) {
            // vamos retornar uma foto fake
            return SELF::$fake;
        }
        try {
            if ($instance = SELF::getInstance()) {
                $foto = $instance->obterFotoCartao(['codigoPessoa' => $codpes]);
            }
        } catch (\Exception $e) {
            if (getenv('WSFOTO_DEBUG') == 1) {
                var_dump($e);
                die('Erro ao obter foto');
            } else {
                return SELF::$fake;
            }
        }

        if (isset($foto->fotoCartao)) {
            return \base64_encode($foto->fotoCartao);
        } else {
            return SELF::$fake;
        }
    }
}
