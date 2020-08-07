# WSFoto

Classe para abstração das requisições SOAP do wsfoto

    composer require uspdev/wsfoto

Dependências do PHP (testado com php7.2):

    apt-get install php php-curl

Para testá-los, adicione em seu arquivo PHP:

    <?php
    namespace Meu\Lindo\App;
    require_once __DIR__ . '/vendor/autoload.php';

    use Uspdev\Wsfoto;
    putenv('WSFOTO_USER=SEU_USERFFLCH');
    putenv('WSFOTO_PASS=SEU_SECRET');

    $foto = Wsfoto::obter('5385361');
    header('Content-Type: image/png');
    echo base64_decode($foto);

Se um projeto usa esta biblioteca mas você não quer usar por algum motivo, 
desabilite o uso com:

    putenv('WSFOTO_DISABLE=1');