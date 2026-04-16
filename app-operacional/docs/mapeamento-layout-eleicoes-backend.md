# Mapeamento de Layout Reaproveitado

## Base estrutural
- Layout principal com sidebar fixa, topbar sticky, flash global, page header e área central de conteúdo.
- Ponto de referência: eleicoes-backend/resources/views/admin/layouts/app.blade.php.

## Blocos reutilizáveis
- Sidebar com agrupamento por seção, item ativo e submenus em acordeão.
- Topbar com contexto da página, filtros contextuais, notificações, tema e perfil.
- Page header com breadcrumb curto, título, subtítulo e ações.
- Flash messages para sucesso e erro.
- Cards de conteúdo com cabeçalho, corpo e rodapé.
- Tabelas administrativas com ações por linha e integração opcional com DataTables.
- Formulários em blocos fluidos, labels compactas, grids responsivos e campos de largura total para conteúdo extenso.
- Componentes analíticos com classes dashboard-* para KPIs, listas resumidas, barras e gráficos mockados.

## Assets de referência
- CSS principal: eleicoes-backend/resources/css/admin.css.
- JS principal de referência: eleicoes-backend/resources/js/admin-layout.js.
- No ORION atual, a camada interativa foi consolidada em TypeScript no arquivo resources/js/admin-layout.ts.

## Estratégia de adaptação para ORION
- Reaproveitar estrutura, densidade visual e gramática administrativa.
- Trocar integralmente domínio, navegação, nomes e textos eleitorais.
- Suavizar a paleta para um tom mais institucional e operacional.
- Manter suporte técnico a sidebar responsiva, dropdowns e tema.

## Limites de reaproveitamento
- Não reutilizar nomes, labels, conteúdo ou metáforas do sistema eleitoral.
- Não manter a identidade cromática principal do projeto de eleições.
- Não herdar permissões, rotas ou menus do domínio eleitoral.
