@extends('admin.layouts.app')

@php
    $paginaAtual = 'usuarios';
    $breadcrumbs = [
        ['titulo' => 'App Operacional'],
        ['titulo' => 'Usuários'],
        ['titulo' => 'Novo usuário'],
    ];
@endphp

@section('page-title', 'Cadastro de usuário')
@section('page-subtitle', 'Configuração de perfil, tipo de acesso, escopo de visibilidade, unidade e capacidades operacionais.')

@section('content')
    <div class="admin-stack">
        <section class="admin-card">
            <div class="admin-card-header"><div class="admin-kicker">Acesso administrativo</div><h2 class="admin-section-title">Identidade funcional</h2></div>
            <div class="admin-card-body">
                <div class="admin-grid admin-grid--3">
                    <div class="admin-field"><label class="admin-label">Nome</label><input class="admin-input" value="Helena Duarte" /></div>
                    <div class="admin-field"><label class="admin-label">E-mail</label><input class="admin-input" value="helena.duarte@orion.gov" /></div>
                    <div class="admin-field"><label class="admin-label">Matrícula</label><input class="admin-input" value="ORI-21984" /></div>
                    <div class="admin-field"><label class="admin-label">Perfil</label><select class="admin-select"><option>Administrador</option><option selected>Gestor Operacional</option><option>Supervisor</option><option>Digitador</option><option>Visualizador</option></select></div>
                    <div class="admin-field"><label class="admin-label">Tipo de acesso</label><select class="admin-select"><option selected>Web interno</option><option>Web externo controlado</option><option>API integração</option><option>Acesso temporário</option></select></div>
                    <div class="admin-field"><label class="admin-label">Status</label><select class="admin-select"><option selected>Ativo</option><option>Em ajuste</option><option>Inativo</option><option>Bloqueado</option></select></div>
                    <div class="admin-field"><label class="admin-label">Unidade principal</label><select class="admin-select"><option selected>2ª Companhia Integrada</option><option>3ª Companhia Integrada</option></select></div>
                    <div class="admin-field"><label class="admin-label">Escopo de visibilidade</label><select class="admin-select"><option selected>Unidade e descendentes</option><option>Unidade própria</option><option>Município</option><option>Global</option></select></div>
                    <div class="admin-field"><label class="admin-label">Expiração credencial</label><input type="date" class="admin-input" value="2026-12-31" /></div>
                </div>
            </div>
        </section>

        <section class="admin-card">
            <div class="admin-card-header"><div class="admin-kicker">Capacidades</div><h2 class="admin-section-title">Permissões e restrições</h2></div>
            <div class="admin-card-body">
                <div class="admin-grid admin-grid--2">
                    <div class="admin-field"><label class="admin-label">Permissões básicas</label><textarea class="admin-textarea">Ocorrências: criar, editar e validar
Produtividade: consultar e consolidar
Auditoria: leitura restrita da própria área</textarea></div>
                    <div class="admin-field"><label class="admin-label">Restrições operacionais</label><textarea class="admin-textarea">Não excluir registros validados.
Não alterar tipificação após autorização final.
Recebe notificações críticas da unidade.</textarea></div>
                </div>
            </div>
            <div class="admin-card-footer"><button class="admin-btn admin-btn-primary">Salvar usuário</button></div>
        </section>
    </div>
@endsection
