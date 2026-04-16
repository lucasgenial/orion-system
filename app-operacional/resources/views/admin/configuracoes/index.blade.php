@extends('admin.layouts.app')

@php
    $paginaAtual = 'configuracoes';
    $breadcrumbs = [
        ['titulo' => 'App Operacional'],
        ['titulo' => 'Configurações'],
    ];
@endphp

@section('page-title', 'Configurações do sistema')
@section('page-subtitle', 'Parâmetros institucionais, identidade visual, catálogos operacionais, tipificações, tipos de acesso e regras gerais do domínio.')

@section('content')
    <div class="admin-tabs">
        <span class="admin-tab is-active">Organização</span>
        <span class="admin-tab">Identidade visual</span>
        <span class="admin-tab">Tipificações</span>
        <span class="admin-tab">Status</span>
        <span class="admin-tab">Perfis</span>
        <span class="admin-tab">Tipos de acesso</span>
    </div>

    <div class="dashboard-grid dashboard-grid--2" style="margin-top: 22px;">
        <section class="admin-card">
            <div class="admin-card-header"><div class="admin-kicker">Dados institucionais</div><h2 class="admin-section-title">Organização</h2></div>
            <div class="admin-card-body">
                <div class="admin-grid admin-grid--2">
                    <div class="admin-field"><label class="admin-label">Nome do sistema</label><input class="admin-input" value="ORION" /></div>
                    <div class="admin-field"><label class="admin-label">Sigla</label><input class="admin-input" value="Operações, Registro e Inteligência Operacional em Rede" /></div>
                    <div class="admin-field"><label class="admin-label">Companhia padrão</label><input class="admin-input" value="2ª Companhia Integrada" /></div>
                    <div class="admin-field"><label class="admin-label">Tema base</label><input class="admin-input" value="Claro institucional" /></div>
                </div>
            </div>
        </section>

        <section class="admin-card">
            <div class="admin-card-header"><div class="admin-kicker">Configuração de status</div><h2 class="admin-section-title">Catálogo operacional</h2></div>
            <div class="admin-card-body">
                <div class="timeline-list">
                    @include('admin.componentes.card-resumo', ['titulo' => 'Status de ocorrência', 'descricao' => 'Em atendimento, em análise, concluída, validada.', 'meta' => '4 opções'])
                    @include('admin.componentes.card-resumo', ['titulo' => 'Tipificações disponíveis', 'descricao' => 'Cada tipificação define obrigatoriedade de envolvidos, bens e classificação analítica.', 'meta' => '8 regras'])
                    @include('admin.componentes.card-resumo', ['titulo' => 'Perfis de acesso', 'descricao' => 'Administrador, gestor, supervisor, digitador e visualizador.', 'meta' => '5 perfis'])
                    @include('admin.componentes.card-resumo', ['titulo' => 'Tipos de acesso', 'descricao' => 'Web interno, web externo controlado, API integração e temporário.', 'meta' => '4 perfis técnicos'])
                </div>
            </div>
        </section>
    </div>
@endsection
