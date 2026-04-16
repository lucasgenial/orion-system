@extends('admin.layouts.app')

@php
    $paginaAtual = 'tipificacoes';
    $breadcrumbs = [
        ['titulo' => 'App Operacional'],
        ['titulo' => 'Tipificações'],
    ];
@endphp

@section('page-title', 'Gestão de tipificações')
@section('page-subtitle', 'Cadastro das regras que comandam o comportamento do formulário, as exigências analíticas e os blocos condicionais do registro operacional.')

@section('page-actions')
    <a href="{{ route('orion.configuracoes.index') }}" class="admin-btn admin-btn-secondary"><i class="ri-settings-3-line"></i> Ajustes gerais</a>
    <a href="#" class="admin-btn admin-btn-primary"><i class="ri-add-line"></i> Nova tipificação</a>
@endsection

@section('content')
    <section class="admin-card">
        <div class="admin-card-header"><div class="admin-card-header__content"><div class="admin-kicker">Regras de formulário</div><h2 class="admin-section-title">Comportamentos parametrizados</h2></div></div>
        <div class="admin-card-body">
            <div class="admin-summary-grid admin-summary-grid--2">
                <div class="admin-metric-card"><strong>8</strong><span>Tipificações operacionais</span></div>
                <div class="admin-metric-card"><strong>5</strong><span>Com exigência de envolvidos</span></div>
                <div class="admin-metric-card"><strong>3</strong><span>Com itens apreendidos</span></div>
                <div class="admin-metric-card"><strong>4</strong><span>Com classificação secundária obrigatória</span></div>
            </div>
        </div>
    </section>

    <section class="admin-card" style="margin-top: 22px;">
        <div class="admin-card-header"><div class="admin-card-header__content"><div class="admin-kicker">Tabela analítica</div><h2 class="admin-section-title">Matriz de comportamento por tipificação</h2></div></div>
        <div class="admin-table-shell">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>Tipificação</th>
                        <th>Classificação primária</th>
                        <th>Envolvidos</th>
                        <th>Itens subtraídos</th>
                        <th>Itens apreendidos</th>
                        <th>Auditoria reforçada</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <tr><td><strong>Roubo a transeunte</strong></td><td>Patrimônio</td><td>Obrigatório</td><td>Obrigatório</td><td>Não</td><td>Sim</td><td>@include('admin.componentes.tabela-acoes', ['contexto' => 'tipificacoes'])</td></tr>
                    <tr><td><strong>Violência doméstica</strong></td><td>Pessoa</td><td>Obrigatório</td><td>Não</td><td>Condicional</td><td>Sim</td><td>@include('admin.componentes.tabela-acoes', ['contexto' => 'tipificacoes'])</td></tr>
                    <tr><td><strong>Apreensão de arma</strong></td><td>Preventiva</td><td>Obrigatório</td><td>Não</td><td>Obrigatório</td><td>Sim</td><td>@include('admin.componentes.tabela-acoes', ['contexto' => 'tipificacoes'])</td></tr>
                    <tr><td><strong>Apoio comunitário</strong></td><td>Administrativa</td><td>Opcional</td><td>Não</td><td>Não</td><td>Não</td><td>@include('admin.componentes.tabela-acoes', ['contexto' => 'tipificacoes'])</td></tr>
                </tbody>
            </table>
        </div>
    </section>
@endsection
