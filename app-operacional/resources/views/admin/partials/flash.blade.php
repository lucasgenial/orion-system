@php
    $alertasDemo = $alertasDemo ?? [
        ['tipo' => 'success', 'mensagem' => 'Ambiente visual ORION carregado com dados mockados para prototipação.'],
        ['tipo' => 'warning', 'mensagem' => 'Integrações com backend, autenticação e persistência ainda não estão conectadas.'],
    ];
@endphp

<div class="admin-flash-stack">
    @foreach ($alertasDemo as $alerta)
        <div class="admin-alert admin-alert--{{ $alerta['tipo'] }}">
            {{ $alerta['mensagem'] }}
        </div>
    @endforeach
</div>
