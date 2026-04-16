@extends('admin.layouts.app')

@php
    $breadcrumbs = [
        ['titulo' => 'App Operacional'],
        ['titulo' => 'Minha conta'],
        ['titulo' => 'Minha senha'],
    ];
@endphp

@section('page-title', 'Minha senha')
@section('page-subtitle', 'Troca de senha e fortalecimento da credencial do usuário, com exigência de confirmação e orientação de segurança.')

@section('content')
    <div class="dashboard-grid dashboard-grid--2">
        <section class="admin-card">
            <div class="admin-card-header"><div class="admin-kicker">Atualização de credencial</div><h2 class="admin-section-title">Trocar senha</h2></div>
            <div class="admin-card-body">
                <div class="admin-grid admin-grid--1">
                    <div class="admin-field"><label class="admin-label">Senha atual</label><input type="password" class="admin-input" value="senha-atual" /></div>
                    <div class="admin-field"><label class="admin-label">Nova senha</label><input type="password" class="admin-input" value="NovaSenhaForte@2026" /></div>
                    <div class="admin-field"><label class="admin-label">Confirmar nova senha</label><input type="password" class="admin-input" value="NovaSenhaForte@2026" /></div>
                </div>
            </div>
            <div class="admin-card-footer"><button class="admin-btn admin-btn-primary">Atualizar senha</button></div>
        </section>

        <section class="admin-card">
            <div class="admin-card-header"><div class="admin-kicker">Regras</div><h2 class="admin-section-title">Boas práticas</h2></div>
            <div class="admin-card-body">
                <div class="timeline-list">
                    @include('admin.componentes.card-resumo', ['titulo' => 'Complexidade mínima', 'descricao' => 'Usar letras maiúsculas, minúsculas, números e símbolo.', 'meta' => 'Obrigatória'])
                    @include('admin.componentes.card-resumo', ['titulo' => 'Troca periódica', 'descricao' => 'Sugerida a cada 90 dias ou após suspeita de exposição.', 'meta' => 'Segurança'])
                    @include('admin.componentes.card-resumo', ['titulo' => 'Acesso externo', 'descricao' => 'Perfis externos controlados terão regras mais rígidas.', 'meta' => 'Política'])
                </div>
            </div>
        </section>
    </div>
@endsection
