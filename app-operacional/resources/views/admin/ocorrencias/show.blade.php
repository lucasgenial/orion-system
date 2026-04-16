@extends('admin.layouts.app')

@php
    $paginaAtual = 'ocorrencias';
    $breadcrumbs = [
        ['titulo' => 'App Operacional'],
        ['titulo' => 'Ocorrências'],
        ['titulo' => 'Detalhe'],
    ];
@endphp

@section('page-title', 'Visualização detalhada da ocorrência')
@section('page-subtitle', 'Leitura consolidada do registro, histórico de movimentação, envolvidos, providências e anexos.')

@section('page-actions')
    <a href="/orion/ocorrencias" class="admin-btn admin-btn-secondary"><i class="ri-arrow-left-line"></i> Voltar</a>
    <a href="/orion/ocorrencias/editar" class="admin-btn admin-btn-primary"><i class="ri-edit-line"></i> Editar ocorrência</a>
@endsection

@section('content')
    <section class="admin-card">
        <div class="admin-card-header">
            <div class="admin-kicker">OR-2026-00481</div>
            <h2 class="admin-section-title">Roubo a transeunte no Centro</h2>
            <div class="orion-page-actions" style="margin-top: 12px;">
                @include('admin.componentes.status-badge', ['tipo' => 'warning', 'texto' => 'Em atendimento'])
                @include('admin.componentes.status-badge', ['tipo' => 'danger', 'texto' => 'Alta prioridade'])
            </div>
        </div>
        <div class="admin-card-body">
            <div class="admin-summary-grid">
                @include('admin.componentes.card-resumo', ['titulo' => 'Data e hora', 'descricao' => '16/04/2026 às 17:41', 'meta' => 'Registro'])
                @include('admin.componentes.card-resumo', ['titulo' => 'Localização', 'descricao' => 'Centro · Rua 7 de Setembro, próximo à rodoviária', 'meta' => 'Georreferência'])
                @include('admin.componentes.card-resumo', ['titulo' => 'Guarnição', 'descricao' => 'Alfa 02 · 2ª Companhia Integrada', 'meta' => 'Responsável'])
                @include('admin.componentes.card-resumo', ['titulo' => 'Envolvidos', 'descricao' => '1 vítima identificada, 2 suspeitos em fuga', 'meta' => 'Resumo'])
            </div>
        </div>
    </section>

    <div class="dashboard-grid dashboard-grid--2" style="margin-top: 22px;">
        <section class="admin-card">
            <div class="admin-card-header"><div class="admin-kicker">Descrição</div><h2 class="admin-section-title">Narrativa do fato</h2></div>
            <div class="admin-card-body"><p class="admin-section-copy">A vítima relatou abordagem por dois indivíduos em motocicleta, que subtraíram aparelho celular e documentos mediante ameaça. A guarnição realizou saturação, colheu imagens próximas e informou a rede setorial.</p></div>
        </section>
        <section class="admin-card">
            <div class="admin-card-header"><div class="admin-kicker">Providências</div><h2 class="admin-section-title">Ações adotadas</h2></div>
            <div class="admin-card-body"><p class="admin-section-copy">Foram realizadas rondas perimetrais, repasse via rádio, contato com videomonitoramento e preparação de material para análise posterior da equipe de supervisão.</p></div>
        </section>
    </div>

    <div class="admin-split" style="margin-top: 22px;">
        <section class="admin-card">
            <div class="admin-card-header"><div class="admin-kicker">Histórico</div><h2 class="admin-section-title">Linha do tempo da ocorrência</h2></div>
            <div class="admin-card-body">
                <div class="timeline-list">
                    @include('admin.componentes.timeline-item', ['titulo' => 'Registro aberto', 'descricao' => 'Ocorrência lançada pelo operador do COPOM.', 'momento' => '17:41'])
                    @include('admin.componentes.timeline-item', ['titulo' => 'Guarnição deslocada', 'descricao' => 'Equipe Alfa 02 acionada para o local.', 'momento' => '17:44'])
                    @include('admin.componentes.timeline-item', ['titulo' => 'Coleta complementar', 'descricao' => 'Imagens solicitadas ao monitoramento municipal.', 'momento' => '18:03'])
                    @include('admin.componentes.timeline-item', ['titulo' => 'Em análise', 'descricao' => 'Supervisor aguardando novos dados de identificação.', 'momento' => '18:20'])
                </div>
            </div>
        </section>

        <aside>
            <section class="admin-card">
                <div class="admin-card-header"><div class="admin-kicker">Anexos</div><h2 class="admin-section-title">Arquivos vinculados</h2></div>
                <div class="admin-card-body">
                    <div class="anexo-list">
                        @include('admin.componentes.anexo-item', ['nome' => 'imagem-camera-rodoviaria.jpg', 'meta' => '2,7 MB'])
                        @include('admin.componentes.anexo-item', ['nome' => 'declaracao-vitima.pdf', 'meta' => '420 KB'])
                    </div>
                </div>
            </section>
            <section class="admin-card">
                <div class="admin-card-header"><div class="admin-kicker">Ação sensível</div><h2 class="admin-section-title">Confirmação visual</h2></div>
                <div class="admin-card-body">@include('admin.componentes.modal-confirmacao')</div>
            </section>
        </aside>
    </div>
@endsection
