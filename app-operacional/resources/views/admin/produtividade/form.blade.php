@extends('admin.layouts.app')

@php
    $paginaAtual = 'produtividade';
    $breadcrumbs = [
        ['titulo' => 'App Operacional'],
        ['titulo' => 'Produtividade'],
        ['titulo' => 'Novo lançamento'],
    ];
@endphp

@section('page-title', 'Cadastro de produtividade policial')
@section('page-subtitle', 'Lançamento de dados operacionais complementares por data, unidade e natureza de resultado.')

@section('page-actions')
    <a href="/orion/produtividade" class="admin-btn admin-btn-secondary"><i class="ri-arrow-left-line"></i> Voltar à listagem</a>
@endsection

@section('content')
    <section class="admin-card">
        <div class="admin-card-header"><div class="admin-kicker">Lançamento operacional</div><h2 class="admin-section-title">Indicadores do período</h2></div>
        <div class="admin-card-body">
            <div class="admin-grid admin-grid--2">
                <div class="admin-field"><label class="admin-label">Data</label><input type="date" class="admin-input" value="2026-04-16" /></div>
                <div class="admin-field"><label class="admin-label">Unidade</label><select class="admin-select"><option>2ª Companhia Integrada</option><option>3ª Companhia Integrada</option></select></div>
                <div class="admin-field"><label class="admin-label">Município</label><input class="admin-input" value="Orionópolis" /></div>
                <div class="admin-field"><label class="admin-label">Armas apreendidas</label><input type="number" class="admin-input" value="3" /></div>
                <div class="admin-field"><label class="admin-label">Drogas apreendidas</label><input class="admin-input" value="4,8 kg" /></div>
                <div class="admin-field"><label class="admin-label">Veículos recuperados</label><input type="number" class="admin-input" value="2" /></div>
                <div class="admin-field"><label class="admin-label">Conduções</label><input type="number" class="admin-input" value="4" /></div>
                <div class="admin-field"><label class="admin-label">TCO</label><input type="number" class="admin-input" value="2" /></div>
                <div class="admin-field"><label class="admin-label">Mandados</label><input type="number" class="admin-input" value="2" /></div>
                <div class="admin-field"><label class="admin-label">Prisões em flagrante</label><input type="number" class="admin-input" value="1" /></div>
                <div class="admin-field"><label class="admin-label">Menores apreendidos</label><input type="number" class="admin-input" value="1" /></div>
                <div class="admin-field" style="grid-column: 1 / -1;"><label class="admin-label">Observações</label><textarea class="admin-textarea">Operação concentrada na área central, com apoio de videomonitoramento e reforço de patrulhamento em corredores comerciais.</textarea></div>
            </div>
        </div>
        <div class="admin-card-footer"><div class="orion-page-actions"><button class="admin-btn admin-btn-primary">Salvar produtividade</button><button class="admin-btn admin-btn-secondary">Salvar rascunho</button></div></div>
    </section>
@endsection
