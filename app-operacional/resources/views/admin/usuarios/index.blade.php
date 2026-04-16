@extends('admin.layouts.app')

@php
    $paginaAtual = 'usuarios';
    $breadcrumbs = [
        ['titulo' => 'App Operacional'],
        ['titulo' => 'Usuários'],
    ];
@endphp

@section('page-title', 'Gestão de usuários')
@section('page-subtitle', 'Perfis administrativos, tipo de acesso, escopo territorial, situação da credencial e autonomia da conta do usuário.')

@section('page-actions')
    <a href="{{ route('orion.usuarios.create') }}" class="admin-btn admin-btn-primary"><i class="ri-user-add-line"></i> Novo usuário</a>
@endsection

@section('content')
    <section class="admin-card">
        <div class="admin-card-header"><div class="admin-card-header__content"><div class="admin-kicker">Usuários do sistema</div><h2 class="admin-section-title">Perfis e status</h2></div></div>
        <div class="admin-table-shell">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Perfil</th>
                        <th>Tipo de acesso</th>
                        <th>Escopo</th>
                        <th>Unidade</th>
                        <th>Status</th>
                        <th>Último acesso</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <tr><td><strong>Helena Duarte</strong><div class="admin-stat-note">helena.duarte@orion.gov</div></td><td>Gestor Operacional</td><td>Web interno</td><td>Unidade e descendentes</td><td>2ª Companhia Integrada</td><td>@include('admin.componentes.status-badge', ['tipo' => 'success', 'texto' => 'Ativo'])</td><td>16/04/2026 18:12</td><td>@include('admin.componentes.tabela-acoes', ['contexto' => 'usuarios'])</td></tr>
                    <tr><td><strong>Marcelo Teles</strong><div class="admin-stat-note">marcelo.teles@orion.gov</div></td><td>Supervisor</td><td>Web interno</td><td>Unidade própria</td><td>3ª Companhia Integrada</td><td>@include('admin.componentes.status-badge', ['tipo' => 'info', 'texto' => 'Ativo'])</td><td>16/04/2026 17:47</td><td>@include('admin.componentes.tabela-acoes', ['contexto' => 'usuarios'])</td></tr>
                    <tr><td><strong>Joana Farias</strong><div class="admin-stat-note">joana.farias@orion.gov</div></td><td>Digitador</td><td>Web interno</td><td>Registros próprios da unidade</td><td>2ª Companhia Integrada</td><td>@include('admin.componentes.status-badge', ['tipo' => 'warning', 'texto' => 'Em ajuste'])</td><td>15/04/2026 22:05</td><td>@include('admin.componentes.tabela-acoes', ['contexto' => 'usuarios'])</td></tr>
                </tbody>
            </table>
        </div>
    </section>
@endsection
