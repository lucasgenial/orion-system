@extends('admin.layouts.app')

@php
    $paginaAtual = 'dashboard-interno';
    $breadcrumbs = [
        ['titulo' => 'App Operacional'],
        ['titulo' => 'Dashboard interno'],
    ];
@endphp

@section('page-title', 'Dashboard interno')
@section('page-subtitle', 'Comparativos simples, desempenho recente e sinais administrativos para gestão operacional.')

@section('page-actions')
    <a href="/orion/dashboard" class="admin-btn admin-btn-secondary"><i class="ri-arrow-left-line"></i> Voltar ao dashboard</a>
@endsection

@section('content')
    <section class="dashboard-grid dashboard-grid--4">
        @include('admin.componentes.card-kpi', ['titulo' => 'CVLI no mês', 'valor' => '04', 'detalhe' => 'Redução de 11% frente ao mês anterior'])
        @include('admin.componentes.card-kpi', ['titulo' => 'Roubos no mês', 'valor' => '32', 'detalhe' => 'Oscilação dentro da faixa esperada'])
        @include('admin.componentes.card-kpi', ['titulo' => 'Furtos no mês', 'valor' => '48', 'detalhe' => 'Concentração nos setores 1 e 3'])
        @include('admin.componentes.card-kpi', ['titulo' => 'Prisões em flagrante', 'valor' => '19', 'detalhe' => 'Acumulado parcial do mês'])
    </section>

    <div class="dashboard-grid dashboard-grid--2" style="margin-top: 22px;">
        <section class="admin-card">
            <div class="admin-card-header">
                <div class="admin-kicker">Comparativo por unidade</div>
                <h2 class="admin-section-title">Volume de ocorrências registradas</h2>
            </div>
            <div class="admin-card-body">
                <div class="dashboard-chart">
                    <div class="dashboard-bar"><strong>2ª CIA</strong><div class="dashboard-bar__track"><div class="dashboard-bar__fill" data-bar-width="91"></div></div><span>128</span></div>
                    <div class="dashboard-bar"><strong>3ª CIA</strong><div class="dashboard-bar__track"><div class="dashboard-bar__fill" data-bar-width="73"></div></div><span>102</span></div>
                    <div class="dashboard-bar"><strong>PATRES</strong><div class="dashboard-bar__track"><div class="dashboard-bar__fill" data-bar-width="48"></div></div><span>67</span></div>
                    <div class="dashboard-bar"><strong>ROCAM</strong><div class="dashboard-bar__track"><div class="dashboard-bar__fill" data-bar-width="39"></div></div><span>54</span></div>
                </div>
            </div>
        </section>

        <section class="admin-card">
            <div class="admin-card-header">
                <div class="admin-kicker">Tendência semanal</div>
                <h2 class="admin-section-title">Linha mockada de registros</h2>
            </div>
            <div class="admin-card-body">
                <div class="dashboard-line-mock">
                    <svg viewBox="0 0 300 160" preserveAspectRatio="none">
                        <polyline fill="none" stroke="#2e6175" stroke-width="4" points="10,120 60,92 110,98 160,70 210,86 260,54 290,46" />
                        <polyline fill="none" stroke="#148a90" stroke-width="4" points="10,138 60,126 110,118 160,112 210,96 260,88 290,80" />
                    </svg>
                </div>
            </div>
        </section>
    </div>

    <div class="dashboard-grid dashboard-grid--2" style="margin-top: 22px;">
        <section class="admin-card">
            <div class="admin-card-header">
                <div class="admin-kicker">Ranking operacional</div>
                <h2 class="admin-section-title">Unidades com melhor resposta</h2>
            </div>
            <div class="admin-card-body">
                <div class="admin-list-clean">
                    @include('admin.componentes.card-resumo', ['titulo' => '1º · 2ª Companhia Integrada', 'descricao' => 'Tempo médio de resposta 08:12 e 94% de regularidade.', 'meta' => '94 pontos'])
                    @include('admin.componentes.card-resumo', ['titulo' => '2º · ROCAM Setorial', 'descricao' => 'Alta mobilidade e maior taxa de abordagem qualificada.', 'meta' => '89 pontos'])
                    @include('admin.componentes.card-resumo', ['titulo' => '3º · 3ª Companhia Integrada', 'descricao' => 'Bom fechamento de ocorrências e produtividade estável.', 'meta' => '85 pontos'])
                </div>
            </div>
        </section>

        <section class="admin-card">
            <div class="admin-card-header">
                <div class="admin-kicker">Registros recentes</div>
                <h2 class="admin-section-title">Linha de atividade</h2>
            </div>
            <div class="admin-card-body">
                <div class="timeline-list">
                    @include('admin.componentes.timeline-item', ['titulo' => 'Painel atualizado', 'descricao' => 'Consolidação de indicadores concluída para 4 unidades.', 'momento' => 'agora'])
                    @include('admin.componentes.timeline-item', ['titulo' => 'Nova meta operacional', 'descricao' => 'Supervisão publicou ajuste de acompanhamento semanal.', 'momento' => '17 min'])
                    @include('admin.componentes.timeline-item', ['titulo' => 'Validação encerrada', 'descricao' => 'Lote de produtividade de ontem foi homologado.', 'momento' => '42 min'])
                </div>
            </div>
        </section>
    </div>
@endsection
