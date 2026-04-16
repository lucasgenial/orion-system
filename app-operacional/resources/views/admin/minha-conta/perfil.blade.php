@extends('admin.layouts.app')

@php
    $breadcrumbs = [
        ['titulo' => 'App Operacional'],
        ['titulo' => 'Minha conta'],
        ['titulo' => 'Meu perfil'],
    ];
@endphp

@section('page-title', 'Meu perfil')
@section('page-subtitle', 'Autoatendimento para atualizar dados pessoais, contatos e preferências sem alterar o perfil funcional concedido pela administração.')

@section('content')
    <div class="dashboard-grid dashboard-grid--2">
        <section class="admin-card">
            <div class="admin-card-header"><div class="admin-kicker">Dados pessoais</div><h2 class="admin-section-title">Identificação</h2></div>
            <div class="admin-card-body">
                <div class="admin-grid admin-grid--2">
                    <div class="admin-field"><label class="admin-label">Nome</label><input class="admin-input" value="Helena Duarte" /></div>
                    <div class="admin-field"><label class="admin-label">E-mail</label><input class="admin-input" value="helena.duarte@orion.gov" /></div>
                    <div class="admin-field"><label class="admin-label">Telefone funcional</label><input class="admin-input" value="(81) 99999-1200" /></div>
                    <div class="admin-field"><label class="admin-label">Cargo exibido</label><input class="admin-input" value="Capitã" /></div>
                </div>
            </div>
        </section>

        <section class="admin-card">
            <div class="admin-card-header"><div class="admin-kicker">Resumo de acesso</div><h2 class="admin-section-title">Credencial vigente</h2></div>
            <div class="admin-card-body">
                <div class="timeline-list">
                    @include('admin.componentes.card-resumo', ['titulo' => 'Perfil', 'descricao' => 'Gestor Operacional', 'meta' => 'Funcional'])
                    @include('admin.componentes.card-resumo', ['titulo' => 'Tipo de acesso', 'descricao' => 'Web interno', 'meta' => 'Técnico'])
                    @include('admin.componentes.card-resumo', ['titulo' => 'Escopo', 'descricao' => '2ª Companhia Integrada e descendentes', 'meta' => 'Visibilidade'])
                </div>
            </div>
        </section>
    </div>

    <section class="admin-card" style="margin-top: 22px;">
        <div class="admin-card-footer"><button class="admin-btn admin-btn-primary">Salvar dados pessoais</button></div>
    </section>
@endsection
