@php
    $titulo = $titulo ?? 'Resumo';
    $descricao = $descricao ?? 'Descrição resumida';
    $meta = $meta ?? 'Atualizado agora';
@endphp
<div class="admin-list-row">
    <div>
        <strong>{{ $titulo }}</strong>
        <div class="admin-stat-note">{{ $descricao }}</div>
    </div>
    <span class="admin-kicker">{{ $meta }}</span>
</div>
