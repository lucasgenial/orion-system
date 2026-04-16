# Modelo operacional ORION

## Implementado nesta fase

- Formulário de ocorrência reorganizado em blocos com tipificação, localização normalizada, envolvidos tabulados, itens condicionados e rastro de auditoria.
- Gestão de unidades ampliada para hierarquia, cobertura territorial e georreferência.
- Gestão de usuários ampliada com perfil funcional, tipo de acesso, escopo e restrições.
- Novas áreas visuais para tipificações, auditoria, segurança e autoatendimento do usuário.
- Novos mocks JSON para tipificações, auditoria, notificações e segurança.

## Diretrizes consolidadas

- Tipificação governa comportamento do formulário.
- Envolvidos e itens precisam ser analíticos para BI e painel.
- Endereços devem ser estruturados em UF, município, bairro, logradouro, número e referência.
- Unidades devem suportar hierarquia pai-filho e escopo com descendentes.
- Segurança deve separar perfil, tipo de acesso e escopo de visibilidade.
- Auditoria deve registrar inclusão, alteração, validação, bloqueio e leitura sensível.

## Próxima etapa de backend

- Criar migrations reais para catálogos, territorialidade, unidades, usuários, escopos, auditoria, notificações e ocorrências.
- Substituir dados fixos das views por controllers e Eloquent.
- Aplicar autenticação real, policies e middleware por perfil/escopo.
- Persistir preferências e autoatendimento da conta do usuário.
