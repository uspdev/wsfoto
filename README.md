Classe para abstração das requisições SOAP do wsfoto

    composer require uspdev/wsfoto

Dependências do PHP (testado com php7.2):

    apt-get install php php-curl

Para testá-los, adicione em seu arquivo PHP:

    <?php
    namespace Meu\Lindo\App;
    require_once __DIR__ . '/vendor/autoload.php';

    use Uspdev\Wsfoto;
    $wsfoto = new Wsfoto('usuario','senha'); 

    $id = $wsfoto->obter('SEU NUMERO USP');
    echo $id;
