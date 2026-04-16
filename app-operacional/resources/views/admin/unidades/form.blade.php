@extends('admin.layouts.app')

@php
    $paginaAtual = 'unidades';
    $breadcrumbs = [
        ['titulo' => 'App Operacional'],
        ['titulo' => 'Unidades e companhias'],
        ['titulo' => 'Nova unidade'],
    ];
@endphp

@section('page-title', 'Cadastro de unidade')
@section('page-subtitle', 'Configuração hierárquica de unidade com empresa vinculada, endereço estruturado, coordenadas e escopo territorial.')

@section('content')
    <div class="admin-stack">
        <section class="admin-card">
            <div class="admin-card-header"><div class="admin-kicker">Estrutura administrativa</div><h2 class="admin-section-title">Identidade e hierarquia</h2></div>
            <div class="admin-card-body">
                <div class="admin-grid admin-grid--3">
                    <div class="admin-field"><label class="admin-label">Nome</label><input class="admin-input" value="2ª Companhia Integrada" /></div>
                    <div class="admin-field"><label class="admin-label">Sigla</label><input class="admin-input" value="CIA-02" /></div>
                    <div class="admin-field"><label class="admin-label">Tipo</label><select class="admin-select"><option selected>Companhia</option><option>Pelotão</option><option>Batalhão</option><option>Base</option></select></div>
                    <div class="admin-field"><label class="admin-label">Unidade superior</label><select class="admin-select"><option selected>BPM Central</option><option>2ª Companhia Integrada</option></select></div>
                    <div class="admin-field"><label class="admin-label">Empresa vinculada</label><input class="admin-input" value="Secretaria Operacional Orion" /></div>
                    <div class="admin-field"><label class="admin-label">Status</label><select class="admin-select"><option selected>Ativa</option><option>Em ajuste</option><option>Inativa</option></select></div>
                    <div class="admin-field"><label class="admin-label">Responsável</label><input class="admin-input" value="Maj. Lucas Andrade" /></div>
                    <div class="admin-field"><label class="admin-label">Abrange descendentes</label><select class="admin-select"><option selected>Sim</option><option>Não</option></select></div>
                    <div class="admin-field"><label class="admin-label">Código territorial</label><input class="admin-input" value="PE-ORI-CIA-02" /></div>
                </div>
            </div>
        </section>

        <section class="admin-card">
            <div class="admin-card-header"><div class="admin-kicker">Localização</div><h2 class="admin-section-title">Endereço e georreferência</h2></div>
            <div class="admin-card-body">
                <div class="admin-grid admin-grid--3">
                    <div class="admin-field"><label class="admin-label">UF</label><select class="admin-select"><option selected>Pernambuco</option></select></div>
                    <div class="admin-field"><label class="admin-label">Município</label><input class="admin-input" value="Orionópolis" /></div>
                    <div class="admin-field"><label class="admin-label">Bairro</label><input class="admin-input" value="Centro Expandido" /></div>
                    <div class="admin-field"><label class="admin-label">Logradouro</label><input class="admin-input" value="Avenida Comando Central" /></div>
                    <div class="admin-field"><label class="admin-label">Número</label><input class="admin-input" value="1200" /></div>
                    <div class="admin-field"><label class="admin-label">Ponto de referência</label><input class="admin-input" value="Ao lado do fórum regional" /></div>
                    <div class="admin-field"><label class="admin-label">Latitude</label><input class="admin-input" value="-8.061020" /></div>
                    <div class="admin-field"><label class="admin-label">Longitude</label><input class="admin-input" value="-34.888440" /></div>
                    <div class="admin-field"><label class="admin-label">Precisão</label><select class="admin-select"><option selected>Ponto validado</option><option>Estimado</option></select></div>
                </div>
            </div>
        </section>

        <section class="admin-card">
            <div class="admin-card-header"><div class="admin-kicker">Cobertura</div><h2 class="admin-section-title">Escopo territorial operacional</h2></div>
            <div class="admin-card-body">
                <div class="admin-grid admin-grid--2">
                    <div class="admin-field"><label class="admin-label">Municípios atendidos</label><textarea class="admin-textarea">Orionópolis
Vale Seguro
Distrito Industrial</textarea></div>
                    <div class="admin-field"><label class="admin-label">Observação de escopo</label><textarea class="admin-textarea">Unidade com visibilidade sobre registros próprios e dos pelotões subordinados. Compartilha dados consolidados com o BPM Central.</textarea></div>
                </div>
            </div>
            <div class="admin-card-footer"><button class="admin-btn admin-btn-primary">Salvar unidade</button></div>
        </section>
    </div>
@endsection
