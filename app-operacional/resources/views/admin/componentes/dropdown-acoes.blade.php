@php
    $rotulo = $rotulo ?? 'Ações';
    $icone = $icone ?? 'ri-more-2-fill';
    $classe = $classe ?? '';
    $classeBotao = $classeBotao ?? 'admin-btn admin-btn-secondary admin-btn-action';
    $somenteIcone = $somenteIcone ?? false;
    $tituloMenu = $tituloMenu ?? null;
    $itens = $itens ?? [
        ['titulo' => 'Visualizar', 'icone' => 'ri-eye-line', 'href' => '#'],
        ['titulo' => 'Editar', 'icone' => 'ri-edit-line', 'href' => '#'],
        ['titulo' => 'Excluir', 'icone' => 'ri-delete-bin-line', 'tipo' => 'button', 'danger' => true],
    ];
@endphp

<div class="admin-dropdown {{ $classe }}" data-dropdown-root>
    <button type="button" class="{{ $classeBotao }}" data-dropdown-toggle aria-haspopup="true" aria-expanded="false">
        <i class="{{ $icone }}"></i>
        @unless ($somenteIcone)
            {{ $rotulo }}
        @endunless
    </button>

    <div class="admin-action-dropdown {{ $somenteIcone ? 'admin-action-dropdown--compact' : '' }}" data-dropdown-menu hidden>
        @if ($tituloMenu)
            <div class="admin-action-dropdown__title">{{ $tituloMenu }}</div>
        @endif

        @foreach ($itens as $item)
            @php
                $tipo = $item['tipo'] ?? 'link';
                $classeItem = 'admin-action-dropdown__item' . (!empty($item['danger']) ? ' admin-action-dropdown__item--danger' : '');
            @endphp

            @if ($tipo === 'button')
                <button type="button" class="{{ $classeItem }}">
                    @if (!empty($item['icone']))<i class="{{ $item['icone'] }}"></i>@endif
                    {{ $item['titulo'] }}
                </button>
            @else
                <a href="{{ $item['href'] ?? '#' }}" class="{{ $classeItem }}">
                    @if (!empty($item['icone']))<i class="{{ $item['icone'] }}"></i>@endif
                    {{ $item['titulo'] }}
                </a>
            @endif
        @endforeach
    </div>
</div>
