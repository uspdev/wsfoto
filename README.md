# WSFoto

Classe para abstração das requisições SOAP do wsfoto.

Dependências do PHP:

    apt-get install php-soap

## Instalação e teste

Instale via composer em seu projeto

    composer require uspdev/wsfoto
    
Para testá-lo, adicione em seu arquivo PHP:
```php
<?php
namespace Meu\Lindo\App;
require_once __DIR__ . '/vendor/autoload.php';

use Uspdev\Wsfoto;
putenv('WSFOTO_USER=SEU_USERFFLCH');
putenv('WSFOTO_PASS=SEU_SECRET');

$foto = Wsfoto::obter('5385361');
header('Content-Type: image/png');
echo base64_decode($foto);
```

Se um projeto usa esta biblioteca mas você não quer usar por algum motivo, 
desabilite ele com:

    putenv('WSFOTO_DISABLE=1');

Se a biblioteca retornar somente a foto fake, mesmo estando habilitada, pode ser que esteja com algum problema no soap. Use o debug para ver o retorno do erro.

    putenv('WSFOTO_DEBUG=1');

Se for desejado customizar a imagem utilizada como a foto fake, use a variável abaixo para informar o caminho para o arquivo da imagem a ser utilizada.

    putenv('WS_FOTO_FAKE_PATH=<CAMINHO PARA ARQUIVO DE IMAGEM>');


## Atualização da versão 1.x para versão 2

* É necessário instalar o php-soap com o apt. 
* Não é mais necessário o econea/nusoap
* As variáveis de ambiente e as chamadas estão idênticas. 
* Agora, se não encontrar o codpes, ao invés de retornar false retorna a imagem fake. 

## Uso com Laravel

Se esta biblioteca está em uso com o laravel coloque no .env.exemple o seguinte:

    # WSFOTO
    # https://github.com/uspdev/wsfoto
    WSFOTO_USER=
    WSFOTO_PASS=

    # Se necessário desative a funcionalidade do wsfoto (foto fake apenas).
    #WSFOTO_DISABLE=0

    # Caso a biblioteca retorne sempre a foto fake, pode estar tendo
    # algum problema na biblioteca. Ative o debug para ver os erros.
    #WSFOTO_DEBUG=0
    
    # Caminho para o arquivo de imagem desejada para ser utilizada
    # como a foto fake
    WS_FOTO_FAKE_PATH=