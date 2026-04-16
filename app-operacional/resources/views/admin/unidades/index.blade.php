@extends('admin.layouts.app')

@php
    $paginaAtual = 'unidades';
    $breadcrumbs = [
        ['titulo' => 'App Operacional'],
        ['titulo' => 'Unidades e companhias'],
    ];
@endphp

@section('page-title', 'Gestão de unidades e companhias')
@section('page-subtitle', 'Cadastro hierárquico de batalhões, companhias, pelotões e bases com endereço normalizado, georreferência e escopo de visibilidade.')

@section('page-actions')
    <a href="{{ route('orion.unidades.create') }}" class="admin-btn admin-btn-primary"><i class="ri-add-line"></i> Nova unidade</a>
@endsection

@section('content')
    <section class="admin-card">
        <div class="admin-card-header"><div class="admin-card-header__content"><div class="admin-kicker">Quadro organizacional</div><h2 class="admin-section-title">Estrutura territorial</h2></div></div>
        <div class="admin-table-shell">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>Unidade</th>
                        <th>Hierarquia</th>
                        <th>Tipo</th>
                        <th>Território</th>
                        <th>Georreferência</th>
                        <th>Responsável</th>
                        <th>Status</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <tr><td><strong>2ª Companhia Integrada</strong><div class="admin-stat-note">CIA-02</div></td><td>BPM Central › 2ª CIA</td><td>Companhia</td><td>PE · Orionópolis · Centro Expandido</td><td>-8.061020, -34.888440</td><td>Maj. Lucas Andrade</td><td>@include('admin.componentes.status-badge', ['tipo' => 'success', 'texto' => 'Ativa'])</td><td>@include('admin.componentes.tabela-acoes', ['contexto' => 'unidades'])</td></tr>
                    <tr><td><strong>3ª Companhia Integrada</strong><div class="admin-stat-note">CIA-03</div></td><td>BPM Central › 3ª CIA</td><td>Companhia</td><td>PE · Vale Seguro · Zona Leste</td><td>-8.084660, -34.901120</td><td>Cap. Renata Sá</td><td>@include('admin.componentes.status-badge', ['tipo' => 'success', 'texto' => 'Ativa'])</td><td>@include('admin.componentes.tabela-acoes', ['contexto' => 'unidades'])</td></tr>
                    <tr><td><strong>Pelotão Ambiental</strong><div class="admin-stat-note">PATRES</div></td><td>2ª CIA › PATRES</td><td>Pelotão</td><td>PE · Orionópolis · Área rural</td><td>-8.101300, -34.954201</td><td>Ten. Ícaro Lemos</td><td>@include('admin.componentes.status-badge', ['tipo' => 'info', 'texto' => 'Escala especial'])</td><td>@include('admin.componentes.tabela-acoes', ['contexto' => 'unidades'])</td></tr>
                </tbody>
            </table>
        </div>
    </section>
@endsection
