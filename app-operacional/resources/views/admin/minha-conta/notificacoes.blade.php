@extends('admin.layouts.app')

@php
    $breadcrumbs = [
        ['titulo' => 'App Operacional'],
        ['titulo' => 'Minha conta'],
        ['titulo' => 'Notificações'],
    ];
@endphp

@section('page-title', 'Minhas notificações')
@section('page-subtitle', 'Alertas operacionais, avisos de validação, mudanças de acesso e lembretes do sistema priorizados pelo escopo do usuário.')

@section('content')
    <div class="dashboard-grid dashboard-grid--3">
        <section class="admin-card">
            <div class="admin-card-header"><div class="admin-card-header__content"><div class="admin-kicker">Pendentes</div><h2 class="admin-section-title">Ações imediatas</h2></div></div>
            <div class="admin-card-body">
                <div class="admin-summary-grid admin-summary-grid--1">
                    <div class="admin-metric-card"><strong>5</strong><span>Notificações não lidas</span></div>
                </div>
            </div>
        </section>
        <section class="admin-card">
            <div class="admin-card-header"><div class="admin-card-header__content"><div class="admin-kicker">Validação</div><h2 class="admin-section-title">Registros aguardando revisão</h2></div></div>
            <div class="admin-card-body">
                <div class="admin-summary-grid admin-summary-grid--1">
                    <div class="admin-metric-card"><strong>2</strong><span>Ocorrências da 2ª CIA</span></div>
                </div>
            </div>
        </section>
        <section class="admin-card">
            <div class="admin-card-header"><div class="admin-card-header__content"><div class="admin-kicker">Segurança</div><h2 class="admin-section-title">Eventos de conta</h2></div></div>
            <div class="admin-card-body">
                <div class="admin-summary-grid admin-summary-grid--1">
                    <div class="admin-metric-card"><strong>1</strong><span>Alerta de senha expira em 14 dias</span></div>
                </div>
            </div>
        </section>
    </div>

    <section class="admin-card" style="margin-top: 22px;">
        <div class="admin-card-header"><div class="admin-card-header__content"><div class="admin-kicker">Fila recente</div><h2 class="admin-section-title">Notificações do usuário</h2></div></div>
        <div class="admin-table-shell">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>Quando</th>
                        <th>Tipo</th>
                        <th>Origem</th>
                        <th>Mensagem</th>
                        <th>Status</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <tr><td>16/04/2026 18:30</td><td>Validação</td><td>Ocorrências</td><td>OR-2026-00492 aguarda sua conferência final.</td><td>@include('admin.componentes.status-badge', ['tipo' => 'warning', 'texto' => 'Não lida'])</td><td>@include('admin.componentes.tabela-acoes', ['contexto' => 'notificacoes'])</td></tr>
                    <tr><td>16/04/2026 18:05</td><td>Segurança</td><td>Conta</td><td>Sua senha expira em 14 dias.</td><td>@include('admin.componentes.status-badge', ['tipo' => 'info', 'texto' => 'Pendente'])</td><td>@include('admin.componentes.tabela-acoes', ['contexto' => 'notificacoes'])</td></tr>
                    <tr><td>16/04/2026 17:22</td><td>Escopo</td><td>Usuários</td><td>Seu escopo foi atualizado para unidade e descendentes.</td><td>@include('admin.componentes.status-badge', ['tipo' => 'success', 'texto' => 'Lida'])</td><td>@include('admin.componentes.tabela-acoes', ['contexto' => 'notificacoes'])</td></tr>
                </tbody>
            </table>
        </div>
    </section>
@endsection
