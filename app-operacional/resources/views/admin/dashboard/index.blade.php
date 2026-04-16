@extends('admin.layouts.app')

@php
    $paginaAtual = 'dashboard';
    $breadcrumbs = [
        ['titulo' => 'App Operacional'],
        ['titulo' => 'Dashboard inicial'],
    ];
    $kpis = [
        ['titulo' => 'Ocorrências hoje', 'valor' => '38', 'detalhe' => '12 com prioridade alta'],
        ['titulo' => 'Produtividade lançada', 'valor' => '126', 'detalhe' => 'Dados consolidados até 18h'],
        ['titulo' => 'Status da unidade', 'valor' => '94%', 'detalhe' => 'Eficiência operacional estimada'],
        ['titulo' => 'Pendências críticas', 'valor' => '05', 'detalhe' => 'Requerem validação do supervisor'],
    ];
@endphp

@section('page-title', 'Dashboard inicial')
@section('page-subtitle', 'Visão rápida da operação diária, produtividade resumida e atividade recente da unidade.')

@section('page-actions')
    <a href="/orion/ocorrencias/nova" class="admin-btn admin-btn-primary"><i class="ri-add-line"></i> Nova ocorrência</a>
    <a href="/orion/produtividade/nova" class="admin-btn admin-btn-secondary"><i class="ri-file-list-3-line"></i> Lançar produtividade</a>
@endsection

@section('content')
    <section class="dashboard-grid dashboard-grid--4">
        @foreach ($kpis as $kpi)
            @include('admin.componentes.card-kpi', $kpi)
        @endforeach
    </section>

    <div class="admin-split" style="margin-top: 22px;">
        <div>
            <section class="admin-card">
                <div class="admin-card-header">
                    <div class="admin-kicker">Ocorrências recentes</div>
                    <h2 class="admin-section-title">Atividade das últimas horas</h2>
                    <p class="admin-section-copy">Registros recentes com prioridade, localização e situação atual.</p>
                </div>
                <div class="admin-card-body">
                    <div class="timeline-list">
                        @include('admin.componentes.card-resumo', ['titulo' => 'OR-2026-00481 · Roubo a transeunte', 'descricao' => 'Centro · Em atendimento pela guarnição Alfa 02', 'meta' => '19 min'])
                        @include('admin.componentes.card-resumo', ['titulo' => 'OR-2026-00479 · Violência doméstica', 'descricao' => 'Nova Esperança · Aguardando encaminhamento', 'meta' => '41 min'])
                        @include('admin.componentes.card-resumo', ['titulo' => 'OR-2026-00474 · Apreensão de arma', 'descricao' => 'Setor Norte · Concluída com condução', 'meta' => '1h 08'])
                        @include('admin.componentes.card-resumo', ['titulo' => 'OR-2026-00471 · Recuperação de veículo', 'descricao' => 'Lago Azul · Em validação documental', 'meta' => '1h 35'])
                    </div>
                </div>
            </section>

            <section class="admin-card">
                <div class="admin-card-header">
                    <div class="admin-kicker">Produtividade resumida</div>
                    <h2 class="admin-section-title">Indicadores do turno</h2>
                    <p class="admin-section-copy">Leitura rápida da produção registrada pela unidade hoje.</p>
                </div>
                <div class="admin-card-body">
                    <div class="dashboard-chart">
                        <div class="dashboard-bar">
                            <strong>Conduções</strong>
                            <div class="dashboard-bar__track"><div class="dashboard-bar__fill" data-bar-width="84"></div></div>
                            <span>18</span>
                        </div>
                        <div class="dashboard-bar">
                            <strong>Mandados</strong>
                            <div class="dashboard-bar__track"><div class="dashboard-bar__fill" data-bar-width="46"></div></div>
                            <span>07</span>
                        </div>
                        <div class="dashboard-bar">
                            <strong>Armas apreendidas</strong>
                            <div class="dashboard-bar__track"><div class="dashboard-bar__fill" data-bar-width="58"></div></div>
                            <span>09</span>
                        </div>
                        <div class="dashboard-bar">
                            <strong>Veículos recuperados</strong>
                            <div class="dashboard-bar__track"><div class="dashboard-bar__fill" data-bar-width="32"></div></div>
                            <span>05</span>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <aside>
            <section class="admin-card">
                <div class="admin-card-header">
                    <div class="admin-kicker">Status operacional</div>
                    <h2 class="admin-section-title">Unidade em observação</h2>
                </div>
                <div class="admin-card-body">
                    <div class="timeline-list">
                        @include('admin.componentes.card-resumo', ['titulo' => '2ª Companhia Integrada', 'descricao' => 'Cobertura em patamar estável com 9 guarnições ativas.', 'meta' => 'Operando'])
                        @include('admin.componentes.card-resumo', ['titulo' => 'Despacho médio', 'descricao' => 'Tempo médio de acionamento em 8 minutos.', 'meta' => 'Bom'])
                        @include('admin.componentes.card-resumo', ['titulo' => 'Fila de validação', 'descricao' => '6 registros aguardando revisão do supervisor.', 'meta' => 'Atenção'])
                    </div>
                </div>
            </section>

            <section class="admin-card">
                <div class="admin-card-header">
                    <div class="admin-kicker">Atalhos rápidos</div>
                    <h2 class="admin-section-title">Fluxos mais usados</h2>
                </div>
                <div class="admin-card-body">
                    <div class="quick-links">
                        <a href="/orion/ocorrencias/nova" class="quick-link"><strong>Registrar ocorrência</strong><i class="ri-arrow-right-line"></i></a>
                        <a href="/orion/produtividade/nova" class="quick-link"><strong>Lançar produtividade</strong><i class="ri-arrow-right-line"></i></a>
                        <a href="/orion/unidades" class="quick-link"><strong>Consultar unidades</strong><i class="ri-arrow-right-line"></i></a>
                        <a href="/orion/usuarios" class="quick-link"><strong>Gerir usuários</strong><i class="ri-arrow-right-line"></i></a>
                    </div>
                </div>
            </section>
        </aside>
    </div>
@endsection
