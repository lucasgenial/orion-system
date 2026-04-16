@php
    $titulo = $titulo ?? 'Atualização registrada';
    $descricao = $descricao ?? 'Descrição do evento';
    $momento = $momento ?? 'Agora';
@endphp
<div class="timeline-item">
    <div>
        <strong>{{ $titulo }}</strong>
        <div class="admin-stat-note">{{ $descricao }}</div>
    </div>
    <span class="admin-kicker">{{ $momento }}</span>
</div>
