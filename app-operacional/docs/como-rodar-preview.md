# Como rodar o ORION localmente

## Opção principal: Laravel real

### Pré-requisitos
- PHP 8.2 ou superior
- Node.js e npm

### Primeira execução
Na pasta app-operacional, execute:

php artisan key:generate --force
npm install
npm run build

### Subir a aplicação
Na pasta app-operacional, execute:

php artisan serve --host=127.0.0.1 --port=8001

### URL principal
- http://127.0.0.1:8001/orion/dashboard

### Outras rotas já disponíveis
- http://127.0.0.1:8001/entrar
- http://127.0.0.1:8001/orion/dashboard/interno
- http://127.0.0.1:8001/orion/ocorrencias
- http://127.0.0.1:8001/orion/ocorrencias/nova
- http://127.0.0.1:8001/orion/ocorrencias/detalhe
- http://127.0.0.1:8001/orion/produtividade
- http://127.0.0.1:8001/orion/produtividade/nova
- http://127.0.0.1:8001/orion/unidades
- http://127.0.0.1:8001/orion/unidades/nova
- http://127.0.0.1:8001/orion/usuarios
- http://127.0.0.1:8001/orion/usuarios/novo
- http://127.0.0.1:8001/orion/configuracoes

## Opção secundária: preview em PHP puro

Se quiser abrir apenas o preview sem passar pelo Laravel, rode:

php -S 127.0.0.1:8000 -t . preview/router.php

URL principal do preview:
- http://127.0.0.1:8000/?pagina=dashboard

## Observação
O projeto agora já está bootstrapado como Laravel real. O preview em PHP puro continua disponível apenas como alternativa leve de visualização.
