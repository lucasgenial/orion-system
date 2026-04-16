@php
    $titulo = $titulo ?? 'Indicador';
    $valor = $valor ?? '0';
    $detalhe = $detalhe ?? 'Sem detalhe adicional';
@endphp
<article class="admin-stat-card">
    <div class="admin-kicker">{{ $titulo }}</div>
    <div class="admin-stat-value">{{ $valor }}</div>
    <div class="admin-stat-note">{{ $detalhe }}</div>
</article>
