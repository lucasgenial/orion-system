@php
    $tipo = $tipo ?? 'muted';
    $texto = $texto ?? 'Em análise';
@endphp
<span class="admin-badge admin-badge--{{ $tipo }}">{{ $texto }}</span>
