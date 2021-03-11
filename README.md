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


## Atualização da versão 1.x para versão 2

* É necessário instalar o php-soap com o apt. 
* Não é mais necessário o econea/nusoap
* As variáveis de ambiente e as chamadas estão idênticas. 
* Agora, se não encontrar o codpes, ao invés de retornar false retorna a imagem fake. 
