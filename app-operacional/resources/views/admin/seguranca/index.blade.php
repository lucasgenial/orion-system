@extends('admin.layouts.app')

@php
    $paginaAtual = 'seguranca';
    $breadcrumbs = [
        ['titulo' => 'App Operacional'],
        ['titulo' => 'Segurança e acesso'],
    ];
@endphp

@section('page-title', 'Segurança e acesso')
@section('page-subtitle', 'Separação entre perfil funcional, tipo técnico de acesso e escopo de visibilidade dos dados, com matriz resumida de permissões.')

@section('content')
    <div class="dashboard-grid dashboard-grid--3">
        <section class="admin-card">
            <div class="admin-card-header"><div class="admin-card-header__content"><div class="admin-kicker">Perfis</div><h2 class="admin-section-title">Perfil funcional</h2></div></div>
            <div class="admin-card-body">
                <div class="timeline-list">
                    @include('admin.componentes.card-resumo', ['titulo' => 'Administrador', 'descricao' => 'Governança ampla, perfis, auditoria e parametrização do sistema.', 'meta' => 'Global'])
                    @include('admin.componentes.card-resumo', ['titulo' => 'Gestor Operacional', 'descricao' => 'Valida registros, consolida indicadores e supervisiona unidades.', 'meta' => 'Gestão'])
                    @include('admin.componentes.card-resumo', ['titulo' => 'Supervisor', 'descricao' => 'Acompanha equipe e revisa registros setoriais.', 'meta' => 'Unidade'])
                </div>
            </div>
        </section>

        <section class="admin-card">
            <div class="admin-card-header"><div class="admin-card-header__content"><div class="admin-kicker">Tipos</div><h2 class="admin-section-title">Canal técnico de acesso</h2></div></div>
            <div class="admin-card-body">
                <div class="timeline-list">
                    @include('admin.componentes.card-resumo', ['titulo' => 'Web interno', 'descricao' => 'Acesso pleno em rede institucional.', 'meta' => 'Preferencial'])
                    @include('admin.componentes.card-resumo', ['titulo' => 'Web externo controlado', 'descricao' => 'Acesso com restrições extras e monitoramento reforçado.', 'meta' => 'Condicional'])
                    @include('admin.componentes.card-resumo', ['titulo' => 'API integração', 'descricao' => 'Conta de serviço, sem uso humano interativo.', 'meta' => 'Técnico'])
                </div>
            </div>
        </section>

        <section class="admin-card">
            <div class="admin-card-header"><div class="admin-card-header__content"><div class="admin-kicker">Escopo</div><h2 class="admin-section-title">Visibilidade de dados</h2></div></div>
            <div class="admin-card-body">
                <div class="timeline-list">
                    @include('admin.componentes.card-resumo', ['titulo' => 'Global', 'descricao' => 'Visualiza todas as unidades e municípios.', 'meta' => 'Amplo'])
                    @include('admin.componentes.card-resumo', ['titulo' => 'Unidade e descendentes', 'descricao' => 'Abrange a própria unidade e estruturas subordinadas.', 'meta' => 'Hierárquico'])
                    @include('admin.componentes.card-resumo', ['titulo' => 'Município', 'descricao' => 'Limita a visão territorial a um município específico.', 'meta' => 'Territorial'])
                </div>
            </div>
        </section>
    </div>

    <section class="admin-card" style="margin-top: 22px;">
        <div class="admin-card-header"><div class="admin-card-header__content"><div class="admin-kicker">Matriz</div><h2 class="admin-section-title">Permissões por perfil e ação</h2></div></div>
        <div class="admin-table-shell">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>Perfil</th>
                        <th>Ocorrências</th>
                        <th>Usuários</th>
                        <th>Auditoria</th>
                        <th>Configurações</th>
                        <th>Escopo padrão</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <tr><td><strong>Administrador</strong></td><td>Criar, editar, validar e parametrizar</td><td>Gerir todos</td><td>Total</td><td>Total</td><td>Global</td><td>@include('admin.componentes.tabela-acoes', ['contexto' => 'seguranca'])</td></tr>
                    <tr><td><strong>Gestor Operacional</strong></td><td>Criar, editar, validar e consolidar</td><td>Gerir equipe da área</td><td>Leitura avançada</td><td>Parcial</td><td>Unidade e descendentes</td><td>@include('admin.componentes.tabela-acoes', ['contexto' => 'seguranca'])</td></tr>
                    <tr><td><strong>Supervisor</strong></td><td>Criar, revisar e encaminhar</td><td>Consultar equipe</td><td>Leitura setorial</td><td>Não</td><td>Unidade própria</td><td>@include('admin.componentes.tabela-acoes', ['contexto' => 'seguranca'])</td></tr>
                    <tr><td><strong>Digitador</strong></td><td>Criar e editar rascunhos</td><td>Não</td><td>Não</td><td>Não</td><td>Registros próprios da unidade</td><td>@include('admin.componentes.tabela-acoes', ['contexto' => 'seguranca'])</td></tr>
                    <tr><td><strong>Visualizador</strong></td><td>Somente leitura</td><td>Não</td><td>Não</td><td>Não</td><td>Escopo concedido</td><td>@include('admin.componentes.tabela-acoes', ['contexto' => 'seguranca'])</td></tr>
                </tbody>
            </table>
        </div>
    </section>
@endsection
