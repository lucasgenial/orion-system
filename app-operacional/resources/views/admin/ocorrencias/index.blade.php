@extends('admin.layouts.app')

@php
    $paginaAtual = 'ocorrencias';
    $breadcrumbs = [
        ['titulo' => 'App Operacional'],
        ['titulo' => 'Ocorrências'],
    ];
@endphp

@section('page-title', 'Listagem de ocorrências')
@section('page-subtitle', 'Consulta administrativa com foco em tipificação, localização estruturada, envolvidos, itens e trilha de validação.')

@section('page-actions')
    <a href="{{ route('orion.ocorrencias.create') }}" class="admin-btn admin-btn-primary"><i class="ri-add-line"></i> Nova ocorrência</a>
@endsection

@section('content')
    <section class="admin-card">
        <div class="admin-card-header">
            <div class="admin-card-header__content">
                <div class="admin-kicker">Filtros superiores</div>
                <h2 class="admin-section-title">Busca operacional</h2>
            </div>
        </div>
        <div class="admin-card-body">
            <div class="admin-form-grid admin-form-grid--2">
                <div class="admin-field"><label class="admin-label">Busca textual</label><input class="admin-input" value="Centro" /></div>
                <div class="admin-field"><label class="admin-label">Status</label><select class="admin-select"><option>Todos</option><option selected>Em atendimento</option><option>Concluída</option></select></div>
                <div class="admin-field"><label class="admin-label">Tipificação</label><select class="admin-select"><option>Todas</option><option selected>Roubo a transeunte</option><option>Violência doméstica</option><option>Apreensão de arma</option></select></div>
                <div class="admin-field"><label class="admin-label">Classificação analítica</label><select class="admin-select"><option>Todas</option><option selected>Patrimônio</option><option>Pessoa</option><option>Preventiva</option></select></div>
                <div class="admin-field"><label class="admin-label">Período inicial</label><input type="date" class="admin-input" value="2026-04-16" /></div>
                <div class="admin-field"><label class="admin-label">Companhia</label><select class="admin-select"><option selected>2ª Companhia Integrada</option><option>3ª Companhia Integrada</option></select></div>
                <div class="admin-field"><label class="admin-label">Município</label><input class="admin-input" value="Orionópolis" /></div>
                <div class="admin-field"><label class="admin-label">Bairro</label><input class="admin-input" value="Centro" /></div>
            </div>
            <div class="orion-page-actions" style="margin-top: 18px;">
                <button class="admin-btn admin-btn-primary">Aplicar filtros</button>
                <button class="admin-btn admin-btn-secondary">Limpar</button>
            </div>
        </div>
    </section>

    <section class="admin-card">
        <div class="admin-card-header">
            <div class="admin-card-header__content">
                <div class="admin-kicker">Tabela geral</div>
                <h2 class="admin-section-title">Ocorrências cadastradas</h2>
            </div>
        </div>
        <div class="admin-table-shell">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>Protocolo</th>
                        <th>Tipificação</th>
                        <th>Local estruturado</th>
                        <th>Envolvidos / itens</th>
                        <th>Unidade</th>
                        <th>Status</th>
                        <th>Prioridade</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>OR-2026-00481</strong><div class="admin-stat-note">16/04/2026 · 17:41</div></td>
                        <td><strong>Roubo a transeunte</strong><div class="admin-stat-note">Patrimônio · Consumado · Com ameaça</div></td>
                        <td>PE · Orionópolis · Centro<div class="admin-stat-note">Rua 7 de Setembro, 180 · Rodoviária central</div></td>
                        <td>4 envolvidos<div class="admin-stat-note">2 bens subtraídos · 0 apreensões</div></td>
                        <td>2ª CIA · Alfa 02</td>
                        <td>@include('admin.componentes.status-badge', ['tipo' => 'warning', 'texto' => 'Em atendimento'])</td>
                        <td>@include('admin.componentes.status-badge', ['tipo' => 'danger', 'texto' => 'Alta'])</td>
                        <td>@include('admin.componentes.tabela-acoes', ['contexto' => 'ocorrencias'])</td>
                    </tr>
                    <tr>
                        <td><strong>OR-2026-00479</strong><div class="admin-stat-note">16/04/2026 · 16:58</div></td>
                        <td><strong>Violência doméstica</strong><div class="admin-stat-note">Pessoa · Medida protetiva · Flagrante não confirmado</div></td>
                        <td>PE · Orionópolis · Nova Esperança<div class="admin-stat-note">Travessa 12, 45 · Próx. escola municipal</div></td>
                        <td>3 envolvidos<div class="admin-stat-note">0 bens subtraídos · 0 apreensões</div></td>
                        <td>2ª CIA · Maria da Penha 01</td>
                        <td>@include('admin.componentes.status-badge', ['tipo' => 'info', 'texto' => 'Em análise'])</td>
                        <td>@include('admin.componentes.status-badge', ['tipo' => 'warning', 'texto' => 'Média'])</td>
                        <td>@include('admin.componentes.tabela-acoes', ['contexto' => 'ocorrencias'])</td>
                    </tr>
                    <tr>
                        <td><strong>OR-2026-00474</strong><div class="admin-stat-note">16/04/2026 · 15:49</div></td>
                        <td><strong>Apreensão de arma</strong><div class="admin-stat-note">Preventiva · Arma de fogo · Flagrante</div></td>
                        <td>PE · Orionópolis · Setor Norte<div class="admin-stat-note">BR de acesso, km 11 · Barreira operacional</div></td>
                        <td>2 envolvidos<div class="admin-stat-note">0 bens subtraídos · 1 apreensão</div></td>
                        <td>ROCAM Setorial</td>
                        <td>@include('admin.componentes.status-badge', ['tipo' => 'success', 'texto' => 'Concluída'])</td>
                        <td>@include('admin.componentes.status-badge', ['tipo' => 'danger', 'texto' => 'Alta'])</td>
                        <td>@include('admin.componentes.tabela-acoes', ['contexto' => 'ocorrencias'])</td>
                    </tr>
                    <tr>
                        <td><strong>OR-2026-00471</strong><div class="admin-stat-note">16/04/2026 · 14:20</div></td>
                        <td><strong>Recuperação de veículo</strong><div class="admin-stat-note">Patrimônio · Localização positiva · Sem autoria definida</div></td>
                        <td>PE · Vale Seguro · Lago Azul<div class="admin-stat-note">Avenida Beira Lago, s/n · Estacionamento aberto</div></td>
                        <td>1 envolvido<div class="admin-stat-note">1 bem recuperado · 0 apreensões</div></td>
                        <td>3ª CIA · Bravo 01</td>
                        <td>@include('admin.componentes.status-badge', ['tipo' => 'muted', 'texto' => 'Aguardando validação'])</td>
                        <td>@include('admin.componentes.status-badge', ['tipo' => 'info', 'texto' => 'Baixa'])</td>
                        <td>@include('admin.componentes.tabela-acoes', ['contexto' => 'ocorrencias'])</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
@endsection
