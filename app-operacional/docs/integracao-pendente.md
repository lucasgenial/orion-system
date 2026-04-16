# Pontos Pendentes para Integração Real

## Backend e navegação
- Registrar rotas web reais para dashboard, ocorrências, produtividade, unidades, usuários e configurações.
- Criar controllers de página para hidratar breadcrumbs, ações e dados dinâmicos.
- Definir política de autenticação e sessão para a tela de entrada.

## Dados e persistência
- Substituir mocks JSON por consultas reais e camadas de serviço.
- Implementar persistência para ocorrências, produtividade, unidades, usuários e parâmetros do sistema.
- Integrar paginação, filtros, busca textual e exportação com backend real.

## Segurança e acesso
- Modelar perfis e permissões do ORION.
- Proteger menus, ações por linha e páginas administrativas por perfil.
- Implementar auditoria de alterações sensíveis.

## Uploads e histórico
- Conectar a área visual de anexos a upload, armazenamento e download reais.
- Substituir o histórico mockado por timeline persistida por evento.

## Indicadores e dashboards
- Alimentar KPIs e gráficos a partir de base operacional consolidada.
- Definir origem dos dados analíticos internos e integração futura com o Painel ORION externo.

## Frontend operacional
- Ajustar build real de Vite dentro do projeto Laravel definitivo.
- Revisar componentes para extração futura em design system compartilhado, se necessário.
