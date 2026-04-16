# Estrutura Sugerida do Template ORION

## Pastas principais
- resources/views/admin/layouts
- resources/views/admin/partials
- resources/views/admin/componentes
- resources/views/admin/dashboard
- resources/views/admin/ocorrencias
- resources/views/admin/produtividade
- resources/views/admin/unidades
- resources/views/admin/usuarios
- resources/views/admin/configuracoes
- resources/views/auth
- resources/css
- resources/js
- public/mocks

## Partials obrigatórias
- menu.blade.php
- navbar.blade.php
- page-header.blade.php
- flash.blade.php

## Componentes reutilizáveis
- card-kpi.blade.php
- card-resumo.blade.php
- status-badge.blade.php
- filtro-superior.blade.php
- tabela-acoes.blade.php
- timeline-item.blade.php
- anexo-item.blade.php
- modal-confirmacao.blade.php

## Frontend
- resources/js/app.ts
- resources/js/bootstrap.ts
- resources/js/admin-layout.ts

## Páginas principais
- dashboard/index.blade.php
- dashboard/interno.blade.php
- ocorrencias/index.blade.php
- ocorrencias/form.blade.php
- ocorrencias/show.blade.php
- produtividade/index.blade.php
- produtividade/form.blade.php
- unidades/index.blade.php
- unidades/form.blade.php
- usuarios/index.blade.php
- usuarios/form.blade.php
- configuracoes/index.blade.php
- auth/entrar.blade.php

## Dados mockados
- dashboard.json
- ocorrencias.json
- produtividade.json
- unidades.json
- usuarios.json
- configuracoes.json

## Observação
Esta estrutura implementa apenas a camada visual e os artefatos de prototipação. Integrações de backend, rotas reais, autenticação, autorização e persistência continuam pendentes.
