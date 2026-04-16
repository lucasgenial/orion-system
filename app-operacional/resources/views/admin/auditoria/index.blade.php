@extends('admin.layouts.app')

@php
    $paginaAtual = 'auditoria';
    $breadcrumbs = [
        ['titulo' => 'App Operacional'],
        ['titulo' => 'Auditoria'],
    ];
@endphp

@section('page-title', 'Auditoria operacional')
@section('page-subtitle', 'Consulta de eventos críticos com rastreio de inclusão, alteração, validação, bloqueio de acesso e visualização sensível por módulo.')

@section('content')
    <section class="admin-card">
        <div class="admin-card-header"><div class="admin-card-header__content"><div class="admin-kicker">Filtros</div><h2 class="admin-section-title">Pesquisa de trilha</h2></div></div>
        <div class="admin-card-body">
            <div class="admin-grid admin-grid--3">
                <div class="admin-field"><label class="admin-label">Módulo</label><select class="admin-select"><option>Todos</option><option selected>Ocorrências</option><option>Usuários</option><option>Segurança</option></select></div>
                <div class="admin-field"><label class="admin-label">Ação</label><select class="admin-select"><option>Todas</option><option selected>Alteração</option><option>Inclusão</option><option>Validação</option></select></div>
                <div class="admin-field"><label class="admin-label">Usuário</label><input class="admin-input" value="Helena Duarte" /></div>
                <div class="admin-field"><label class="admin-label">Data inicial</label><input type="date" class="admin-input" value="2026-04-15" /></div>
                <div class="admin-field"><label class="admin-label">Data final</label><input type="date" class="admin-input" value="2026-04-16" /></div>
                <div class="admin-field"><label class="admin-label">Escopo</label><select class="admin-select"><option>Todos</option><option selected>2ª CIA e descendentes</option></select></div>
            </div>
        </div>
    </section>

    <div class="dashboard-grid dashboard-grid--2" style="margin-top: 22px;">
        <section class="admin-card">
            <div class="admin-card-header"><div class="admin-card-header__content"><div class="admin-kicker">Indicadores</div><h2 class="admin-section-title">Resumo recente</h2></div></div>
            <div class="admin-card-body">
                <div class="admin-summary-grid admin-summary-grid--2">
                    <div class="admin-metric-card"><strong>126</strong><span>Eventos auditados hoje</span></div>
                    <div class="admin-metric-card"><strong>14</strong><span>Alterações críticas</span></div>
                    <div class="admin-metric-card"><strong>3</strong><span>Bloqueios de acesso</span></div>
                    <div class="admin-metric-card"><strong>9</strong><span>Validações finais</span></div>
                </div>
            </div>
        </section>

        <section class="admin-card">
            <div class="admin-card-header"><div class="admin-card-header__content"><div class="admin-kicker">Destaques</div><h2 class="admin-section-title">Ocorrências sensíveis</h2></div></div>
            <div class="admin-card-body">
                <div class="timeline-list">
                    @include('admin.componentes.card-resumo', ['titulo' => 'Alteração de tipificação', 'descricao' => 'OR-2026-00481 teve tipificação alterada por gestora com justificativa registrada.', 'meta' => 'Alta criticidade'])
                    @include('admin.componentes.card-resumo', ['titulo' => 'Mudança de escopo', 'descricao' => 'Usuário Joana Farias saiu de unidade própria para registros da unidade.', 'meta' => 'Segurança'])
                    @include('admin.componentes.card-resumo', ['titulo' => 'Bloqueio temporário', 'descricao' => 'Tentativas inválidas no perfil API integração de parceiro externo.', 'meta' => 'Acesso'])
                </div>
            </div>
        </section>
    </div>

    <section class="admin-card" style="margin-top: 22px;">
        <div class="admin-card-header"><div class="admin-card-header__content"><div class="admin-kicker">Eventos</div><h2 class="admin-section-title">Linha do tempo consolidada</h2></div></div>
        <div class="admin-table-shell">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>Quando</th>
                        <th>Usuário</th>
                        <th>Módulo</th>
                        <th>Entidade</th>
                        <th>Ação</th>
                        <th>Resumo</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <tr><td>16/04/2026 18:26</td><td>Helena Duarte</td><td>Ocorrências</td><td>OR-2026-00481</td><td>Alteração</td><td>Classificação secundária atualizada para Com ameaça.</td><td>@include('admin.componentes.tabela-acoes', ['contexto' => 'auditoria'])</td></tr>
                    <tr><td>16/04/2026 18:10</td><td>Joana Farias</td><td>Ocorrências</td><td>OR-2026-00492</td><td>Inclusão</td><td>Registro inicial com 4 envolvidos e 2 bens subtraídos.</td><td>@include('admin.componentes.tabela-acoes', ['contexto' => 'auditoria'])</td></tr>
                    <tr><td>16/04/2026 17:59</td><td>Sistema</td><td>Segurança</td><td>USR-0021</td><td>Bloqueio</td><td>Perfil externo controlado bloqueado após 5 tentativas.</td><td>@include('admin.componentes.tabela-acoes', ['contexto' => 'auditoria'])</td></tr>
                    <tr><td>16/04/2026 17:21</td><td>Marcelo Teles</td><td>Usuários</td><td>USR-0018</td><td>Alteração</td><td>Escopo modificado para unidade própria.</td><td>@include('admin.componentes.tabela-acoes', ['contexto' => 'auditoria'])</td></tr>
                </tbody>
            </table>
        </div>
    </section>
@endsection
