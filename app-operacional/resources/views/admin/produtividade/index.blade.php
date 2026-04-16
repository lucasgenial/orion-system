@extends('admin.layouts.app')

@php
    $paginaAtual = 'produtividade';
    $breadcrumbs = [
        ['titulo' => 'App Operacional'],
        ['titulo' => 'Produtividade'],
    ];
@endphp

@section('page-title', 'Listagem de produtividade')
@section('page-subtitle', 'Consulta por período e unidade com resumo superior, tabela administrativa e exportação simulada.')

@section('page-actions')
    <a href="/orion/produtividade/nova" class="admin-btn admin-btn-primary"><i class="ri-add-line"></i> Nova produtividade</a>
    <a href="#" class="admin-btn admin-btn-secondary"><i class="ri-download-2-line"></i> Exportar visualmente</a>
@endsection

@section('content')
    <section class="dashboard-grid dashboard-grid--4">
        @include('admin.componentes.card-kpi', ['titulo' => 'Armas apreendidas', 'valor' => '14', 'detalhe' => 'Acumulado do período filtrado'])
        @include('admin.componentes.card-kpi', ['titulo' => 'Drogas apreendidas', 'valor' => '27 kg', 'detalhe' => 'Entre cocaína, maconha e crack'])
        @include('admin.componentes.card-kpi', ['titulo' => 'Veículos recuperados', 'valor' => '09', 'detalhe' => 'Cinco motocicletas e quatro carros'])
        @include('admin.componentes.card-kpi', ['titulo' => 'Prisões em flagrante', 'valor' => '11', 'detalhe' => 'Com condução finalizada'])
    </section>

    <section class="admin-card" style="margin-top: 22px;">
        <div class="admin-card-header"><div class="admin-card-header__content"><div class="admin-kicker">Filtros</div><h2 class="admin-section-title">Período e companhia</h2></div></div>
        <div class="admin-card-body">
            <div class="admin-form-grid admin-form-grid--2">
                <div class="admin-field"><label class="admin-label">Data inicial</label><input type="date" class="admin-input" value="2026-04-01" /></div>
                <div class="admin-field"><label class="admin-label">Data final</label><input type="date" class="admin-input" value="2026-04-16" /></div>
                <div class="admin-field"><label class="admin-label">Companhia</label><select class="admin-select"><option selected>2ª Companhia Integrada</option><option>3ª Companhia Integrada</option><option>ROCAM</option></select></div>
                <div class="admin-field"><label class="admin-label">Município</label><select class="admin-select"><option>Todos</option><option selected>Orionópolis</option></select></div>
            </div>
        </div>
    </section>

    <section class="admin-card">
        <div class="admin-card-header"><div class="admin-card-header__content"><div class="admin-kicker">Tabela consolidada</div><h2 class="admin-section-title">Lançamentos por data e unidade</h2></div></div>
        <div class="admin-table-shell">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>Data</th>
                        <th>Unidade</th>
                        <th>Município</th>
                        <th>Indicadores</th>
                        <th>Observações</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>16/04/2026</strong><div class="admin-stat-note">Turno diurno</div></td>
                        <td>2ª Companhia Integrada</td>
                        <td>Orionópolis</td>
                        <td>3 armas · 2 veículos · 4 conduções · 2 TCO</td>
                        <td>Reforço na área central e dois mandados cumpridos.</td>
                        <td>@include('admin.componentes.tabela-acoes', ['contexto' => 'produtividade'])</td>
                    </tr>
                    <tr>
                        <td><strong>15/04/2026</strong><div class="admin-stat-note">Turno noturno</div></td>
                        <td>ROCAM Setorial</td>
                        <td>Orionópolis</td>
                        <td>1 arma · 3 conduções · 1 flagrante</td>
                        <td>Ação de saturação em corredores comerciais.</td>
                        <td>@include('admin.componentes.tabela-acoes', ['contexto' => 'produtividade'])</td>
                    </tr>
                    <tr>
                        <td><strong>15/04/2026</strong><div class="admin-stat-note">Turno diurno</div></td>
                        <td>3ª Companhia Integrada</td>
                        <td>Vale Seguro</td>
                        <td>2 veículos · 1 mandado · 1 menor apreendido</td>
                        <td>Resultado de patrulhamento orientado por análise.</td>
                        <td>@include('admin.componentes.tabela-acoes', ['contexto' => 'produtividade'])</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="admin-card-footer">Resumo visual de exportação simulada e paginação serão integrados ao backend na próxima etapa.</div>
    </section>
@endsection
