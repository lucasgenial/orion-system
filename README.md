# ORION System

Sistema administrativo ORION para operacoes, registro e inteligencia operacional em rede.

## Estrutura do repositorio

- `app-operacional/`: aplicacao Laravel principal do projeto.
- `app-painel/`: espaco reservado para futuras expansoes do ecossistema ORION.

## Stack atual

- Laravel 12
- Blade
- Vite
- TypeScript
- DataTables.js com tema visual adaptado ao padrao ORION

## Modulos visuais prototipados

- Dashboard inicial
- Dashboard interno
- Ocorrencias
- Produtividade
- Unidades e companhias
- Tipificacoes
- Usuarios
- Auditoria
- Seguranca e acesso
- Configuracoes
- Minha conta

## Como executar a aplicacao

Entre em `app-operacional` e execute:

```bash
composer install
npm install
php artisan key:generate
php artisan serve
npm run dev
```

Para build de producao do frontend:

```bash
npm run build
```

Para validar a tipagem do frontend:

```bash
npm run typecheck
```

## Observacoes

- Este repositorio versiona apenas o projeto ORION em desenvolvimento.
- Os diretorios `eleicoes-backend/` e `eleicoes-urna/` foram usados apenas como referencia de modelagem visual e nao fazem parte do versionamento.
- O frontend do painel usa TypeScript na camada interativa principal.

## Status

O projeto esta no primeiro commit estrutural, com foco em layout administrativo, identidade visual, navegacao e prototipacao de regras de negocio.