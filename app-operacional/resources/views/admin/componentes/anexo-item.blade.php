@php
    $nome = $nome ?? 'Arquivo.pdf';
    $meta = $meta ?? '1,2 MB';
@endphp
<div class="anexo-item">
    <div>
        <strong>{{ $nome }}</strong>
        <div class="admin-stat-note">{{ $meta }}</div>
    </div>
    <span class="admin-badge admin-badge--info">Mockado</span>
</div>
